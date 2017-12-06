$(function() {

    function setTimeToClock() {
        var d = new Date();
        document.getElementById('clock').innerHTML = d.toLocaleTimeString();
    }
    setTimeToClock();
    setInterval(function() {
        setTimeToClock();
    }, 1000);
    $('.button-collapse').sideNav();
    $('.parallax').parallax();
    $('.parallax-container').dblclick(function() {
        $('blockquote').fadeIn(5000);
    });
    $('.collapsible').collapsible();
    $('.dropdown-button').dropdown({
        constrainWidth: true,
        hover: false,
        belowOrigin: true
    });

});
