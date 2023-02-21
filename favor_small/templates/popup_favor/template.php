<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);?>

<div class='basket_popup' id="delayed"><?


  if($_REQUEST['ajax_mode'] == 'Y') $APPLICATION->RestartBuffer();
  if($arResult["ITEMS"]){?>   <table class="basket-items-list-table" id="basket-item-table">
      <tbody><?
        foreach($arResult["ITEMS"] as $i=>$item){?>
          <tr class="basket-items-list-item-container" id="basket-item-<?=$item['ID']?>" data-entity="basket-item" data-id="<?=$item['PRODUCT_ID']?>">
            <td colspan="2" class="basket-items-list-item-descriptions">
              <div class="basket-items-list-item-descriptions-inner" id="basket-item-height-aligner-138370">
                <div class="basket-item-block-art">
                  <div class="basket-item-block-art">
                    <h2 class="basket-item-info-name">Артикул:</h2>
                    <div class="basket-item-block-properties">
                      <div class="basket-item-property-custom basket-item-property-custom-text"><b><?=$item['PROD']['PROPERTY_CML2_ARTICLE_VALUE']?></b></div>
                    </div>
                  </div>
                </div>      
                <div class="basket-item-block-image">
                  <a href="<?=$item['PROD']['DETAIL_PAGE_URL']?>" class="basket-item-image-link"> 
                    <img class="basket-item-image" alt="<?=$item['PROD']['NAME']?>" src="<?=$item['IMG']['src']?>">
                  </a>
                </div>
                <div class="basket-item-block-info">
                  <span class="basket-item-actions-remove visible-xs" data-entity="basket-item-delete"></span>
                  <h2 class="basket-item-info-name">
                    <a href="<?=$item['PROD']['DETAIL_PAGE_URL']?>" class="basket-item-info-name-link">
                      <span data-entity="basket-item-name"><?=$item['PROD']['NAME']?></span>
                    </a>
                  </h2><?
                  if(empty($item['IN_BASKET'])) {?>
                    <div class="basket-items-list-item-warning-container">
                      <div class="alert alert-warning text-center">
                        Товар в избранном.<?
                        if ($item['ACTIVE'] == 'Y') {?>
                          <a class="to_basket" href="#" data-entity="basket-item-remove-delayed">Добавить в корзину?</a><?
                        } else {?>
                          <span class="not-available">Нет в наличии</span><?
                        }?>                   
                      </div>
                    </div><?
                  }?>                  
                  <div class="basket-item-block-properties">
                    <div class="basket-item-property-custom basket-item-property-custom-text" data-entity="basket-item-property">
                      <div class="basket-item-property-custom-name">Тип цены</div>
                      <div class="basket-item-property-custom-value" data-column-property-code="TYPE" data-entity="basket-item-property-column-value">
                        Розничная цена
                      </div>
                    </div>
                  </div>
                </div>
              </div>              
            </td>
            <td class="basket-items-list-item-price basket-items-list-item-price-for-one hidden-xs">
              <div class="basket-item-block-price">
                <div class="basket-item-price-current">
                  <span class="basket-item-price-current-text" id="basket-item-price-<?=$item['ID']?>">
                    <?=CurrencyFormat($item['PRICE']*$item['RATIO'], $item['CURRENCY'])?>
                  </span>
                </div>
                <div class="basket-item-price-title">
                  цена за <?=$item['RATIO']?> <?=$item['MEASURE']?>
                </div>
              </div>
            </td> 
            <td class="basket-items-list-item-amount">
              <div class="basket-item-block-amount" data-entity="basket-item-quantity-block">
                <span class="basket-item-amount-btn-minus amount-btn" data-action="minus" data-entity="basket-item-quantity-minus"></span>
                <div class="basket-item-amount-filed-block"><?
                  $float_after = explode('.', $item['RATIO']);
                  $float_after_q = explode('.', $item['QUANTITY']);
                  $count_float = (!(int)$float_after_q[1]) ? 0 : mb_strlen($float_after[1]);

                  $next_value = $item['QUANTITY'] + $item['RATIO'];
                  $prev_value = ($item['QUANTITY'] > $item['RATIO']) ? $item['QUANTITY'] - $item['RATIO']: $item['RATIO'];?>

                  <input type="text" class="basket-item-amount-filed" value="<?=number_format($item['QUANTITY'], $count_float, '.', '')?>" data-prev="<?=$prev_value?>" data-next="<?=$next_value?>" data-value="<?=$item['RATIO']?>" data-entity="basket-item-quantity-field" id="basket-item-quantity-<?=$item['ID']?>" <?if($item['RATIO']!=1){?>disabled<?}?>>
                </div>
                <span class="basket-item-amount-btn-plus amount-btn" data-action="plus" data-entity="basket-item-quantity-plus"></span>
                <div class="basket-item-amount-field-description"><?=$item['MEASURE']?></div>
              </div>
            </td>
            <td class="basket-items-list-item-remove hidden-xs">
              <div class="basket-item-block-actions">
                <span class="basket-item-actions-remove" data-entity="basket-item-delete"></span>
              </div>
            </td>               
          </tr><?
        }?>
      </tbody>
    </table><?
  } else{?>
    <div class="error_block sect_row"><font class="errortext"><?=GetMessage("FAVORITE_EMPTY")?></font></div><?
  }

  if($_REQUEST['ajax_mode'] == 'Y') die;?>
</div>
