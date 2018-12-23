<?php  
/*
* Template Name: Home-Page
*/
get_header();
	$this_post = get_post();
	$content = $this_post->post_content;
	$welcome_icon = get_field("welcome-icon");
?>
<div class="container-fluid index">
	<div class="row justify-content-center">
		<div class="text-center col-md-8 col-12 welcome">
			<img src="<?php echo $welcome_icon ?>">
			<?php echo $content ?>
			<input id="index-button" type="button" value="Neuigkeiten"/>
		</div>
	</div>
	<div class="row justify-content-center">
			<iframe #fb-big src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fgartenfitness%2F&tabs=timeline&width=500px&height=1080px&small_header=true&adapt_container_width=false&hide_cover=true&show_facepile=false&appId" 
				width="500px" 
				height="1080px" 
				style="border:none;overflow:hidden" 
				scrolling="no" 
				frameborder="0" 
				allowTransparency="true" 
				allow="encrypted-media">
			</iframe>
			<!-- <iframe #fb-small src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fgartenfitness%2F&tabs=timeline&width=200px&height=1080px&small_header=true&adapt_container_width=false&hide_cover=true&show_facepile=false&appId" 
				width="200px" 
				height="1080px" 
				style="border:none;overflow:hidden" 
				scrolling="no" 
				frameborder="0" 
				allowTransparency="true" 
				allow="encrypted-media">
			</iframe> -->
	</div>
</div>
<?php get_footer(); ?> 