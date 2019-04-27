<?php wp_footer(); ?>
<?php 
    
    $contactinfo_posts = get_posts(array(
        'post_type'      => 'contactinfo',
        'posts_per_page' => -1, /*soviele wie möglich */
        'orderby'        => 'date',
        'orderby'        => 'ASC'
    ));   

    $post_id = $contactinfo_posts[0] -> ID;
    $menu_left = wp_get_nav_menu_items('Menu_Links');
    $menu_right = wp_get_nav_menu_items('Sonstige_Informationen');
    $telephone = get_field('telefon', $post_id);
    $telefax = get_field('telefax', $post_id);
    $mobile = get_field('mobil', $post_id);
    $mail = get_field('standard-mail', $post_id);
    $address = get_field('adresse', $post_id);
    
?>
    <div class="container-fluid footer">
        <div class="content">
        <div class="row">
            <div class="container py-5 px-5">
                <div class="row">
                    <div class="col-lg-2 col-md-3 col-sm-12 ">
                        <ul class="list-pages">
                            <h2>Unser Angebot</h2>
                            <?php foreach($menu_left as $menu_item):
                            ?>
                                <li><a href="<?php echo $menu_item->url ?>"><?php echo $menu_item->title ?></a></li>
                            <?php endforeach; ?>
                        </ul>   
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-12 ">
                        <ul class="list-pages">
                            <h2>Sonstiges</h2>
                            <?php foreach($menu_right as $menu_item):
                            ?>
                                <li><a href="<?php echo $menu_item->url ?>"><?php echo $menu_item->title ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-12 ">
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-12 ">
                        <ul class="list-pages">
                            <h2 >Partner</h2>
                            <?php foreach( $contactinfo_posts as $post ) : 
                                setup_postdata( $post ); 
                            ?>
                                <?php echo get_field('friends'); ?>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-12 ">
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
                    <div class="col-lg-2 col-md-3 col-sm-12 ">
                        <ul class="list-pages">
                        <h2 >Kontakt</h2>
                        <?php if($address): ?>
                            <p><span><?php echo $address ?></span><br><br>
                        <?php endif; ?>
                        <?php if($telephone): ?>
                            <span>Tel: <?php echo $telephone ?></span><br>
                        <?php endif; ?>
                        <?php if($telefax): ?>
                            <span>Fax: <?php echo $telefax ?></span><br>`
                        <?php endif; ?>
                        <?php if($mobile): ?>
                            <span>Mobil: <?php echo $mobile ?></span></p>
                        <?php endif; ?>
                        <?php if($mail != null): ?>
                            <p><a href="mailto:<?php echo $mail ?>"><?php echo $mail ?></a></p>
                        <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
    </div><!-- /.content-wrapper -->
    </div><!-- /.navigation_and_content -->
    </div><!-- /.wrapper -->
  </body>
</html>