<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Theisgen.de</title>
	<?php wp_head();?>
</head>

<body>
    <div class="wrapper">
    <div class="sticky-header">
        <nav class="navigation">
            <!--navigation desktop -->
            <div class="navigation-container left">
                <ul class="left">
                    <?php wp_list_pages( '&title_li=&exclude=17, 60, 62'); ?>
                </ul>
            </div>
                <a class="center-logo" href="<?php echo get_home_url(); ?>">
                    <i class="icon icon-peter l"></i>
                    <h2>THEISGEN.DE</h2>
                </a>
            <div class="navigation-container right">
                <button id="search-button">
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
                    <?php wp_list_pages( '&title_li=&include=17, 60, 62'); ?>
                </ul>
            </div>
            <!-- navigation mobile -->
            
            <div class="navigation-container mobile">
                <div class="top-line">
                     <button id="mobile-menu-button">
                        <i class="icon icon-bars s"></i>
                    </button>
                    <button id="search-button-mobile">
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
                   <?php wp_list_pages( '&title_li=&exclude=17, 60, 62'); ?>
                       <?php wp_list_pages( '&title_li=&include=17, 60, 62'); ?>
                </ul>
            </div>
          
        </nav>
    </div>
    
    <div class="content-wrapper">

	