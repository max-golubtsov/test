<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

use Bitrix\Main\Localization\Loc;
$arComponentDescription = [
  "NAME" => Loc::getMessage("COMPONENT_NAME"),
  "DESCRIPTION" => Loc::getMessage("COMPONENT_DESCRIPTION"),
  "ICON" => "/images/icon.gif",
  "PATH" => [
    "ID" => "onpeak",
  ],
  "CACHE_PATH" => "Y",
  "COMPLEX" => "N",
];