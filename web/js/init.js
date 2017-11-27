$(function() {
    $(".button-collapse").sideNav();
    $('.parallax').parallax();
    $('.collapsible').collapsible();
    $("#form-settings").submit(function( event ) {
        event.preventDefault();
        $('#preloader').removeClass('hide');
    });
    $('.dropdown-button').dropdown({
        constrainWidth: true,
        hover: false,
        belowOrigin: true
    });
});
