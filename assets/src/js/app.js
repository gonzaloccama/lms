import './preloader'
import './sidebar'
import './perfect-scrollbar'

(function(){
  'use strict';
  
  // Self Initialize DOM Factory Components
  domFactory.handler.autoInit()

  // ENABLE TOOLTIPS
  $('[data-toggle="tooltip"]').tooltip()
  
  $('.search-form input').on('focus', function () {
    $('.search-form').addClass('highlight')
  });
  $('.search-form input').on('focusout', function () {
    $('.search-form').removeClass('highlight')
  }); 
})()