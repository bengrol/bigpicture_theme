<?php
/*
  Template Name: Page Accueil
 */

get_header(); ?>

<!-- front-page -->

<div id="primary" class="content-area ">
    <?php  echo do_shortcode('[metaslider title="slider accueil"]'); ?>
</div>
<div class="redBorder row" id="content">
    <div class="site-content container col-md-offset-3 col-md-8" >
        <?php
        if (have_posts()) :
            while (have_posts()) : the_post();
                ?>
                <article >
                    <section class=" ">
                        <h1 class="titre-page"><?php the_title(); ?></h1>
                        <p><?php the_content(); ?></p>
                    </section>
                </article>
            <?php endwhile;
        endif;
        ?>
   
	
	            
        <?php /* archive de page */
			$temp = 'chambres';
			$args = array( 
			'post_type' => $temp,
			'posts_per_page' => 4,
			'meta_key'   => '_post-type-chambre-encart',  // toute les chambres ayant un prix 
			'meta_value' => 'oui'        
			);

			$loop = new WP_Query( $args );
		?>
    
    
    <article class="art-encart">
        <H2 style="text-align: center;" ><?php _e('Location de maisons de vacances du domaine de Puychene', 'bigpicture'); ?></H2>
         <?php

     while ( $loop->have_posts() ) : $loop->the_post(); 
        

     get_template_part( 'content', $temp.'-simple' );

     endwhile; wp_reset_query();       
     ?>
  
    
    </article>

	
	 </div><!-- content-area -->

	
</div>
<?php get_footer(); ?>