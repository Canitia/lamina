// code to enable side navigation
jQuery(document).ready(function () {
  jQuery('.carousel').carousel();

  jQuery(function($) {
  $('.navbar .dropdown').hover(function() {
  $(this).find('.dropdown-menu').first().stop(true, true).delay(250).slideDown();

  }, function() {
  $(this).find('.dropdown-menu').first().stop(true, true).delay(100).slideUp();

  });

})
}
);
