$(document).ready(function(){

  /* удаление товара из избранного */
  $("body").on("click", "#delayed .basket-item-actions-remove", function(){
    var favor_el = $(this).parents('.basket-items-list-item-container');
    var product_id = favor_el.data('id');
    $.ajax({
      url: "/local/ajax/favorites.php",
      data: {"ID": product_id, "DEL": "Y"},
      success: function(data){
        favor_el.remove();
      }
    }); 
  });
  /*// удаление товара из избранного */	

  /* увеличение/уменьшение количества товара */
  $('body').on('click', '#delayed .amount-btn', function(){
    var favor_el = $(this).parents('.basket-items-list-item-container');
    var amount_field = favor_el.find('.basket-item-amount-filed');
    var el_id = favor_el.data('id');
    var action = $(this).data('action');
    var count = (action == 'plus') ? amount_field.data('next') : amount_field.data('prev');
    var ratio = amount_field.data('value');

    var next_value = count + ratio;
    var prev_value = (count > ratio) ? count - ratio: ratio;

    amount_field.val(count).data({'next':next_value, 'prev':prev_value});

    return false;
  });
  /*// увеличение/уменьшение количества товара */

  /* изменение количества товара в поле в корзине */
  $('body').on('keyup', '#delayed .basket-item-amount-filed', function(){
    if(this.value.match(/[^0-9]/g)){ // запрет ввода всех символов кроме цифр
      this.value = this.value.replace(/[^0-9]/g, "");
    };

    return false;
  });
  $('body').on('change', '#delayed .amount-btn', function(){
    if(Number.isInteger($(this).data('value'))){
      var favor_el = $(this).parents('.basket-items-list-item-container');
      var el_id = favor_el.data('id');
      var action = $(this).data('action');
      var count = favor_el.find('.basket-item-amount-filed').val();
      var ratio = amount_field.data('value');

      var next_value = count + ratio;
      var prev_value = (count > ratio) ? count - ratio: ratio;

      amount_field.val(count).data({'next':next_value, 'prev':prev_value});    

      return false;
    }
  });
  /*// изменение количества товара в поле в корзине */

  /* добавление товара из избранного в корзину */
  $('body').on('click', '#delayed .to_basket', function(){
    var favor_el = $(this).parents('.basket-items-list-item-container');
    var product_id = favor_el.data('id');
    var count = favor_el.find('.basket-item-amount-filed').val();
    var favor_hide = $(this).parents('.basket-items-list-item-warning-container');

    $.ajax({
      url: "/local/ajax/add_to_basket.php",
      data: {"id_product_buy": product_id, "count_product_buy": count},
      success: function(data){
      	if(data) favor_hide.remove();
        $('.basket-checkout-section').load('/basket/ #basket-checkout-section-inner',{},function(){
          check_sum();
        });
      	ajax_load('/basket/', '#basket_popup', {'ajax_mode':'Y'});
      }
    });

  	return false;
  });
  /*// добавление товара из избранного в корзину */   

  /*переход в корзину*/
  $('body').on('click', '#ui-id-1', function(){
    $('.basket-checkout-section').load('/basket/ #basket-checkout-section-inner',{},function(){
      check_sum();
    });
  });
  /*//переход в корзину*/
});