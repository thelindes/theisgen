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

 	foreach($menu_left as $item){
		 if($item->title == "Kontakt"){
			 $contact = $item;
		 }
	 }
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
				<div class="row">
					<div class="col-12 justify-content-left">
						<h3><?php echo $product_brand . " " . $product_type ?></h3>
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
											<span class="js_prev prev">
											<svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 501.5 501.5"><g><path fill="#8aa866" d="M302.67 90.877l55.77 55.508L254.575 250.75 358.44 355.116l-55.77 55.506L143.56 250.75z"/></g></svg>
											</span>
											<span class="js_next next">
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
	</div>
	</div>
<?php get_footer(); ?> 

 
 