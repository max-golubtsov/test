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
        global $USER, $APPLICATION;

        $cacheID = [$this->arParams, $USER->GetUserGroupArray()];

        if ($this->startResultCache(false, $cacheID)) {
            if ($this->arParams['SECTION_ID'] && $this->arParams['IBLOCK_ID']) {
                $rsParentSection = CIBlockSection::GetByID($this->arParams['SECTION_ID']);
                if ($arParentSection = $rsParentSection->GetNext()) {
                    $arFilter = [
                        'IBLOCK_ID' => $this->arParams['IBLOCK_ID'],
                        '>LEFT_MARGIN' => $arParentSection['LEFT_MARGIN'],
                        '<RIGHT_MARGIN' => $arParentSection['RIGHT_MARGIN'],
                        '>DEPTH_LEVEL' => $arParentSection['DEPTH_LEVEL'],
                        'ACTIVE' => 'Y',
                    ]; // выберет потомков без учета активности
                    $rsSect = CIBlockSection::GetList(['left_margin' => 'asc'], $arFilter);
                    while ($arSect = $rsSect->GetNext()) {
                        $arIdsSections[] = $arSect["ID"];// получаем подразделы
                    }
                }
                $rsElements = \CIBlockElement::GetList(
                    [],
                    [
                        "IBLOCK_ID" => $this->arParams["IBLOCK_ID"],
                        "SECTION_ID" => $arIdsSections,
                        "ACTIVE" => "Y",
                        [
                            "LOGIC" => "OR",
                            ["PROPERTY_HIT_VALUE" => "Хит"],
                            ["PROPERTY_HIT_VALUE" => "Новинка"],
                            ["PROPERTY_HIT_VALUE" => "Акция"]
                        ]
                    ],
                    false,
                    false,
                    [
                        "ID",
                        "NAME",
                        "XML_ID",
                        "PROPERTY_HIT",
                    ]
                );
                while ($arElement = $rsElements->fetch()) {
                    $this->arResult["IDS"][] = $arElement["ID"];
                }
                $this->arResult["NAME"] = "Рекомендуем";
            }
        }

        $this->includeComponentTemplate();
    }

    public function executeComponent()
    {
        $this->getResult();
    }
}