<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
if ($arResult["IDS"]){	
	global $arrFilter;
	$arrFilter = ["ID" => $arResult["IDS"]];?>
	<div class="block_random_show">
	<div class="title_block_prod"><?=$arResult["NAME"]?></div><?
	$APPLICATION->IncludeComponent(
		"bitrix:catalog.section", 
		"catalog_block_slider_rnd", 
		array(
			"ACTION_VARIABLE" => "action",
			"ADD_PICT_PROP" => "-",
			"ADD_PROPERTIES_TO_BASKET" => "Y",
			"ADD_SECTIONS_CHAIN" => "N",
			"ADD_TO_BASKET_ACTION" => "ADD",
			"AJAX_MODE" => "N",
			"AJAX_OPTION_ADDITIONAL" => "",
			"AJAX_OPTION_HISTORY" => "N",
			"AJAX_OPTION_JUMP" => "N",
			"AJAX_OPTION_STYLE" => "Y",
			"BACKGROUND_IMAGE" => "-",
			"BASKET_URL" => "/personal/basket.php",
			"BROWSER_TITLE" => "-",
			"CACHE_FILTER" => "N",
			"CACHE_GROUPS" => "Y",
			"CACHE_TIME" => "36000000",
			"CACHE_TYPE" => "A",
			"COMPATIBLE_MODE" => "Y",
			"COMPOSITE_FRAME_MODE" => "A",
			"COMPOSITE_FRAME_TYPE" => "AUTO",
			"CONVERT_CURRENCY" => "N",
			"CUSTOM_FILTER" => "",
			"DETAIL_URL" => "",
			"DISABLE_INIT_JS_IN_COMPONENT" => "N",
			"DISPLAY_BOTTOM_PAGER" => "N",
			"DISPLAY_COMPARE" => "N",
			"DISPLAY_TOP_PAGER" => "N",
			"ELEMENT_SORT_FIELD" => "sort",
			"ELEMENT_SORT_FIELD2" => "id",
			"ELEMENT_SORT_ORDER" => "asc",
			"ELEMENT_SORT_ORDER2" => "desc",
			"ENLARGE_PRODUCT" => "STRICT",
			"FILTER_NAME" => "arrFilter",
			"HIDE_NOT_AVAILABLE" => "N",
			"HIDE_NOT_AVAILABLE_OFFERS" => "N",
			"IBLOCK_ID" => "20",
			"IBLOCK_TYPE" => "aspro_next_catalog",
			"INCLUDE_SUBSECTIONS" => "Y",
			"LABEL_PROP" => "",
			"LAZY_LOAD" => "N",
			"LINE_ELEMENT_COUNT" => "3",
			"LOAD_ON_SCROLL" => "N",
			"MESSAGE_404" => "",
			"MESS_BTN_ADD_TO_BASKET" => "Купить",
			"MESS_BTN_BUY" => "Купить",
			"MESS_BTN_DETAIL" => "Подробнее",
			"MESS_BTN_SUBSCRIBE" => "Подписаться",
			"MESS_NOT_AVAILABLE" => "Нет в наличии",
			"META_DESCRIPTION" => "-",
			"META_KEYWORDS" => "-",
			"OFFERS_CART_PROPERTIES" => array(
				0 => "CML2_ARTICLE",
				1 => "QUANTITY",
				2 => "DENOMINATION",
				3 => "VOLUME",
				4 => "SIZES",
				5 => "COLOR_REF",
				6 => "PRICE_PROP",
			),
			"OFFERS_FIELD_CODE" => array(
				0 => "ID",
				1 => "CODE",
				2 => "XML_ID",
				3 => "NAME",
				4 => "TAGS",
				5 => "SORT",
				6 => "PREVIEW_TEXT",
				7 => "PREVIEW_PICTURE",
				8 => "DETAIL_TEXT",
				9 => "DETAIL_PICTURE",
				10 => "DATE_ACTIVE_FROM",
				11 => "ACTIVE_FROM",
				12 => "DATE_ACTIVE_TO",
				13 => "ACTIVE_TO",
				14 => "SHOW_COUNTER",
				15 => "SHOW_COUNTER_START",
				16 => "IBLOCK_TYPE_ID",
				17 => "IBLOCK_ID",
				18 => "IBLOCK_CODE",
				19 => "IBLOCK_NAME",
				20 => "IBLOCK_EXTERNAL_ID",
				21 => "DATE_CREATE",
				22 => "CREATED_BY",
				23 => "CREATED_USER_NAME",
				24 => "TIMESTAMP_X",
				25 => "MODIFIED_BY",
				26 => "USER_NAME",
				27 => "",
			),
			"OFFERS_LIMIT" => "5",
			"OFFERS_PROPERTY_CODE" => array(
				0 => "CML2_ARTICLE",
				1 => "MORE_PHOTO",
				2 => "QUANTITY",
				3 => "DENOMINATION",
				4 => "VOLUME",
				5 => "SIZES",
				6 => "COLOR_REF",
				7 => "PRICE_PROP",
				8 => "",
			),
			"OFFERS_SORT_FIELD" => "sort",
			"OFFERS_SORT_FIELD2" => "id",
			"OFFERS_SORT_ORDER" => "asc",
			"OFFERS_SORT_ORDER2" => "desc",
			"PAGER_BASE_LINK_ENABLE" => "N",
			"PAGER_DESC_NUMBERING" => "N",
			"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
			"PAGER_SHOW_ALL" => "N",
			"PAGER_SHOW_ALWAYS" => "N",
			"PAGER_TEMPLATE" => ".default",
			"PAGER_TITLE" => "Товары",
			"PAGE_ELEMENT_COUNT" => "100",
			"PARTIAL_PRODUCT_PROPERTIES" => "N",
			"PRICE_CODE" => array(
				0 => "BASE",
			),
			"PRICE_VAT_INCLUDE" => "Y",
			"PRODUCT_BLOCKS_ORDER" => "price,props,sku,quantityLimit,quantity,buttons",
			"PRODUCT_DISPLAY_MODE" => "N",
			"PRODUCT_ID_VARIABLE" => "id",
			"PRODUCT_PROPERTIES" => array(
				0 => "HIT",
				1 => "BRAND",
				2 => "EXPANDABLES",
				3 => "IN_STOCK",
				4 => "VIDEO_YOUTUBE",
				5 => "CML2_TRAITS",
				6 => "ASSOCIATED",
				7 => "CML2_TAXES",
				8 => "SERVICES",
				9 => "CML2_ATTRIBUTES",
				10 => "PROP_2052",
			),
			"PRODUCT_PROPS_VARIABLE" => "prop",
			"PRODUCT_QUANTITY_VARIABLE" => "quantity",
			"PRODUCT_ROW_VARIANTS" => "[{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false}]",
			"PRODUCT_SUBSCRIPTION" => "Y",
			"PROPERTY_CODE" => array(
				0 => "MINIMUM_PRICE",
				1 => "MAXIMUM_PRICE",
				2 => "HIT",
				3 => "BRAND",
				4 => "POPUP_VIDEO",
				5 => "PODBORKI",
				6 => "PROP_A",
				7 => "ARCH",
				8 => "BBZ",
				9 => "CODE",
				10 => "COST2",
				11 => "EXISS",
				12 => "EXIST",
				13 => "EXPRESS",
				14 => "FULL_TEXT",
				15 => "PROP_H",
				16 => "PROP_I",
				17 => "ID",
				18 => "IMG",
				19 => "IMPORT",
				20 => "META_D",
				21 => "META_K",
				22 => "META_T",
				23 => "NAME_YM",
				24 => "OLD_COST",
				25 => "PROC",
				26 => "PROP_R",
				27 => "RATING_OLD",
				28 => "REVIEWS",
				29 => "SIM",
				30 => "SORT_I",
				31 => "SPEC",
				32 => "SPEC_2",
				33 => "SPEC_H",
				34 => "STAR",
				35 => "STOCK",
				36 => "TITLE",
				37 => "TOP",
				38 => "VENDOR",
				39 => "YM",
				40 => "EXPANDABLES",
				41 => "CML2_ARTICLE",
				42 => "CML2_BASE_UNIT",
				43 => "IN_STOCK",
				44 => "VIDEO_YOUTUBE",
				45 => "DELIVERY",
				46 => "FORUM_MESSAGE_CNT",
				47 => "vote_count",
				48 => "rating",
				49 => "CML2_TRAITS",
				50 => "ASSOCIATED",
				51 => "DISCOUNT",
				52 => "CML2_TAXES",
				53 => "COUNTRY",
				54 => "vote_sum",
				55 => "SALE_TEXT",
				56 => "FORUM_TOPIC_ID",
				57 => "PROP_2033",
				58 => "SERVICES",
				59 => "CML2_ATTRIBUTES",
				60 => "COLOR_REF2",
				61 => "PROP_159",
				62 => "PROP_2052",
				63 => "PROP_2027",
				64 => "PROP_2053",
				65 => "PROP_2083",
				66 => "PROP_2049",
				67 => "PROP_2026",
				68 => "PROP_2044",
				69 => "PROP_162",
				70 => "PROP_2065",
				71 => "PROP_2054",
				72 => "PROP_2017",
				73 => "",
			),
			"PROPERTY_CODE_MOBILE" => "",
			"RCM_TYPE" => "personal",
			"SECTION_CODE" => "",
			"SECTION_ID" => "",
			"SECTION_ID_VARIABLE" => "SECTION_ID",
			"SECTION_URL" => "",
			"SECTION_USER_FIELDS" => array(
				0 => "UF_SECTION_DESCR",
				1 => "UF_SECTION_TEMPLATE",
				2 => "UF_TIZERS",
				3 => "UF_POPULAR",
				4 => "UF_CATALOG_ICON",
				5 => "UF_ID",
				6 => "UF_TITLE",
				7 => "UF_NAME_YM",
				8 => "UF_URL",
				9 => "UF_PROC",
				10 => "UF_INFO_TEXT",
				11 => "UF_INFO_TYPE",
				12 => "UF_META_T",
				13 => "UF_META_D",
				14 => "UF_META_K",
				15 => "UF_OFFERS_TYPE",
				16 => "UF_ELEMENT_DETAIL",
				17 => "UF_TABLE_SIZES",
				18 => "UF_TAGS",
				19 => "UF_RECIPES",
				20 => "UF_PRODUCT_ACTION",
				21 => "UF_PRODUCT_NEW",
				22 => "UF_SECTION_BANNERS",
				23 => "",
			),
			"SEF_MODE" => "N",
			"SET_BROWSER_TITLE" => "Y",
			"SET_LAST_MODIFIED" => "N",
			"SET_META_DESCRIPTION" => "Y",
			"SET_META_KEYWORDS" => "Y",
			"SET_STATUS_404" => "N",
			"SET_TITLE" => "Y",
			"SHOW_404" => "N",
			"SHOW_ALL_WO_SECTION" => "Y",
			"SHOW_CLOSE_POPUP" => "N",
			"SHOW_DISCOUNT_PERCENT" => "N",
			"SHOW_FROM_SECTION" => "N",
			"SHOW_MAX_QUANTITY" => "N",
			"SHOW_OLD_PRICE" => "N",
			"SHOW_PRICE_COUNT" => "1",
			"SHOW_SLIDER" => "Y",
			"SLIDER_INTERVAL" => "3000",
			"SLIDER_PROGRESS" => "N",
			"TEMPLATE_THEME" => "blue",
			"USE_ENHANCED_ECOMMERCE" => "N",
			"USE_MAIN_ELEMENT_SECTION" => "N",
			"USE_PRICE_COUNT" => "N",
			"USE_PRODUCT_QUANTITY" => "N",
			"COMPONENT_TEMPLATE" => "catalog_block_slider_rnd",
			"TITLE_BLOCK" => "",
			"SHOW_MEASURE" => "Y",
			"SHOW_RATING" => "Y"
		),
		false
	);?>
	</div><?
}?>