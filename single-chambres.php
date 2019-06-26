<?php

get_header(); ?>

<div class="container-fluid" >
    <div class="row" id="content">
            <section class="chambre-list col-md-offset-1 col-md-10 ">
               

    <?php if ( have_posts() ) : ?>
            <header class="archive-header">
                <h1 class="archive-title"><?php ?></h1>
            </header><!-- .archive-header -->

            <?php /* The loop */ ?>
            <?php while ( have_posts() ) : the_post(); ?>
        
            
                <?php get_template_part('content-chambres'); ?>
            <?php endwhile; ?>
		

    <?php else : ?>
            <?php get_template_part( 'content', 'none' ); ?>
    <?php endif; ?>

    </div><!-- #content -->
</div><!-- #primary -->


<?php get_footer(); ?>

        
