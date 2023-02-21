<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

if(!CModule::IncludeModule("iblock"))
	return;

$arComponentParameters = array(

	"PARAMETERS" => array(
		"AJAX_MODE" => array(),
		"LINK_BAKET" => Array(
			"PARENT" => "BASE",
			"NAME" => GetMessage("T_LINK_BASKET"),
			"TYPE" => "TEXT",
			"DEFAULT" => 'ELEMENT_ID',
		),
	
		"SHOT_PRICE" => Array(
				"PARENT" => "BASE",
				"NAME" => GetMessage("T_PRICE_SHORT"),
				"TYPE" => "CHECKBOX",
				"DEFAULT" => "Y",
		),
    "PAGER_SETTINGS" => FALSE,
     
    "COUNT" => Array(
			"PARENT" => "BASE",
			"NAME" => GetMessage("T_COUNT"),
			"TYPE" => "TEXT",
			"DEFAULT" => '0',
		),
	),
 
);
CIBlockParameters::AddPagerSettings($arComponentParameters, GetMessage("T_IBLOCK_DESC_PAGER_PAGE"), false, true);
unset($arComponentParameters["PARAMETERS"]["PAGER_SHOW_ALWAYS"]);

?>
