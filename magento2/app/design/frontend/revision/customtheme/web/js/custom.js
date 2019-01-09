// require([ "jquery" ], function($){

// $(window).scroll(function () {
//     if( $(window).scrollTop() > $('.header.content').offset().top && !($('#header').hasClass('sticky'))){
//     $('#header-2').addClass('sticky');
//     } else if ($(window).scrollTop() == 0){
//     $('#header').removeClass('sticky');
//     }
// });
// });


require([ "jquery" ], function($){

$(window).scroll(function () {
    if( $(window).scrollTop() > $('.header.content').offset().top && !($('.header.content').hasClass('sticky'))){
    $('.header.content').addClass('sticky');
    } else if ($(window).scrollTop() == 0){
    $('.header.content').removeClass('sticky');
    }
});
});