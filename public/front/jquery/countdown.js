window.onload = function() {
    $("#countdown").countdown("2017/06/06", function(event) {
        $(this).text(event.strftime("%D days %H:%M:%S"));
    })
}