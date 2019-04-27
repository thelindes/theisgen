/*slider animation*/

// Slider nav
var companionSlider;
var translationValue = 0;
var stepSize = 0;
var steps = 0;
var completeWidth;
var companionClickLeft;
var companionClickRight;

document.addEventListener('DOMContentLoaded', function () {
    var rewind = document.querySelector('.js_slider');

    companionSlider = document.getElementById("companion-slide");
    var companionChildren = companionSlider.children;
    completeWidth = companionChildren[0].offsetWidth * companionChildren.length - companionChildren[0].offsetWidth;
    stepSize = companionChildren[0].offsetWidth * -1;

    companionClickLeft = document.getElementById("cclickLeft");
    companionClickRight = document.getElementById("cclickRight");

    companionClickLeft.addEventListener("click", () => {
        companionClick("left");
    });

    companionClickRight.addEventListener("click", () => {
        companionClick("right");
    });


    if(rewind != null){
        lory(rewind, {
            rewind: true
        });
    }

    window.onresize = () => {
        completeWidth = companionChildren[0].offsetWidth * companionChildren.length - companionChildren[0].offsetWidth;;
        stepSize = companionChildren[0].offsetWidth * -1;
        companionClick("left");
    }; 
});


const companionClick = (direction) => {
    if(direction == "left") {
        var testTranslationValue = (steps * stepSize) + (stepSize) * -1;
        if(testTranslationValue <= 0 ) {
            --steps;
        }
    } else {
        var right = translationValue + stepSize;
        if(completeWidth + right >= 0 ) {
            ++steps;
        }

    }
    
    translationValue = steps * stepSize;
    companionSlider.style.transform = "translate("+translationValue+"px)";
    console.log("translatioValue: "+translationValue);
    console.log("steps: "+steps);
    console.log("stepSize: "+ stepSize);
    console.log("completeWidth:" + completeWidth);
}

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

        
        function disclaimerManagement() {
            var $showDisclaimer = localStorage.getItem('showDisclaimer');
            $overlay = $('.dialog-overlay');

            if($showDisclaimer == null){
                localStorage.setItem('showDisclaimer', true);
                $overlay.removeClass('disabled');
            }
            
            if($showDisclaimer == 'true') {
                $overlay.removeClass('disabled');
            } 

        }
    
        function disableScrollForBackground() {
            var $showDisclaimer = localStorage.getItem('showDisclaimer');
            var $body = $('body');

            if($showDisclaimer == 'true') {
                $body.toggleClass('disabled');
            } else {
                $body.removeClass('disabled');
            }

        }

        // Execute on load
        checkWidth();
        disclaimerManagement();
        disableScrollForBackground();
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

    $("#submit-disclaimer").on('click', function() {
        $showDisclaimer = localStorage.getItem('showDisclaimer');
        $body = $('body');
        $overlay = $('.dialog-overlay');
        $overlay.toggleClass('disabled');
        $body.removeClass('disabled');

        localStorage.setItem('showDisclaimer', false);
    });

    $(".close").on('click', function() {
        var $body = $('body');
        $body.toggleClass('disabled');
        var $overlay = $('.background_overlay');
        $overlay.removeClass('active');
    })

    $(".close-window").on('click', function() {
        window.close();
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

   
