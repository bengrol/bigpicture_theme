<?php get_header(); ?>

    <div id="primary" class="content-area ">
        <?php echo do_shortcode('[metaslider title="slider accueil"]'); ?>
    </div>

    <!-- home-page -->
<?php if (have_posts()) : ?>
    <div class="row content-area" id="content">
        <section class="col-md-offset-3 col-md-6">
        <?php while (have_posts()) : the_post(); ?>

            <article>
                <h1 class="titre-page"><?php the_title(); ?><span></span></h1>

                <?php
                the_title(sprintf('<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h2>');
                ?>
                <p><?php the_excerpt(); ?></p>
            </article>

        <?php endwhile; ?>
        </section>
        <?php if (is_active_sidebar('bigpicture-sidebar-1')): ?>
        <section class="col-md-3">
            <?php dynamic_sidebar('bigpicture-sidebar-1'); ?>
        </section>
        <?php endif;
        ?>

    </div>
<?php endif; ?>

<?php get_footer(); ?>