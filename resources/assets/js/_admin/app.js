window.$ = window.jQuery = require('jquery');
require('jquery-ujs');
require('bootstrap');
require('bootstrap-datepicker');

$('.datepicker').datepicker({
    format: 'yyyy-mm-dd',
    autoclose: true,
    todayBtn: 'linked',
    clearBtn: true,
    todayHighlight: true
});

$(function(){
  toggleCapacity();
  $('input#limit_capacity').change(function() {
      toggleCapacity();
  });
});

function toggleCapacity() {
  if ($('input#limit_capacity').prop('checked')) {
    $('.capacity_area').show();
  } else {
    $('.capacity_area').hide();
  }
}


$(function() {

  $('form#lecture_order_by').on('submit', function() {
    $('table#lectures input.order_by').each(function() {
      var $input = $(this).clone();
      $input.attr('type', 'hidden');
      $input.appendTo($('form#lecture_order_by'));
    });
    return true;
  });

  $('form#lecture_course_order_by').on('submit', function() {
    $('table#lecture_courses input.order_by').each(function() {
      var $input = $(this).clone();
      $input.attr('type', 'hidden');
      $input.appendTo($('form#lecture_course_order_by'));
    });
    return true;
  });

});
