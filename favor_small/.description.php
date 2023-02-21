<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$arComponentDescription = array(
	"NAME" => GetMessage("NAME_MODULE"),
	"DESCRIPTION" => GetMessage("DESCRIPTION_MODULE"),
	"ICON" => "/images/eaddform.gif",
	  "PATH" => array(
		"ID" => GetMessage("ONPEAK"),
		"CHILD" => array(
		  "ID" => "Shop",
		  "NAME" => GetMessage("NAME_SHOP"),
		  "SORT" => 10,
		),
	  ),
 
);

?>