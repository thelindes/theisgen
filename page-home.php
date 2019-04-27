<?php  
/*
* Template Name: Home-Page
*/
get_header();
	$product_posts = get_posts(array(
		'post_type'      => 'product',
		'posts_per_page' => -1, /*soviele wie möglich */
		'orderby'        => 'date',
		'orderby'        => 'ASC'
	));

	$this_post = get_post();
	$content = $this_post->post_content;
	$content = get_normalizedText($content);
	$masterSliderNumber = get_SliderId($content);
	$content = clean ($content, "slider");
	$servicesHeadline = get_contentPart($content , "h2"); 
	$services = get_contentPart($content , "ul"); 
	
	$servicesList = get_liAsList($services);
	$subtext = clean($content, $servicesHeadline);
	$subtext = clean($subtext, $services);
	
	$welcome_icon = get_field("welcome-icon");
?>
	<?php masterslider($masterSliderNumber); ?>
	<div class="container-fluid index">
		<div class="row footer padding-top">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="index-text">
							<?php echo $servicesHeadline ?>
							<p><?php echo $subtext ?></p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row footer padding-bottom">
			<div class="container py-5 px-5">
				<div class="row">
				<?php foreach($servicesList as $service) :
						$picture = null;
						$headline = null;
						$subtext = null;
						$iterator = -1;
						if(strlen($service[1]) > 2) {
							$picture = $service[1];

							console_log($picture);
						}

						if(strlen($service[2]) > 2) {
							$subtext = $service[2];
						}

						if(strlen($service[0]) > 2) {
							$headline = $service[0];
						}
						$iterator++;
						?>
						<?php if($headline != null): ?>
							<div class="col-lg-3 col-md-4 col-sm-6 col-12 product-container active">
								<div class="outer-product-border">
									<div class="inner-product-border">
											<div class="index-text">
												<div class="img">
													<?php if($picture != null) : echo $picture ?><?php endif; ?>
												</div>
												<?php if($headline != null) : echo $headline ?><?php endif; ?>
												<p><?php if($subtext != null) : echo $subtext ?><?php endif; ?></p>
											</div>
									</div>
								</div>
							</div>
						<?php endif; ?>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
		<div class="row footer spacer">
			<div class="container py-5 px-5 products-content">
				<div class="row">
					<?php  
						$iterator = 0;
						foreach($product_posts as $post) :
								if (has_post_thumbnail($post->ID)) {
									$src = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'product-img');
									$product_img_src = $src[0];
								} else {
									$product_img_src = get_the_post_thumbnail_url();
								}
								$terms = get_the_terms($post->ID, 'products_taxonomy');
								$product_special_offer = get_field('special_offer');
								$product_price = get_field('price');
								$prod_dailyrent = get_field('prod-dailyrent');
								$prod_hourrent = get_field('prod-hourrent');
								$product_info = get_field('prod-info');
								$product_brand = get_field('brand');
								if($product_special_offer != null && $product_special_offer != ""){
									$iterator++;
								}
						
					?>
					<?php if($iterator < 4 && $product_special_offer != null && $product_special_offer != "") :?>
					<div class="container">
					<div class="row">
						<div class="index-text">
							<h2>Aktuell im Angebot </h2>
						</div>
					</div>
				</div>
						<div class="col-lg-3 col-md-4 col-sm-6 col-12 product-container active"> 
								<a href="<?php echo get_permalink($post)?>">
								<div class="outer-product-border">
									<div class="inner-product-border">
										<div class="img">
											<img src="<?php echo $product_img_src; ?>" alt="<?php the_title(); ?>">
										</div>
										<div class="text">
											<h3 class="lowercase"><?php the_title(); ?></h3>
											<p class="price-tag">Preis: <span class="stroke"><?php echo $product_price; ?> €</span></p>
											<p class="price-tag">Angebot: <span class="offer"><?php echo $product_special_offer; ?> €</span></p>
											<?php if($product_special_offer == null): ?>
												<p class="price-tag">Preis: <?php echo $product_price; ?> €</p>
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
	</div>
	
	

</div>
<?php get_footer(); ?> 