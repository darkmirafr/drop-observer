$(function() {

    function setTimeToClock() {
        var d = new Date();
        document.getElementById("clock").innerHTML = d.toLocaleTimeString();
    }
    setTimeToClock();
    setInterval(function() {
        setTimeToClock();
    }, 1000);

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
