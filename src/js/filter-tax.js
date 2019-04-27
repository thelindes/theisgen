   
    //Filter Tax and Years
    var productCategorySelector;
    var rentCategorySelector;
    var attributesSelector;
    var productsInitial;
    var productsShowroom;

    document.addEventListener('DOMContentLoaded', function () {
        productCategorySelector = document.querySelector("#products_selector");
        rentCategorySelector = document.querySelector("#rent_selector");
        brandCategorySelector = document.querySelector("#brand_selector");
        attributesSelector = document.querySelector("#attributes_selector");
        productsInitial = document.querySelectorAll(".product-container");
        productsShowroom = document.querySelector("#products-showroom");
        
        if(productCategorySelector != null){
            productCategorySelector.addEventListener("change", () => {
                applyFilter();
            });
        }

        if(rentCategorySelector != null){
            rentCategorySelector.addEventListener("change", () => {
                applyRentFilter();
            });
        }

        if(brandCategorySelector != null){
            brandCategorySelector.addEventListener("change", () => {
                applyBrandFilter();
            });
        }

        if(brandCategorySelector != null){
           attributesSelector.addEventListener("change", () => {
               if(attributesSelector.value == "alphabet_asc") {
                   applyAlphabeticalAscFilter();
               }

                if(attributesSelector.value == "alphabet_desc") {
                    applyAlphabeticalDescFilter();
                }

               if(attributesSelector.value == "price_asc") {
                    applyPriceAscFilter();
               }
               
               if(attributesSelector.value == "price_desc") {
                    applyPriceDescFilter();
               }

               if(attributesSelector.value == "date") {
                    applyDateAscFilter();
               }
            });
        }

    });

    function setSessionObject(input) {
        console.log(input);
    }
      
    const addOrRemoveClass = (productClasses, activatingClass, selectorValue, type) => {
        
        if(type == "brand"){
            if(selectorValue == "no_brand_filter") {
                if(productCategorySelector.value == "no_products_filter" || productClasses.contains(productCategorySelector.value)){
                    productClasses.add(activatingClass);
                } else {
                    productClasses.remove(activatingClass);
                }
            } else {
                if(productClasses.contains(productCategorySelector.value) || productCategorySelector.value == "no_products_filter"){
                    if(productClasses.contains(brandCategorySelector.value) || brandCategorySelector.value == "no_brand_filter"){
                        productClasses.add(activatingClass);
                    } else {
                        productClasses.remove(activatingClass); 
                    }
                } 
            }
        }

        if(type == "product"){
            if(selectorValue == "no_products_filter") {
                if(brandCategorySelector.value == "no_brand_filter" || productClasses.contains(brandCategorySelector.value)){
                    productClasses.add(activatingClass);
                } else {
                    productClasses.remove(activatingClass);
                }
            } else {
                if(productClasses.contains(brandCategorySelector.value) || brandCategorySelector.value == "no_brand_filter"){
                    if(productClasses.contains(productCategorySelector.value) || productCategorySelector.value == "no_products_filter"){
                        productClasses.add(activatingClass);
                    } else {
                        productClasses.remove(activatingClass); 
                    }
                        
                } 
            }
        }

        if(type == "rent"){
            if(selectorValue == "no_rent_filter"){
                if(productClasses.contains("mietgeraete")){
                    productClasses.add(activatingClass);
                }
            } else {
                if(productClasses.contains(activatingClass) && !productClasses.contains(selectorValue)) {
                    productClasses.remove(activatingClass);
                } else {
                    productClasses.add(activatingClass);
                }
            }
        }
    }

    const applyFilter = () => {
        const products = document.querySelectorAll(".product-container");
        
        [...products].forEach(product =>  {
            
            let classes = product.classList;
            
            addOrRemoveClass(classes, "active", productCategorySelector.value, "product");
        })
    };

    const applyRentFilter = () => {
        const products = document.querySelectorAll(".product-container");
        [...products].forEach(product =>  {
            
            let classes = product.classList;
            
            addOrRemoveClass(classes, "active", rentCategorySelector.value, "rent");
        })
    }

    const applyBrandFilter = () => {
        const products = document.querySelectorAll(".product-container");
        [...products].forEach(product =>  {
            
            let classes = product.classList;
            
            addOrRemoveClass(classes, "active", brandCategorySelector.value, "brand");
        })
    }

    const applyAlphabeticalAscFilter = () => {

        const products = productsInitial;
        let idArray = [].slice.call(products).sort(function (a,b) {
            return a.id > b.id ? 1: -1;
        });

        idArray.forEach(function (p) {
            productsShowroom.appendChild(p);
        });
    }

    const applyAlphabeticalDescFilter = () => {

        const products = productsInitial;
        let idArray = [].slice.call(products).sort(function (a,b) {
            return a.id < b.id ? 1: -1;
        });

        idArray.forEach(function (p) {
            productsShowroom.appendChild(p);
        });
    }

    const applyPriceAscFilter = () => {
        const products = productsInitial;
        let priceArray = [].slice.call(products).sort((a,b) =>
            parseFloat(a.dataset.price) - parseFloat(b.dataset.price)
        );

        priceArray.forEach(function (p) {
            productsShowroom.appendChild(p);
        });
    }

    const applyPriceDescFilter = () => {
        const products = productsInitial;
        let priceArray = [].slice.call(products).sort((a,b) =>
            parseFloat(b.dataset.price) - parseFloat(a.dataset.price)
        );

        priceArray.forEach(function (p) {
            productsShowroom.appendChild(p);
        });
    }

    const applyDateAscFilter = () => {
        const products = productsInitial;
        let dateArray = [].slice.call(products).sort((a,b) =>
        new Date(b.dataset.date) - new Date(a.dataset.date)
        );

        dateArray.forEach(function (p) {
            productsShowroom.appendChild(p);
        });
    }

