<?php get_header();
    // Get 'product' posts
    
    $brand_terms;
    $product_posts = get_posts(array(
        'post_type'      => 'product',
        'posts_per_page' => -1, /*soviele wie möglich */
        'orderby'        => 'date',
        'orderby'        => 'ASC'
    ));                         
?>

    <div class="products-wrapper rent">
        <div class="slider-spacer">
                <div class="row">
                        <select id="rent_selector" class="col-md-4 col-12 filter-list filter-taxonomies active">
                            <?php
                            $terms = get_terms('rent_taxonomy');
                            $count = count($terms); //Term count          
                            echo "<option value='no_rent_filter'>Alle Mietgerätekategorien</option>";
                            if ($count > 0) {
                                foreach ($terms as $term) {
                                        $termname = strtolower($term->name);
                                        $termname = str_replace(' ', '-', $termname);
                                        $termname = str_replace('.', '-', $termname);
                                        echo '<option value="'. $term->slug . '">' . $term->name . '</option>';
                                }
                            } ?>
                        </select>

                       <!--  <select id="brand_selector" class="col-md-4 col-12 filter-list filter-taxonomies active">
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
                                        $termname = strtolower($term);
                                        $termname = str_replace(' ', '-', $termname);
                                        $termname = str_replace('.', '-', $termname);
                                        echo '<option value="'. $term . '">' . $term . '</option>';
                                }
                            } ?>
                        </select> -->
              </div>  
        </div>
        <div class="container-fluid products-content">
            <div class="row">
                <?php foreach( $product_posts as $post ) : 
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
                        $terms = get_the_terms($post->ID, 'products_taxonomy');
                        $product_price = get_field('price');
                        $prod_dailyrent = get_field('prod-dailyrent');
                        $prod_hourrent = get_field('prod-hourrent');
                        $product_info = get_field('prod-info');
                        $product_brand = get_field('brand');
      
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
                ?> 
                    <?php if($product_price > 1 || $prod_hourrent > 1 || $prod_dailyrent > 1): ?>
                        <?php if(in_array("mietgeraete", $links) == true): ?>
                            <div class="col-lg-2 col-md-3 col-sm-4 col-12 product-container active <?php echo implode(' ', $links) ?>"> 
                                <a href="<?php echo get_permalink($post)?>">
                                <div class="outer-product-border">
                                    <div class="inner-product-border">
                                        <?php if ($product_img_src): ?>
                                            <img src="<?php echo $product_img_src; ?>" alt="<?php the_title(); ?>">
                                        <?php endif;?>
                                        <div class="text">
                                            <h3 class="lowercase"><?php the_title(); ?></h3>
                                            <?php if($product_price > 1): ?>
                                                <p class="price-tag">Kaufpreis: <?php echo $product_price; ?> €</p>
                                            <?php endif; ?>
                                            <?php if($prod_hourrent > 1) :?>
                                                <p class="price-tag">Stundenmiete: <?php echo $prod_hourrent; ?> €</p>
                                            <?php endif; ?>
                                            <?php if($prod_dailyrent > 1) : ?>
                                                <p class="price-tag">Tagesmiete: <?php echo $prod_dailyrent; ?> €</p>
                                            <?php endif; ?>
                                        </div>  
                                    </div>
                                </div> 
                                </a>
                            </div>
                        <?php endif; ?>  
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
<?php get_footer(); ?>