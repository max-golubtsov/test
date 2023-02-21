<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

global $APPLICATION;
if(!empty($arResult["ITEMS"])) {
    $activeSortTitle = "";
    $firstSortItems = [];?>
    <div class="sort_filter sort-select custom">
        <div class="col-12 hidden-xs">
            <select class="sort-block iks-ignore"><?
              foreach ($arResult["ITEMS"] as $key => $item) {
                if(empty($firstSortItems)) {
                    $firstSortItems = $item;
                }

                $sortDefault = ($arResult["SORT"]["SORT"] == $item["UF_VALUE_SORT"] && $arResult["SORT"]["ORDER"] == $item["UF_VALUE_ORDER"]) ? ' selected="selected"' : "";
                if(!empty($sortDefault)) {
                    $activeSortTitle = $item["UF_TITLE"];
                }

                $link = $APPLICATION->GetCurPageParam("sort=".$item["UF_VALUE_SORT"]."&order=".$item["UF_VALUE_ORDER"], ["sort", "order"]);?>
                <option<?=$sortDefault?> title="<?=$item["UF_TITLE"]?>" value="<?=$link?>"><?=$item["UF_TITLE"]?></option><?
              }?>
            </select>
        </div>
        <div class="col-12 hidden-lg"><?
            if(empty($activeSortTitle)) {
                $activeSortTitle = $firstSortItems["UF_TITLE"];
                $arResult["SORT"]["SORT"] = $firstSortItems["UF_VALUE_SORT"];
                $arResult["SORT"]["ORDER"] = $firstSortItems["UF_VALUE_ORDER"];
            }?>
            <div class="active-sort"><?=$activeSortTitle?></div>
            <div id="mobile-sort" class="sort-block"><?
            foreach ($arResult["ITEMS"] as $key => $item) {
                $sortDefaultMobile = ($arResult["SORT"]["SORT"] == $item["UF_VALUE_SORT"] && $arResult["SORT"]["ORDER"] == $item["UF_VALUE_ORDER"]) ? " active" : "";
                $link = $APPLICATION->GetCurPageParam("sort=".$item["UF_VALUE_SORT"]."&order=".$item["UF_VALUE_ORDER"], ["sort", "order"]);?>
                <div class="sort-option<?=$sortDefaultMobile?>" title="<?=$item["UF_TITLE"]?>" data-value="<?=$link?>"><?=$item["UF_TITLE"]?></div><?
            }?>
            </div>
        </div>
    </div><?
}