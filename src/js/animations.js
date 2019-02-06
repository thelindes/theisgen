/*slider animation*/

document.addEventListener('DOMContentLoaded', function () {
    var rewind = document.querySelector('.js_slider');

    if(rewind != null){
        lory(rewind, {
            rewind: true
        });
    }
});


jQuery(
    function($) {
        /*
        var $navigation = $('.navigation');
        var $contentWrapper = $('.content-wrapper');
        
        if (localStorage.getItem('menuOpen') === 'true') {
            $navigation.addClass('open-no-animation');
            $contentWrapper.addClass('navigation-open-no-animation');
        }*/

    $vwWidth = window.innerWidth;    

    $(document).ready(function() {
        // Optimalisation: Store the references outside the event handler:
        var $window = $(window);
        var $fbbig = $("#fbbig");
        var $fbsmall = $("#fbsmall");
    
        function checkWidth() {
            var windowsize = $window.width();
            if (windowsize <=  570) {
                $fbbig.css("display", "none");
                $fbsmall.css("display", "block");
            } else {
                $fbsmall.css("display", "none");
                $fbbig.css("display", "block");
            }
        }
        // Execute on load
        checkWidth();
        // Bind event listener
        $(window).resize(checkWidth);
    });

    $("#open-contact-form-button").on('click', function() {
        var $buttonValue = document.getElementById("open-contact-form-button").value;
        var $overlay = $('.background_overlay');
        var $textarea = $('wpcf7-form-control');
        var $body = $('body');

        $body.toggleClass('disabled');
        $textarea.context.forms[2][8].defaultValue = "Meine Frage zu " + $buttonValue; 

        $overlay.toggleClass('active', 0);
        $textarea
    });

    $(".close").on('click', function() {
        var $body = $('body');
        $body.toggleClass('disabled');
        var $overlay = $('.background_overlay');
        $overlay.removeClass('active');
    })

    $("#index-button").click(function() {
    $vwHeight = window.innerHeight;
    $('html, body').animate({
        scrollTop: $(this).offset().top-40
        }, 1000 );
    });

    $('#search-button').on('click', function() {
        var $search = $('.search-box');
        
 
            $search.toggleClass('block', 0).toggleClass('open', 0);             
        /*localStorage.setItem('menuOpen', */
    });
        
    $('#mobile-menu-button').on('click', function() {
        var $menu = $('.slide-navigation');
        
 
            $menu.toggleClass('open', 0);             
        /*localStorage.setItem('menuOpen', */
    });
        
    $('#search-button-mobile').on('click', function() {
        var $search = $('.search-box');
        var $identifier = $('.identifier');
        
 
            $search.toggleClass('block', 0).toggleClass('open', 0);          
            $identifier.toggleClass('none');
        /*localStorage.setItem('menuOpen', */
    });
    }

    );
    