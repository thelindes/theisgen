<!DOCTYPE html>
<html lang="en">

<?php 
    $menu_left = wp_get_nav_menu_items('Menu_Links');
    $menu_right = wp_get_nav_menu_items('Menu_Rechts');
    $main_menu = wp_get_nav_menu_items('Hauptmenu');
    $datasecurity = wp_get_nav_menu_items('Datenschutz')->url;
    $blog_info = get_bloginfo();
    $blogposts = get_posts(get_cat_ID("Roboter"));
    $disclaimer_post;
    
    foreach($blogposts as $blogpost) {
        $categories = get_the_category( $blogpost->ID );
        foreach($categories as $category){
            if($category->slug == "disclaimer"){
                $disclaimer_post = $blogpost;
            }
        }
    }
    $content = $disclaimer_post->post_content;
    $pictures = get_post_gallery_images($disclaimer_post);
    $startPictureTag = strpos($content, '[');
    $endPictureTag = strpos($content, ']');
    $pictureTag = substr($content, $startPictureTag, $endPictureTag+1);
/*    $content = str_replace($pictureTag, "", $content);
    $content = strip_tags($content);*/


?>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<title><?php echo $blog_info ?></title>
	<?php wp_head();?>
</head>


<body>
   <div class="dialog-overlay disabled">
        <div class="dialog">
            <div class="card">
                <div class="text-container">
                    <h3><?php echo $disclaimer_post->post_title ?></h3>
                    <p><?php echo $content ?></p>
                </div>
                <button id="submit-disclaimer" class="main-button" value="true">Zustimmen</button>   
            </div>
        </div>
    </div>
    <div class="wrapper">
    <div class="sticky-header">
        <nav class="navigation">
            <!--navigation desktop -->
            <div class="navigation-container left">
                <ul class="left">
                    <?php foreach($menu_left as $menu_item):
                    ?>
                    <li><a href="<?php echo $menu_item->url ?>"><?php echo $menu_item->title ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>
                <a  class="center-logo" href="<?php echo get_home_url(); ?>">
                <?php if(get_theme_mod( 'm1_logo' ) != null): ?>
                   <img class="main-logo" src="<?php echo get_theme_mod( 'm1_logo' ); ?>" />
                <?php endif; ?>
                <?php if(get_theme_mod( 'm1_logo' ) == null): ?>
                    <i class="icon main icon-peter xl"></i>
                  <!--   <h2><?php echo $blog_info ?></h2> -->
                 <?php endif; ?>
                </a>
            <div class="navigation-container right">
                <button id="search-button" class="icon-only">
                    <i class="icon icon-search-1 s"></i>
                </button>
                <div class="search-box"> 
                    <form role="search" method="get" id="search-form" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
                       <div class="search-content-wrapper">
                            <input type="search" name="s" id="search-input" placeholder="Suchen..." value="<?php echo esc_attr(get_search_query()); ?>">
                        </div>
			         </form> 
                </div>
                <ul class="right" >
                <?php foreach($menu_right as $menu_item):
                    ?>
                    <li><a href="<?php echo $menu_item->url ?>"><?php echo $menu_item->title ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <!-- navigation mobile -->
            
            <div class="navigation-container mobile">
                <div class="top-line">
                     <button id="mobile-menu-button" class="icon-only">
                        <i class="icon icon-bars s"></i>
                    </button>
                    <button id="search-button-mobile" class="icon-only">
                        <i class="icon icon-search-1 s"></i>
                    </button>
                    <div class="search-box"> 
                        <form role="search" method="get" id="search-form" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
                           <div class="search-content-wrapper">
                                <input type="search" name="s" id="search-input" placeholder="Suchen..." value="<?php echo esc_attr(get_search_query()); ?>">
                            </div>
                         </form> 
                    </div>
                    <div class="identifier">
                        <h2>Theisgen.de</h2>
                    </div>
                </div>
            </div>
            <div class="slide-navigation">
                  <ul >
                  <?php foreach($main_menu as $menu_item):
                    ?>
                    <li><a href="<?php echo $menu_item->url ?>"><?php echo $menu_item->title ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>
          
        </nav>
    </div>
    
    <div class="content-wrapper">

	