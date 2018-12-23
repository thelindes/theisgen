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

        
    //Filter Tax and Years
    var products = document.querySelectorAll(".product-content");
    var $categoryselector = document.querySelectorAll("#category-selector");
        
   /*     
        
    [...years].forEach(year => {
        year.addEventListener("click", event => {
            selectedYear = event.currentTarget.id;
            //alert(selectedYear);
            applyFilter();
        });
    });
    [...cats].forEach(cat => {
        cat.addEventListener("click", event => {
            selectedCat = event.currentTarget.id;
            //alert(selectedCat);
            applyFilter();
        });
    });
    const applyFilter = () => {
        [...elements].forEach(element => {
            element.classList.remove("active");
        });
        let filteredElements = document.querySelectorAll("." + selectedYear + "." + selectedCat + ".hci-project");
        [...filteredElements].forEach(element => {
            element.classList.add("active");
        });
    };*/

    /*$('#search-input').focusout(function() {
        var $search = $('.search-box');
            $search.toggleClass('open');  
    });*/

    }

    );
    