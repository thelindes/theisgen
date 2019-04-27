<?php get_header();
    
    // Get 'product' posts
    $brand_terms;
    $product_posts = get_posts(array(
        'post_type'      => 'product',
        'posts_per_page' => -1, /*soviele wie möglich */
        'orderby'        => 'date',
        'orderby'        => 'ASC'
    ));

    $this_post = get_post();
    $content = $this_post->post_content;
    $number = get_SliderId($content);
?>

    <div class="products-wrapper">
        <div class="slider-spacer">
                <div class="row stretched">
                    <div class="col-sm-4 col-12 ">
                        <select id="products_selector" class="container filter-list filter-taxonomies active">
                            <?php
                            $terms = get_terms('products_taxonomy');
                            $count = count($terms); //Term count          
                            echo '<option value="no_products_filter">Alle Produktkategorien</option>';
                            if ($count > 0) {
                                foreach ($terms as $term) {
                                    $termname = strtolower($term->name);
                                    $termname = str_replace(' ', '-', $termname);
                                    $termname = str_replace('.', '-', $termname);
                                    echo '<option value="'. $term->slug . '">' . $term->name . '</option>';
                                }
                            } ?>
                        </select>
                    </div>
                      <div class="col-sm-4 col-12 ">  
                       <select id="brand_selector" class="container filter-list filter-taxonomies active">
                            <?php
                            $iterator = 0;
                            foreach($product_posts as $post){
                                if(in_array($post->brand, $brand_terms) == false){
                                    $brand_terms[$iterator++] = $post->brand;
                                }
                            }
                            sort($brand_terms);
                            $count = count($brand_terms); //Term count          
                            echo "<option value='no_brand_filter'>Alle Marken</option>";
                            if ($count > 0) {
                                foreach ($brand_terms as $term) {
                                        if($term != ""){
                                        $termname = strtolower($term);
                                        $termname = str_replace(' ', '-', $termname);
                                        $termname = str_replace('.', '-', $termname);
                                        $termname = str_replace("ä", "ae", $termname);
                                        $termname = str_replace("ü", "ue", $termname);
                                        $termname = str_replace("ö", "oe", $termname);
                                        $termname = str_replace("Ä", "Ae", $termname);
                                        $termname = str_replace("Ü", "Ue", $termname);
                                        $termname = str_replace("Ö", "Oe", $termname);
                                        $termname = str_replace("ß", "ss", $termname);
                                        $termname = str_replace("´", "", $termname);
                                        echo '<option value="'. $termname . '">' . $term . '</option>';
                                        }
                                }
                            } ?>
                        </select>
                        </div>
                        <div class="col-sm-4 col-12 ">
                        <select id="attributes_selector" class="container filter-list filter-taxonomies active">
                            <option value="date">Nach Einstelldatum sortieren</option>
                            <option value="alphabet_asc">A-Z sortieren</option>
                            <option value="alphabet_desc">Z-A sortieren</option>
                            <option value="price_asc">Nach Preis sortieren / aufsteigend</option>
                            <option value="price_desc">Nach Preis sortieren / absteigend</option>
                        </select>
                        </div>
              </div>  
        </div>
    </div>
        <div class="container-fluid products-padding">
            <div id="products-showroom" class="row">
                <?php 
                    foreach(  $product_posts as $post ) : 
                    $links = array();
                    setup_postdata( $post ); 
                    $product_img_src = null;
                        
                        if (has_post_thumbnail($post->ID)) {
                            $src = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'product-img');
                            $product_img_src = $src[0];
                        } else {
                            $product_img_src = get_the_post_thumbnail_url();
                        }
                
                        $rent_terms = get_the_terms($post-> ID, 'rent_taxonomy');
                        $product_date = $post -> post_date;
                        $terms = get_the_terms($post->ID, 'products_taxonomy');
                        $product_price = get_field('price');
                        $product_special_offer = get_field('special_offer');
                        $prod_dailyrent = get_field('prod-dailyrent');
                        $prod_hourrent = get_field('prod-hourrent');
                        $product_info = get_field('prod-info');
                        $product_brand_init = get_field('brand');
                        $product_brand = get_field('brand');
                        $product_type = get_field('article_type');
                        $product_brand = strtolower($product_brand);
                        $product_brand = str_replace(' ', '-', $product_brand);
                        $product_brand= str_replace('.', '-', $product_brand);
                        $product_brand = str_replace("ä", "ae", $product_brand);
                        $product_brand = str_replace("ü", "ue", $product_brand);
                        $product_brand = str_replace("ö", "oe", $product_brand);
                        $product_brand = str_replace("Ä", "Ae", $product_brand);
                        $product_brand = str_replace("Ü", "Ue", $product_brand);
                        $product_brand = str_replace("Ö", "Oe", $product_brand);
                        $product_brand = str_replace("ß", "ss", $product_brand);
                        $product_brand = str_replace("´", "", $product_brand);
      
                if($terms){
                    foreach ($terms as $term) {
                        $links[] = $term->slug;
                    }
                }

                if($rent_terms){
                    foreach ($rent_terms as $term) {
                        $links[] = $term->slug;
                    }
                }

                $links[] = $product_brand;
                $idToSort = $product_brand . "_" . $product_type; 
                ?> 
                <!--$product_price > 1 || $prod_hourrent > 1 || $prod_dailyrent > 1-->
                 <?php if(true): ?>
                    <div id="<?php echo $idToSort; ?>" data-price="<?php echo $product_price; ?>" data-date="<?php echo $product_date; ?>" class="col-lg-2 col-md-3 col-sm-4 col-6 product-container active <?php echo implode(' ', $links) ?>"> 
                        <a href="<?php echo get_permalink($post)?>">
                        <div class="outer-product-border">
                            <div class="inner-product-border">
                                <?php if ($product_img_src): ?>
                                    <img src="<?php echo $product_img_src; ?>" alt="<?php echo $product_brand_init . " " . $product_type ?>">
                                <?php endif;?>
                                <div class="text">
                                    <h3 class="lowercase"><?php echo $product_brand_init . " " . $product_type ?></h3>
                                    <?php if($product_price > 1): ?>
                                        <?php if($product_special_offer != null): ?>
                                            <p class="price-tag">Preis: <span class="stroke"><?php echo $product_price; ?> €</span></p>
                                            <p class="price-tag">Angebot: <span class="offer"><?php echo $product_special_offer; ?> €</span></p>
                                        <?php endif; ?>
                                        <?php if($product_special_offer == null): ?>
                                            <p class="price-tag">Preis: <?php echo $product_price; ?> €</p>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                    <?php if($prod_hourrent > 1) :?>
                                        <p class="price-tag">Miete/Stunde: <?php echo $prod_hourrent; ?> €</p>
                                    <?php endif; ?>
                                    <?php if($prod_dailyrent > 1) : ?>
                                        <p class="price-tag">Miete/Tag: <?php echo $prod_dailyrent; ?> €</p>
                                    <?php endif; ?>
                                </div>  
                            </div>
                        </div> 
                        </a>
                    </div>  
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
<?php get_footer(); ?>

<!--<div id="filtered_products_result"><?php echo do_shortcode("[my_ajax_filter_search]"); ?>-->