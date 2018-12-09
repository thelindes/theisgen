<div class="container">
    <div class="row">
        <div class="col-6">
            <h2>
                <span class="headline-text">
                    <?php the_title(); ?>
                </span>
                <span class="headline-date">
                    <?php the_date(); ?>
                </span>
            </h2>

        </div>

    
    <div class="col-6">
        <div class="thumbnail-container">
               <?php if ( has_post_thumbnail() ) : ?>
                    <?php the_post_thumbnail(); ?>
                <?php endif; ?>
        </div>
        <div class="post-text">


            <p><?php the_content(); ?></p>
        </div>
        </div>
    </div>
</div>