<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

foreach($arResult["ITEMS"] as $i=>$item){
	$prodObj = CIBlockElement::GetList(array(), array('ID'=>$item['PRODUCT_ID'], 'IBLOCK_ID'=>CIBlockElement::GetIBlockByID($item['PRODUCT_ID'])), false, false, array('ID', 'NAME', 'IBLOCK_SECTION_ID', 'DETAIL_PAGE_URL', 'PREVIEW_PICTURE', 'PROPERTY_CML2_ARTICLE'));

	if($prod = $prodObj->GetNext()){
		$img = CFile::ResizeImageGet($prod['PREVIEW_PICTURE'], array('width'=>145, 'height'=>145), BX_RESIZE_IMAGE_PROPORTIONAL, true);
	}

	$arResult['ITEMS'][$i]['PROD'] = $prod;
	$arResult['ITEMS'][$i]['IMG'] = $img;
}