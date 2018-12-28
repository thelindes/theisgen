<?php get_header();
    // Get 'product' posts
    
    $product_posts = get_posts(array(
        'post_type'      => 'product',
        'posts_per_page' => -1, /*soviele wie möglich */
        'orderby'        => 'date',
        'orderby'        => 'ASC'
    ));                         
?>

    <div class="products-wrapper">
        <?php masterslider(1); ?>
        <div class="slider-spacer">
                <div class="row">
                    <div id="selector_container_1" class="col-12">
                        <select id="products_selector" class="filter-list filter-taxonomies active">
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
                    <div class="col-md-6 col-12">
                        <select id="rent_selector" class="filter-list filter-taxonomies">
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
                    </div>
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
                ?> 

                    <?php if($product_price > 1 || $prod_hourrent > 1 || $prod_dailyrent > 1): ?>
                    <div class="col-lg-2 col-md-3 col-sm-4 col-12 product-container active <?php echo implode(' ', $links) ?>"> 
                        <div class="outer-product-border">
                            <div class="inner-product-border">
                        <?php if ($product_img_src): ?>
                        <a href="<?php echo get_permalink($post)?>">
                            <img src="<?php echo $product_img_src; ?>" alt="<?php the_title(); ?>">
                        </a>
                        <?php endif;?>
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
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
<?php get_footer(); ?>