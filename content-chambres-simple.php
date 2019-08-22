<?php 
    $metaCustom = get_post_custom(get_the_ID()); 
    $sl = "_prix-chambre-periode";
    
    $listePrix = array();
    $surface = null;
    
    
    for($j=0; $j<=5; $j++){
         if(isset($metaCustom[$sl.$j])){
             array_push($listePrix, $metaCustom[$sl.$j][0]);   
         }
    }

    if(isset($metaCustom['_surface-chambre'])){
        $surface = $metaCustom['_surface-chambre'][0];
    }

?>




<section class="col-md-3 sec-chambre">
    <div class="thumbnail" style="text-align: center;" >
        <h3>
            <a href="<?= get_permalink(get_the_ID()); ?>" title="<?php _e('Location villa et maison vacances', 'bigpicture'); ?><?php the_title(); ?> " style="color: #a8b951;"  >
                <?php _e('Location Villa', 'bigpicture'); ?> <?php the_title(); ?>
            </a>
        </h3>
        <span class="detail-header">
            <?php 
            if(!empty($listePrix)){
                if(min($listePrix)!= max($listePrix)){
                    printf( __( 'A partir de %s&euro; /semaine', 'bigpicture' ), min($listePrix) );
                }  else {
                    printf( __( '%s /semaine', 'bigpicture' ), min($listePrix) );
                }
            }
            ?>
        </span>

        <div class="content-detail-chambre">
            <?= bigpicture_read_more(sprintf(__( 'Louer %s', 'bigpicture' ), get_the_title()));?>
        </div>
        <?= getGallery('chambre', 'archives'); ?>
    </div>
</section>

