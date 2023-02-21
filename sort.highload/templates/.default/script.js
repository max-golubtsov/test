$(document).ready(function() {

  $("select.sort-block").selectric();

  $("body").on("change", ".sort-select select", function() {
    let link = $(this).val();
    if(link) {
      window.location.href = link;
    }
    return false;
  });

  $("body").on("click", "div.sort-block .sort-option", function() {
    let link = $(this).data("value");
    if(link) {
      window.location.href = link;
    }
    return false;
  });

  $("body").on("click", ".active-sort", function() {
    $.fancybox.open({
      autoSize: true,
      autoDimensions: true,
      centerOnScroll: true,
      width: "100%",
      height: "100%",
      href: '#mobile-sort',
    });

    return false;
  });

});