    
    //Filter Tax and Years
    var productCategorySelector;
    var rentCategorySelector;

    document.addEventListener('DOMContentLoaded', function () {
        productCategorySelector = document.querySelector("#products_selector");
        rentCategorySelector = document.querySelector("#rent_selector");
        brandCategorySelector = document.querySelector("#brand_selector");
        
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

    });
      
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




