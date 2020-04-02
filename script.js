$(function () {
    var originalHeight;
    var scrolled11 = false;
    var scrolled22 = false;
    var scrolled33 = false;
    var menuOpened = false;
            
    // Disable menu to be transitioned if menu is opened 
    $('.collapse').click(function(){
            if(menuOpened){
                menuOpened = false;
                console.dir(menuOpened);
            } else {
                menuOpened = true;
            }
        });
    
    //Sliding animation for navbar when scroll detected
    var previousScPos = window.pageYOffset;
    window.onscroll = function () {
        var currentScPos = window.pageYOffset;
        if (previousScPos > currentScPos) {
            $("#navbar").css("top", "0px");
        } else {
            if(!menuOpened){
            $("#navbar").css("top", "-100px");
            $("#navbar").css("transition", "top 0.5s");
            }
        }
        previousScPos = currentScPos;
        let percentScrolled = currentScPos / document.documentElement.scrollHeight * 100;
        //console.dir(percentScrolled.toFixed(3));
        
    // Sliding animation of 'reason' texts
        if(percentScrolled > 13.0) {
            if(!scrolled11){
                $('#res1').addClass('display-slides');
                scrolled11 = true;
            } 
        }
        if(percentScrolled > 26.0) {
            if(!scrolled22){
                $('#res2').addClass('display-slides');
                scrolled22 = true;
            } 
        }
        if(percentScrolled > 39.0) {
            if(!scrolled33){
                $('#res3').addClass('display-slides');
                scrolled33 = true;
            } 
        }
    };
    
    //Show a different navbar if screen width is below 576px
    if(screen.width < 576){
        $('#logo').after('<button class="navbar-toggler navbar-light" type="button" data-toggle="collapse" data-target="#navbarToggleMobile" aria-controls="navbarToggleMobile" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>');
        $('#navbarToggleMobile').toggleClass("collapse");
        
        //Change the service names to number for smaller display
        $('.inside').each(function(index){
        $(this).text(index+1); 
        
        $('p.small').html("");

        
    });
    }
    /*
    //Expanding animation when clicking the product title
    $('.product-title').click(function(){
       var clickedId = $(this).attr('id');
        $('#' + clickedId + ' + div.product-cont').slideToggle("slow");
        $(this).toggleClass('opened');
    });*/
    
    //Make the picture on "our service" bigger when hovered
    $('.w-100.img-ser').hover(
        function(){ $(this).addClass('hovering') }, 
        function(){ $(this).removeClass('hovering') }    
    );
    
    // testK = 6LeIxAcTAAAAAJcZVRqyHh71UMIEGNQ_MXjiZKhI
    // SK = 6Le9qNwUAAAAAFtv2gd2sAVtdIAeL1_32yOxbf3R
    // ScK = 6Le9qNwUAAAAANoR-39QTKEjCcBR2gO6dn8RvHzK
});