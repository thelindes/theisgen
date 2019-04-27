<?php get_header(); 
?> 
    <div class="search">
    <h2>Suchergebnisse</h2>

    <div class="row">
            <?php
        // TO SHOW THE PAGE CONTENTS
        while ( have_posts() ) : the_post(); 
            $this_post = get_post();
            $post_type = $this_post->post_type;

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

            if (has_post_thumbnail($post->ID)) {
                $src = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'product-img');
                $product_img_src = $src[0];
            } else {
                $product_img_src = get_the_post_thumbnail_url();
            }



        ?>

        <div id="<?php echo $idToSort; ?>" data-price="<?php echo $product_price; ?>" data-date="<?php echo $product_date; ?>" class="col-lg-2 col-md-3 col-sm-4 col-6 product-container active <?php echo implode(' ', $links) ?>"> 
                        <a href="<?php echo get_permalink($post)?>">
                        <div class="outer-product-border">
                            <div class="inner-product-border">
                                <?php if ($product_img_src): ?>
                                    <img src="<?php echo $product_img_src; ?>" alt="<?php the_title() ?>">
                                <?php endif;?>
                                <?php if($post_type != "product") :?>
                                <div class="text no-border">
                                    <h3><?php the_title() ?></h3>
                                    <p><?php the_content() ?></p>
                                </div>
                                <?php endif; ?>
                                <?php if($post_type == "product") :?>
                                <div class="text">
                                    <h3 class="lowercase"><?php the_title() ?></h3>
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
                                <?php endif; ?>
                            </div>
                        </div> 
                        </a>
                    </div>  
          
            <?php
                endwhile; //resetting the page loop
                wp_reset_query(); //resetting the page query
                ?>
            </div>
</div>
<?php get_footer(); ?>