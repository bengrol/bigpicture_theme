<?php
/*
  Template Name: Page Slider
 */

get_header(); ?>

<div id="primary" class="content-area ">
    <?php  // echo do_shortcode("[metaslider id=318]"); ?>
	 <?php //  echo do_shortcode('[metaslider title="slider accueil"]'); ?> 
     
    <?php 
    $numSlide = get_post_meta(get_the_ID(), '_bigpicture-meta-slider-home-page', true);
    
    if($numSlide !== 'null'){
        echo do_shortcode("[metaslider id=$numSlide]");
    }
    
    ?> 

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
    </div><!-- content-area -->
      
</div>  
    


    <?php get_footer(); ?>
