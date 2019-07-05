<?php get_header(); ?>

    <div id="primary" class="content-area ">
        <?php  echo do_shortcode('[metaslider title="slider accueil"]'); ?>
    </div>

<?php if (have_posts()) :
    while (have_posts()) : the_post(); ?>

        <div class="row content-area" id="content">
        <article class="">
            <section class="col-md-offset-3 col-md-8">
                <h1 class="titre-page"><?php the_title(); ?><span></span></h1>
                        <?php
                        the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
                        ?>
                <p><?php the_excerpt(); ?></p>
            </section>
        </article>
    <?php endwhile;
endif; ?>
    </div>

<?php get_footer(); ?>