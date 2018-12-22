<?php get_header();
    $contactinfo_posts = get_posts(array(
        'post_type'      => 'contactinfo',
        'posts_per_page' => -1, /*soviele wie möglich */
        'orderby'        => 'date',
        'orderby'        => 'ASC'
    ));   
    console_log($contactinfo_posts);
?>  
    <div class="container-fluid product-single">
        <div class="row">
            <section class="col-12">
            <h2>Anfahrt</h2>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2582.841086644962!2d10.885851315861995!3d49.65729345207564!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47a20344e4a9f21b%3A0xd89d5c213d1c1462!2sForst-%2C+Garten-+%26+Reinigungsger%C3%A4te+Theisgen!5e0!3m2!1sde!2sde!4v1541874767412" frameborder="0" style="border:0" allowfullscreen></iframe>
            </section>
        </div>    
        <div class="row">
            <div class="col-12">
                <div class="separator"></div>   
            </div>
        </div>
        <?php foreach( $contactinfo_posts as $post ) : 
                        setup_postdata( $post ); 
                    ?>
        <div class="row">
            <div class="col-lg-4 col-md-6 col-12">
                <section class="form-container" >
                    <h2>Kontaktformular</h2>
                    <?php echo do_shortcode("[contact-form-7 id='43' title='Kontaktformular 1']"); ?>
                </section>
            </div>
            <div class="col-lg-2 col-md-6 col-12">
                    <section class="single-container">
                        <h2>Adresse</h2>
                        <p><?php echo get_field('adresse'); ?></p>
                        <h2>Telefon</h2>
                        <p>
                        <span>Festnetz: <?php echo get_field('telefon'); ?></span><br>
                        <span>Fax: <?php echo get_field('telefax'); ?></span><br>
                        <span>Mobil: <?php echo get_field('mobil'); ?></span><br>
                        <h2>E-Mail</h2>
                        <p><a href="mailto:<?php echo get_field('standard-mail'); ?>"><?php echo get_field('standard-mail'); ?></a></p>
                    </section>   
                </div>
                <div class="col-lg-3  col-12">
                        <section class="single-container">
                            <h2>Öffnungszeiten</h2>
                            <p>
                                <span>
                                    Montag: <?php echo get_field('montag_von') ?> Uhr bis <?php echo get_field('montag_bis') ?> Uhr
                                </span><br>
                                <span>
                                    Dienstag: <?php echo get_field('dienstag_von') ?> Uhr bis <?php echo get_field('dienstag_bis') ?> Uhr
                                </span><br>
                                <span>Mittwoch: <?php echo get_field('mittwoch_von') ?> Uhr bis <?php echo get_field('mittwoch_bis') ?> Uhr</span><br>
                                <span>Donnerstag: <?php echo get_field('donnerstag_von') ?> Uhr bis <?php echo get_field('donnerstag_bis') ?> Uhr</span><br>
                                <span>Freitag: <?php echo get_field('freitag_von') ?> Uhr bis <?php echo get_field('freitag_bis') ?> Uhr</span><br>
                                <span>Samstag: <?php echo get_field('samstag_von') ?> Uhr bis <?php echo get_field('samstag_bis') ?> Uhr</span>
                            </p>
                        </section>
        </div>
        </div>
            
        <?php endforeach; ?>
    </div>

<?php get_footer(); ?>
