<?php get_header(); ?>

   <section id="bandeau" class="" style="background-image: url('<?= getImageBandeau() ?>')"></section>

    <!-- home-page -->
<?php if (have_posts()) : ?>
    <div class="row content-area" id="content">
        <section class="col-md-offset-3 col-md-6">
        <?php while (have_posts()) : the_post(); ?>

            <article>

                <?php
                the_title(sprintf('<a href="%s" rel="bookmark"><h1 class="titre-page">', esc_url(get_permalink())), '</h1></a>');	
                   
                
                if ( has_post_thumbnail() ) {
                        the_post_thumbnail('blog-article-sm-thumb');
                        }
                    ?>
				
                <p><?php the_excerpt('lire la suite'); ?></p>
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