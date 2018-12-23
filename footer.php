<?php wp_footer(); 
    $contactinfo_posts = get_posts(array(
        'post_type'      => 'contactinfo',
        'posts_per_page' => -1, /*soviele wie möglich */
        'orderby'        => 'date',
        'orderby'        => 'ASC'
    ));   

    $menu_left = wp_get_nav_menu_items('Menu_Links');
    $menu_right = wp_get_nav_menu_items('Sonstige_Informationen');
?>

    <div class="container-fluid footer">
        <div class="content">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-md-3 col-sm-12 ">
                        <ul class="list-pages">
                            <h2>Unser Angebot</h2>
                            <?php foreach($menu_left as $menu_item):
                            ?>
                                <li><a href="<?php echo $menu_item->url ?>"><?php echo $menu_item->title ?></a></li>
                            <?php endforeach; ?>
                        </ul>   
                    </div>
                    <div class="col-md-3 col-sm-12">
                        <ul class="list-pages">
                            <h2>Sonstige Informationen</h2>
                            <?php foreach($menu_right as $menu_item):
                            ?>
                                <li><a href="<?php echo $menu_item->url ?>"><?php echo $menu_item->title ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <div class="col-md-3 col-sm-12">
                        <ul class="list-pages">
                            <h2 >Freunde</h2>
                            <?php foreach( $contactinfo_posts as $post ) : 
                                setup_postdata( $post ); 
                            ?>
                                <?php echo get_field('friends'); ?>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <div class="col-md-3 col-sm-12">
                        <ul class="list-pages">
                        <h2 >Soziale Medien</h2>
                        <?php foreach( $contactinfo_posts as $post ) : 
                            setup_postdata( $post ); 
                        ?>
                        <li>
                            <a target="_blank" href="<?php echo get_field('facebook'); ?>"><i class="icon icon-facebook"></i>
                            </a>
                        </li>
                        
                        <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
        </div>
                        </div>
    </div>

  <!--   <div class="footer-wrapper">
        <div class="footer-content">
            <ul class="list-pages">
                <p>Unser Angebot</p>
                <?php foreach($menu_left as $menu_item):
                ?>
                    <li><a href="<?php echo $menu_item->url ?>"><?php echo $menu_item->title ?></a></li>
                <?php endforeach; ?>
            </ul>        
            <ul class="list-pages">
                <p>Sonstige Informationen</p>
                <?php foreach($menu_right as $menu_item):
                ?>
                    <li><a href="<?php echo $menu_item->url ?>"><?php echo $menu_item->title ?></a></li>
                <?php endforeach; ?>
            </ul>
            <ul class="list-pages">
                <p>Soziale Medien</p>
                 <?php foreach( $contactinfo_posts as $post ) : 
                    setup_postdata( $post ); 
                  ?>
                <li>
                    <a target="_blank" href="<?php echo get_field('facebook'); ?>"><i class="icon icon-facebook"></i>
                    </a>
                </li>
                <?php endforeach; ?>
            </ul>
            <ul class="list-pages">
                 <?php foreach( $contactinfo_posts as $post ) : 
                    setup_postdata( $post ); 
                  ?>
                <?php endforeach; ?>
            </ul>
        </div>
        <div class="back-to-main">
        </div>
    </div> -->

    </div><!-- /.content-wrapper -->
    </div><!-- /.navigation_and_content -->
    </div><!-- /.wrapper -->
  </body>
</html>