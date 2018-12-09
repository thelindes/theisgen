jQuery(
    function($) {
/*
    var $navigation = $('.navigation');
    var $contentWrapper = $('.content-wrapper');

    if (localStorage.getItem('menuOpen') === 'true') {
        $navigation.addClass('open-no-animation');
        $contentWrapper.addClass('navigation-open-no-animation');
    }*/

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
        console.log($identifier);
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