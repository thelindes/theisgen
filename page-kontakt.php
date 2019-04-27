<?php get_header();
    $contactinfo_posts = get_posts(array(
        'post_type'      => 'contactinfo',
        'posts_per_page' => -1, /*soviele wie möglich */
        'orderby'        => 'date',
        'orderby'        => 'ASC'
    ));   
?>  
    <div class="container-fluid contact first-child">
        <?php foreach( $contactinfo_posts as $post ) : 
                        setup_postdata( $post ); 
                        ?>
            <div class="container py-5 px-5">
            <div class="row">
                    <div class="col-md-6 col-12">
                        <div class="card scale-content">
                            <section class="single-container">
                                <h2>Kontaktinformationen</h2>
                                <div class="list">
                                    <div class="list-item">
                                        <div class="text">
                                            <?php if(get_field('adresse') ): ?>
                                                <h3>Adresse</h3>
                                                <p><?php echo get_field('adresse'); ?></p>
                                            <?php endif; ?>
                                        </div>
                                    </div>  
                                    <div class="list-item">
                                        <div class="text">
                                            <h3>Telefon</h3>
                                            <p>
                                            <?php if(get_field('telefon')): ?>
                                                <span>Festnetz: <?php echo get_field('telefon'); ?></span><br>
                                            <?php endif; ?>
                                            <?php if(get_field('telefax')): ?>
                                                <span>Fax: <?php echo get_field('telefax'); ?></span><br>
                                            <?php endif; ?>
                                            <?php if(get_field('mobil')): ?>
                                                <span>Mobil: <?php echo get_field('mobil'); ?></span><br>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="list-item">
                                        <?php if(get_field('standard-mail')): ?>
                                            <div class="text">
                                                <h3>E-Mail</h3>
                                                <p><a href="mailto:<?php echo get_field('standard-mail'); ?>"><?php echo get_field('standard-mail'); ?></a></p>
                                            </div>
                                        <?php endif; ?>
                                        
                                    </div>
                                    <div class="list-item">
                                        <div class="text">
                                        <h3>Öffnungszeiten</h3>
                                        <p><span><span>Mo - Fr: </span><?php echo get_field('week_from') ?> - <?php echo get_field('week_till') ?> Uhr </span><br>
                                        <span><span>Sa: </span><?php echo get_field('weekend_from') ?> - <?php echo get_field('weekend_till') ?> Uhr </span></p>
                                        </div>
                                    </div>
                                </div>
                            </section>   
                        </div>
                    </div>
                    <div class="col-md-6 col-12">       
                        <div class="card scale-content"> 
                            <section class="form-container" >
                                <h2>Kontaktformular</h2>
                                <?php echo do_shortcode("[contact-form-7 id='43' title='Kontaktformular 1']"); ?>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            
        <?php endforeach; ?>
    </div>
    <div class="container-fluid contact last-child">
        <div class="container py-5 px-5">
            <section>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2582.841086644962!2d10.885851315861995!3d49.65729345207564!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47a20344e4a9f21b%3A0xd89d5c213d1c1462!2sForst-%2C+Garten-+%26+Reinigungsger%C3%A4te+Theisgen!5e0!3m2!1sde!2sde!4v1541874767412" frameborder="0" style="border:0" allowfullscreen></iframe>
                </section>
        </div>
    </div>
<?php get_footer(); ?>
