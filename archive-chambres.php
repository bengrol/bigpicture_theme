<?php get_header(); ?>
<div class="row" id="content">
    <div class="site-content container col-md-offset-1 col-md-10">
        
        <?php if (have_posts()) : ?>
            <?php while (have_posts()) : ?>
                <?php
                the_post();
               
              
                get_template_part('content-chambres');

            endwhile;
        endif;
        ?>
    </div>
</div>
<?php get_footer(); ?>