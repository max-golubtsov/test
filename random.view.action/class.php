<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main,
    Bitrix\Main\Localization\Loc;

class RandomBlockAction extends \CBitrixComponent
{
    public function onIncludeComponentLang()
    {
        $this->includeComponentLang(basename(__FILE__));
        Loc::loadMessages(__FILE__);
    }

    public function onPrepareComponentParams($params)
    {
        return $params;
    }

    public function getResult()
    {
        $page = "";

        if ($this->arParams['SECTION_ID'] && $this->arParams['IBLOCK_ID']) {
            $arFilter = ['IBLOCK_ID' => $this->arParams['IBLOCK_ID'], 'ACTIVE' => 'Y', 'ID' => $this->arParams['SECTION_ID']];
            $db_list = CIBlockSection::GetList(array(), $arFilter, false, ["UF_*"]);
            if ($ar_result = $db_list->GetNext(false, false)) {
                /*получение новинок или акций, или баннера*/
                $idNew = array_filter(explode(",", str_replace(' ', '', $ar_result["UF_PRODUCT_NEW"])));
                $idAction = array_filter(explode(",", str_replace(' ', '', $ar_result["UF_PRODUCT_ACTION"])));
                $idBanners = array_filter(explode(",", str_replace(' ', '', $ar_result["UF_SECTION_BANNERS"])));


                $filter[1]["filter"] = ["IBLOCK_ID" => $this->arParams['IBLOCK_ID'], "ID" => $idNew, "ACTIVE" => "Y"];
                $filter[2]["filter"] = ["IBLOCK_ID" => $this->arParams['IBLOCK_ID'], "ID" => $idAction, "ACTIVE" => "Y"];
                $filter[3]["filter"] = ["IBLOCK_ID" => 34, "ID" => $idBanners, "ACTIVE" => "Y"];
                $filter[1]["type"] = "new_product";
                $filter[2]["type"] = "action_product";
                $filter[3]["type"] = "banners";
                $filter[1]["name"] = "Новинки";
                $filter[2]["name"] = "Акции";
                $filter[3]["name"] = "Баннеры";

                if (!$_SESSION["SHOW_SECTION_INFO"] || ($_SESSION["SHOW_SECTION_INFO"] > 2)) {
                    $_SESSION["SHOW_SECTION_INFO"] = 1;
                } else {
                    $_SESSION["SHOW_SECTION_INFO"]++;
                }

                $rnd = $_SESSION["SHOW_SECTION_INFO"];

                if ($filter[$rnd]["filter"]["ID"]) {
                    $arSelectElement = ["ID"];
                    $res = CIBlockElement::GetList([], $filter[$rnd]["filter"], false, [], $arSelectElement);
                    $i = 0;
                    while ($ob = $res->GetNext()) {
                        $this->arResult["IDS"][] = $ob["ID"];
                    }
                    $this->arResult['TYPE'] = $filter[$rnd]["type"];
                    $this->arResult['NAME'] = $filter[$rnd]["name"];
                    /*//получение новинок или акций, или баннера*/
                    $page = ($filter[$rnd]["type"] == "banners") ? "banner_write" : "";
                }
            }
        }

        $this->includeComponentTemplate($page);
    }

    public function executeComponent()
    {
        $this->getResult();
    }
}