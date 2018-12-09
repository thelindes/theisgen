<?php get_header(); ?>
    <div class="container content"> 
        <section class="row">
            <div class="col-12">
                <?php if (!have_posts()) : ?>
                    <div class="alert alert-warning">
                        <?php _e('Sorry, no results were found.', 'theisgen'); ?>
                    </div>
                <?php endif; ?>

                <?php while (have_posts()) : the_post(); ?>
                  <article <?php post_class(); ?>>
                      <header>
                        <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                        <?php if (get_post_type() === 'post') { get_template_part('templates/entry-meta'); } ?>
                      </header>
                      <div class="entry-summary">
                        <?php the_excerpt(); ?>
                      </div>
                  </article>
                <?php endwhile; ?>
            </div>
        </section>
    </div>
<?php get_footer(); ?>