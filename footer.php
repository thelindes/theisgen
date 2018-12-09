<?php wp_footer(); 
    $contactinfo_posts = get_posts(array(
        'post_type'      => 'contactinfo',
        'posts_per_page' => -1, /*soviele wie möglich */
        'orderby'        => 'date',
        'orderby'        => 'ASC'
    ));   
?>

    <div class="footer-wrapper">
        <div class="footer-content">
            <ul class="list-pages">
                <p>Unser Angebot</p>
                <li>
                    <a href="<?php echo get_home_url(); ?>">Neuigkeiten</a>
                </li>
                 <?php wp_list_pages( '&title_li=&exclude=17, 60, 62'); ?>
            </ul>        
            <ul class="list-pages">
                <p>Sonstige Informationen</p>
                <?php wp_list_pages( '&title_li=&include=17, 60, 62'); ?>
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
    </div>

    </div><!-- /.content-wrapper -->
    </div><!-- /.navigation_and_content -->
    </div><!-- /.wrapper -->
  </body>
</html>