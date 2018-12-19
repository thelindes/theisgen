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
                      <div class="col-12">
                    
                    <!-- dropdown einfügen -->
                    
                    
                    <select id="category-selector" class="filter-list filter-taxonomies">
                        <?php
                        $terms = get_terms('products_taxonomy');
                        $count = count($terms); //Term count          
                        echo '<option>Alle Produktkategorien</option>';
                        if ($count > 0) {
                            foreach ($terms as $term) {
                                    if($term->slug != 'mietgeraete'){
                                    $termname = strtolower($term->name);
                                    $termname = str_replace(' ', '-', $termname);
                                    $termname = str_replace('.', '-', $termname);
                                    echo '<option>' . $term->name . '</option>';
                                    }
                            }
                        } ?>
                    </select>
      
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
                
                        $terms = get_the_terms($post->ID, 'products_taxonomy');
                        $product_price = get_field('price');
                        $product_info = get_field('prod-info');
      
                if($terms){
                    $links = array();
                    
                    foreach ($terms as $term) {
                       
                            $links[] = $term->slug;
                        console_log($links);
                    }
                }
                ?> 
                  
                    <?php if ($links) :?>
                        <?php if (in_array('mietgeraete', $links) == false): ?>
                            <div class="col-sm-4 col-md-3 col-6 product-content <?php echo implode(' ', $links) ?>">  
                              <?php if ($product_img_src): ?>
                                 <img src="<?php echo $product_img_src; ?>" alt="<?php the_title(); ?>">
                              <?php endif;?>
                                <h3 class="lowercase"><?php the_title(); ?></h3>
                                <p class="price-tag"><?php echo $product_price; ?> €</p>
                            </div>   
                        <?php endif; ?>
                    <?php else: ?>
                    <div class="col-sm-4 col-md-3 col-6 product-content <?php echo implode(' ', $links) ?>">  
                            <?php if ($product_img_src): ?>
                                <img src="<?php echo $product_img_src; ?>" alt="<?php the_title(); ?>">
                            <?php endif;?>
                            <h3 class="lowercase"><?php the_title(); ?></h3>
                            <!--<p><?php echo $product_info; ?></p>-->
                            <p class="price-tag"><?php echo $product_price; ?> €</p>
                        </div>   
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
<?php get_footer(); ?>