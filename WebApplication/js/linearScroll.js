/* https://codepen.io/nxworld/pen/OyRrGy 

$(function() {
  $('a[href*=#]').on('click', function(e) {
    e.preventDefault();
    $('html, body').animate({ scrollTop: $($(this).attr('href')).offset().top}, 500, 'linear');
  });
});

Ref: https://codepad.co/snippet/YPDXE33r
Ref: http://api.jquery.com/animate/
Ref: http://api.jquery.com/jquery.fx.off/

 $(function() {
    $('.scroll-down').click (function(e) {
      e.preventDefault();
      $('html, body').stop().animate({scrollTop: $('section.featured').offset().top }, 10000, 'linear');
      return false;
    });
  });
  
The ones above did not work - only difference is use of ID's instead of classes
Added offset of -100 because of menu

Ref: https://plnkr.co/edit/0jVELqSpoUr4xxcarE0S?p=preview
 */

$(document).ready(function () {
  $('#scrollit').click(function() {
    $('#theTop').fadeIn(1000);
    $('html, body').animate({ scrollTop:$('#theTop').offset().top - 100 }, 1000, 'linear');
  });
});
