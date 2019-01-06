<?php  
/*
* Template Name: Services-Page
*/
get_header();
	?>
<div class="container-fluid services">
	<div class="container">
		
				<?php
					$all_posts = get_posts();
					console_log($all_posts);
					$post_to_show;
					foreach($all_posts as $post) :
						$categories = get_the_category( $post->ID );
						foreach($categories as $category) {
							if($category->slug == "services"){
								$post_to_show = $post;
								$pictures = get_post_gallery_images($post);
								
								/* if ( $pictures ) {
									foreach ( $pictures as $picture ) {
										?>
										<img src="<?php echo $picture ?>">
										<?php
									}
								} else {
									echo '<img src="dist/img/default_product_img.jpg">';
								}
								*/
								$content = get_post_field('post_content', $post->ID);
								$startPictureTag = strpos($content, '[');
								$endPictureTag = strpos($content, ']');
								$pictureTag = substr($content, $startPictureTag, $endPictureTag+1);
								$content = str_replace($pictureTag, "", $content);
								$content = strip_tags($content);
								$iterator++;
							}
						}
						?>
				<div class="row align-items-center">						
					<?php if($iterator%2 == 0) :?>
						<div class="col-md-6 col-12">
							<div class="row">
								<div class="col-12">
									<img class="service-img" src="<?php echo $pictures[0]; ?>">
								</div>
							</div>
						</div>
						<div class="col-md-6 col-12">
							<div class="row">
								<div class="col-12">
									<div class="text-container">
										<h3 class="headline"><?php echo the_title() ?></h3>
										<p class="text"><?php echo $content; ?></p>
									</div>
								</div>
							</div>
						</div>
					<?php endif; ?>
					<?php if($iterator%2 != 0) :?>
						<div class="col-md-6 col-12">
							<div class="row justify-content-center">
								<div class="col-12">
									<div class="text-container">
										<h3 class="headline"><?php echo the_title() ?></h3>
										<p class="text"><?php echo $content; ?></p>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-6 col-12">
							<div class="row">
								<div class="col-12">
									<img class="service-img" src="<?php echo $pictures[0]; ?>">
								</div>
							</div>
						</div>
					<?php endif; ?>
			</div>
			<?php endforeach; ?>
	</div>
</div>
<?php get_footer(); ?> 