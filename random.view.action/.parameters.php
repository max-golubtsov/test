<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
use Bitrix\Main\Loader;

if (!Loader::includeModule('iblock'))
	return;

$arComponentParameters = array(
	"GROUPS" => array(),
	"PARAMETERS" => array(
		"IBLOCK_ID" => array(
			"PARENT" => "VISUAL",
			"NAME" => 'ID инфоблока',
			"TYPE" => "TEXT",
			"DEFAULT" => ''
		),
    "SECTION_ID" => array(
      "PARENT" => "VISUAL",
      "NAME" => 'ID раздела инфоблока',
      "TYPE" => "TEXT",
      "DEFAULT" => ''
    ),
	),
);

?>