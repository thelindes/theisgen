    
    //Filter Tax and Years
    var productCategorySelector;
    var rentCategorySelector;

    document.addEventListener('DOMContentLoaded', function () {
        productCategorySelector = document.querySelector("#products_selector");
        productSelectorContainer = document.querySelector("#selector_container_1");
        rentCategorySelector = document.querySelector("#rent_selector");
        
        if(productCategorySelector != null){
            productCategorySelector.addEventListener("change", () => {
                applyFilter();
            });
        }

        if(rentCategorySelector != null){
            rentCategorySelector.addEventListener("change", () => {
                applyFilter();
            });
        }

    });
      
    const addOrRemoveClass = (productClasses, activatingClass, selectorValue) => {
        
        console.log(productClasses);
        if(productClasses.contains(activatingClass) && !productClasses.contains(selectorValue)){
            productClasses.remove(activatingClass);
        }

        if(!productClasses.contains(activatingClass) && productClasses.contains(selectorValue)) {
            productClasses.add(activatingClass);
        }

        if(selectorValue == "no_products_filter") {
            productClasses.add(activatingClass);
        }

        if(selectorValue == "no_rent_filter"){
            if(productClasses.contains("mietgeraete")){
                productClasses.add(activatingClass);
            }
        }
    }

    const applyFilter = () => {
        const products = document.querySelectorAll(".product-container");
        
        [...products].forEach(product =>  {
            
            let classes = product.classList;
            
            if(productCategorySelector.value != "mietgeraete"){
                rentCategorySelector.classList.remove("active");
                productSelectorContainer.classList.remove("col-md-6");
                addOrRemoveClass(classes, "active", productCategorySelector.value);
            } else {
                rentCategorySelector.classList.add("active");
                productSelectorContainer.classList.add("col-md-6");
                addOrRemoveClass(classes, "active", rentCategorySelector.value);
            }
        })
    };


