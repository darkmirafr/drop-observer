$(function() {
    $("#twitter-launch-btn").click(function() {
        $(this).attr("disabled", "disabled");
        var progress = $(".progress").children();
        progress.removeClass("d-none");

        var jqxhr = $.get("/twitter", function( data ) {
            progress.width("100%").html("100%");
            progress.fadeOut("slow");
            data.forEach(function(element) {
                $('#tweet-list').append("<li class=\"list-group-item\">" + element.text + "</li>");
            });
        }).fail(function() {
            progress.removeClass("bg-success");
            progress.addClass("bg-danger");
            progress.width("100%").html("Error");
        });

    });
});
