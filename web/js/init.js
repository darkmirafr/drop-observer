$(function() {
    $(".button-collapse").sideNav();
    $('.parallax').parallax();
    $('.collapsible').collapsible();
    $(".dropdown-button").dropdown({ hover: false });
    $("#form-settings").submit(function( event ) {
        event.preventDefault();
        $('#preloader').removeClass('hide');
    });
});
