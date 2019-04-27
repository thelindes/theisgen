 <?php get_header(); 
	 $this_post = get_post();
	 $product_title = $this_post->post_title;
	 $product_brand = get_field('brand');
	 $product_type = get_field('article_type');
	 $product_price = get_field('price');
	 $product_special_offer = get_field('special_offer');
	 $prod_dailyrent = get_field('prod-dailyrent');
	 $prod_hourrent = get_field('prod-hourrent');
	 $product_description = get_field('prod-description');
	 $product_details = get_field('prod-details');
	 $terms = wp_get_post_terms( $this_post->ID, 'products_taxonomy');
	 $pictures = get_post_gallery_images(get_post());
	 $menu_left = wp_get_nav_menu_items('Menu_Links');
 	 $contact;
	 $companionProducts = [];
	 $menu_left = wp_get_nav_menu_items('Menu_Links');
	 $back_button;
 	 foreach($menu_left as $entry){
		  if($entry->title == "Produkte"){
			$back_button = $entry->url;
		  }
	  }

	 $product_posts = get_posts(array(
        'post_type'      => 'product',
        'posts_per_page' => -1, /*soviele wie möglich */
        'orderby'        => 'date',
        'orderby'        => 'ASC'
	));
	
 	foreach($menu_left as $item){
		 if($item->title == "Kontakt"){
			 $contact = $item;
		 }
	 };

	 foreach( $product_posts as $post ){
			setup_postdata( $post ); 
			$allproducts_rent_terms = get_the_terms($post-> ID, 'rent_taxonomy');
			$allproducts_terms = get_the_terms($post->ID, 'products_taxonomy');
			$allproducts_product_brand = get_field('brand');
				
		if( $allproducts_terms ){
			if($post->ID != $this_post->ID) {
				foreach ($allproducts_terms as $allproducts_term) {
					if(in_array($post, $companionProducts) == false && in_array($allproducts_term, $terms) ) {
						$companionProducts[] = $post;
					} 
				}
			}
		}
	};

	?>
	<div class="single">
		<div class="background_overlay">
			<div class="background_overlay_color">
				</div>
				<div class="contact_form_card">
					<a href="#" class="close"></a>
					<section class="form-container" >
							<h2>Kontaktformular</h2>
							<section class="contact_form_content">
							<?php echo do_shortcode("[contact-form-7 id='43' title='Kontaktformular 1']"); ?>
							</section>
                    </section>
				</div>									
		</div>
	
		<div class="content">
			<div class="container-fluid product-single">
				<div class="container">
					<div class="row spacer">
						<div class="col-12 justify-content-left">
							<a class="arrow-icon" href="<?php echo $back_button ?>" >
								<span class="left-icon"></span><span class="back-word">Zurück</span>
							</a>
							<h2 class="headline"><?php echo $product_brand . " " . $product_type ?></h2>
						</div>
					</div>
				</div>
				<div class="container">
					<div class="row justify-content-center">
						<div class="col-md-4 col-12">
							<div class="row">
								<div class="col-12">
								<div class="product-card">
									<?php if($pictures): ?>
										<div class="slider js_slider slider-shadow">
											<div class="frame js_frame">
												<ul class="slides js_slides">
												<?php if ( have_posts() ) : while ( have_posts() ) : the_post();
																	if ( $pictures ) {
																		foreach ( $pictures as $picture ) {
																			?>
																			<li class="js_slide"><img src="<?php echo $picture ?>"></li>
																			<?php
																		}
																	} else {
																		echo '<li class="js_slide"><img src="dist/img/default_product_img.jpg">';
																	}
																endwhile; endif; ?>
												</ul>
											<?php if(sizeOf($pictures) > 1) :?>
												<span class="js_prev prev companion-click ">
												<svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 501.5 501.5"><g><path fill="#8aa866" d="M302.67 90.877l55.77 55.508L254.575 250.75 358.44 355.116l-55.77 55.506L143.56 250.75z"/></g></svg>
												</span>
												<span class="js_next next companion-click ">
													<svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 501.5 501.5"><g><path fill="#8aa866" d="M199.33 410.622l-55.77-55.508L247.425 250.75 143.56 146.384l55.77-55.507L358.44 250.75z"/></g></svg>
												</span>
											<?php endif; ?>
											</div>
										</div>
									<?php endif; ?>
									<div class="product-information">
										
										<div class="product-details">
											<?php if($product_details) : ?>
												<?php echo $product_details;?>
											<?php endif; ?>
										</div>
									<button id="open-contact-form-button" class="main-button" value="<?php echo $product_title ?>"> Jetzt anfragen </button>
									</div> 
								</div>
							</div>
							</div>
						</div>
							<div class="col-md-8 col-12">
								<div class="row">
									<div class="col-12">
										<?php if($product_description): ?>
										<div class="product-description"><?php echo $product_description; ?></div>
										<?php endif; ?>
										<?php if($product_price > 1):  ?>
											<?php if($product_special_offer != null): ?>
												<p class="price-tag">Anstatt <span class="stroke"><?php echo $product_price?></span> € <span class="offer">nur <?php echo $product_special_offer ?> € </span></p>
											<?php endif; ?>	
											<?php if($product_special_offer == null): ?>
												<p class="price-tag">Kaufpreis: <?php echo $product_price?> €</p>
											<?php endif; ?>							
										<?php endif; ?>
										<?php if($prod_hourrent > 1):  ?>
										<p class="price-tag">Stundenmiete: <?php echo $prod_hourrent?> €</p>
										<?php endif; ?>
										<?php if($prod_dailyrent > 1):  ?>
										<p class="price-tag">Tagesmiete: <?php echo $prod_dailyrent?> €</p>
										<?php endif; ?>
										<div class="row">
											<div class="col-lg-6 col-12 taxonomy">
												<ul><?php if($terms): ?><li>Kategorien:</li><?php endif; ?>
												<?php foreach($terms as $term):
													?>
													<li><?php echo $term->name ?></li>
													<?php endforeach; ?>
												</ul>
											</div>
										</div>
									</div>
								</div>
							</div>
					</div>
				</div>
			</div>
			<div class="container-fluid product-single">
			<?php if($companionProducts != null): ?>
				<div class="container">
						<div class="row spacer">
							<div class="col-12 justify-content-left">
								<h2 class="headline" >Das könnte Sie auch interessieren:</h2>
							</div>
						</div>
					</div>
					<div class="row spacer">
						<div class="container py-5 px-5 products-content slim">
							
							<div id="companion-slide" class="row companion-slide">
								<?php
									foreach( $companionProducts as $companion ) : 
										$product_img_src = null;
											if (has_post_thumbnail($companion->ID)) {
												$src = wp_get_attachment_image_src(get_post_thumbnail_id($companion->ID), 'product-img');
												$product_img_src = $src[0];
											} else {
												$product_img_src = get_the_post_thumbnail_url();
											}
									
											$product_price = get_field('price', $companion->ID);
											$product_special_offer = get_field('special_offer', $companion->ID);
											$prod_dailyrent = get_field('prod-dailyrent', $companion->ID);
											$prod_hourrent = get_field('prod-hourrent', $companion->ID);
											$product_info = get_field('prod-info', $companion->ID);
											$product_brand_init = get_field('brand', $companion->ID);
											$product_type = get_field('article_type', $companion->ID);
								?>
								<?php if($product_price > 1 || $prod_hourrent > 1 || $prod_dailyrent > 1): ?>
									<div class="col-md-3 col-sm-4 col-6 product-container active <?php echo implode(' ', $links) ?>"> 
										<a href="<?php echo get_permalink($companion)?>" onclick="setSessionObject(js_obj_data)">
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
							<div class="arrows">
							<span id="cclickLeft" class="companion-click left">
								<svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 501.5 501.5"><g><path fill="#8aa866" d="M302.67 90.877l55.77 55.508L254.575 250.75 358.44 355.116l-55.77 55.506L143.56 250.75z"/></g></svg>
							</span>
							<span id="cclickRight" class="companion-click right">
								<svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 501.5 501.5"><g><path fill="#8aa866" d="M199.33 410.622l-55.77-55.508L247.425 250.75 143.56 146.384l55.77-55.507L358.44 250.75z"/></g></svg>
							</span>
										</div>
						</div>
					</div>
				</div>
			<?php endif; ?>
		</div>
	</div>
<?php get_footer(); ?> 

 
 