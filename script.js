$(function () {
    //Show a different navbar if screen width is below 576px
    if(screen.width > 576){
    //Sliding animation for navbar when scroll detected
    var previousScPos = window.pageYOffset;
    window.onscroll = function () {
        var currentScPos = window.pageYOffset;
        if (previousScPos > currentScPos) {
            $("#navbar").css("top", "0px");
        } else {
            $("#navbar").css("top", "-100px");
            $("#navbar").css("transition", "top 0.5s");
        }
        previousScPos = currentScPos;
    };
    
    } else {
        $('#navbarToggleMobile').toggleClass("collapse");
        $('#logo').after('<button class="navbar-toggler navbar-light" type="button" data-toggle="collapse" data-target="#navbarToggleMobile" aria-controls="navbarToggleMobile" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>');
    }
    
    //Expanding animation when clicking the product title
    $('.product-title').click(function(){
       var clickedId = $(this).attr('id');
        $('#' + clickedId + ' + div.product-cont').slideToggle("slow");
    });
});