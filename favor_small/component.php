<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

use Bitrix\Sale\Fuser,
    Bitrix\Catalog;

if(CModule::IncludeModule("sale") && CModule::IncludeModule("catalog") && CModule::IncludeModule("currency") && CModule::IncludeModule("iblock")) { 

  $basketItems = GetBasketList();

  $basket = Bitrix\Sale\Basket::loadItemsForFUser(
      Bitrix\Sale\Fuser::getId(),
      Bitrix\Main\Context::getCurrent()->getSite()
  );
  $basketData = $basket->getBasketItems();
  foreach ($basketData as $i => $item) {
      $product_id = $item->getField('PRODUCT_ID');
      $quantity = $item->getField('QUANTITY');
      $existRes = getWholesaleProduct(20, $product_id);
      if ($existRes["IS_WHOLESALE_VALUE"] == "Y" && $quantity >= $existRes["WHOLESALE_STEP_VALUE"]) {
          $item->setFields([
              'QUANTITY' => $quantity,
              'CURRENCY' => Bitrix\Currency\CurrencyManager::getBaseCurrency(),
              'LID' => Bitrix\Main\Context::getCurrent()->getSite(),
              'PRICE' => $existRes["WHOLESALE_PRICE_VALUE"],
              'CUSTOM_PRICE' => 'Y',
          ]);
          $item->save();
      }
  }

  $arItemBasket = array();

  $priceTotal = 0;
  foreach ($basketItems as $key => $basket) { // получаем id, товаров, которые есть в корзине
    if($basket['DELAY'] != 'Y')
      $arItemBasket[] = $basket['PRODUCT_ID'];
  }

  $arFilterHighload['UF_FUSER_ID'] = Bitrix\Sale\Fuser::getId(); 

  $favor_product = \Onpeak\CWorkHL::HLGetList(
    FAVOR_HIGHLOAD, 
    array('ID', 'UF_PRODUCT_ID', 'UF_USER_ID', 'UF_FUSER_ID'),  
    $arFilterHighload, 
    array(), 
    array('ID'=>'ASC')
  );

  $arProductID = array();

  if(!empty($favor_product['ITEMS'])) {
    foreach ($favor_product['ITEMS'] as $key => $arFavor) {
      $arFavor['PRODUCT_ID'] = $arFavor['UF_PRODUCT_ID'];

      $arMeasure = Catalog\ProductTable::getCurrentRatioWithMeasure($arFavor['PRODUCT_ID']);
      $arFavor['MEASURE'] = $arMeasure[$arFavor['PRODUCT_ID']]['MEASURE']['SYMBOL_RUS'];
      $arFavor['RATIO'] = $arMeasure[$arFavor['PRODUCT_ID']]['RATIO'];

      if(in_array($arFavor['PRODUCT_ID'], $arItemBasket))
        $arFavor['IN_BASKET'] = 'Y';

      $arFavor['PRICE_ARR'] = CCatalogProduct::GetOptimalPrice($arFavor['PRODUCT_ID']);
      $arFavor["PRICE"] = $arFavor['PRICE_ARR']['RESULT_PRICE']['DISCOUNT_PRICE'];
      $arFavor["OLD_PRICE"] = $arFavor['PRICE_ARR']['RESULT_PRICE']['BASE_PRICE'];
      $arFavor["CURRENCY"] = $arFavor['PRICE_ARR']['RESULT_PRICE']['CURRENCY'];

      $arFavor["QUANTITY"] = $arFavor['RATIO'];

      $arResult['ITEMS'][$arFavor['UF_PRODUCT_ID']] = $arFavor;
      $arProductID[] = $arFavor['UF_PRODUCT_ID'];
    }
    $res = CIBlockElement::GetList(array(), array('ID'=>$arProductID, 'IBLOCK_ID'=>20), false, false, array('ID', 'IBLOCK_ID', 'ACTIVE'));
    while ($arProd = $res->GetNext(false, false)) {
      $arResult['ITEMS'][$arProd['ID']]['ACTIVE'] = $arProd['ACTIVE'];
    }
  }

	$this->IncludeComponentTemplate();
} ?>