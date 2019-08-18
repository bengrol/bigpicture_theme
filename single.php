<?php get_header(); ?>
	<div id="primary" class="content-area">
        <div class="row">
            <section id="bandeau" class="bd-<?php echo( basename(get_permalink()) );?>" style="background-image: url('<?= getImageBandeau(); ?>')"></section>
        </div>
        <div class="row" id="content">
            <div  class="site-content container col-md-offset-3 col-md-8" role="main">
                <section class="chambre-list ">					
                    <?php while ( have_posts() ) : the_post(); ?>
                    <nav aria-label="...">
                        <ul class="pager">
                            <li class="previous"> 
                                <?php previous_post_link('%link', __('<i class="glyphicon glyphicon-chevron-left "></i> article precedent', 'bigpicture')); ?>                
                            </li>
                            <li class="next">
                                <?php next_post_link( '%link', __('article suivant <i class="glyphicon glyphicon-chevron-right "></i>', 'bigpicture')); ?>
                            </li>
                        </ul>
                    </nav>
                    <div class="entry-content" >
                        <h1 class="titre-page"><?php the_title(); ?></h1>
                        <p><?php the_content(); ?></p>
                    </div>
                    <?php endwhile; ?>
                </section>
            </div><!-- #content -->
        </div>
	</div><!-- #primary -->
<?php get_footer(); ?>