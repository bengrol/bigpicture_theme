<article class="art-chambre">
    <header class="header-colipsable" data-state="inactive"  
            style="background-image : url(<?=  getImageHeader() ?>);">
        <div class="overlay"></div>
        <h1><?php _e('Offre', 'bigpicture'); ?> <?php the_title(); ?></h1>
        <span class="detail-header">
            <?php echo get_post_meta(get_the_ID(), '_prix-offre', true); ?> &euro;</span>
    </header>
    
    <section class="sec-chambre" style="display: none ">
        <div class="row">
            <div class="col-lg-6">
                <span><?php the_content(); ?></span>
                 <div class="col-lg-12 price-info" ><!--  price&info -->
                    <div class="col-lg-12 sec-prix">
                        <div class="">
                            <h3><?php echo get_post_meta(get_the_ID(), '_prix-offre', true); ?> &euro;</h3>
                        </div>
                        <div class="btn-grp-offres" role="group" >
                            <a target="_blank" href="<?=  getBookingUrl();?>" class="btn-resa"><?php _e('Reserver', 'bigpicture'); ?></a>
                        </div>
                    </div>
                    <div class="col-lg-12 sec-info" >
                        <span class="cgv"><a href=""><?php _e('Conditions Generales de Vente', 'bigpicture'); ?></a></span>
                    </div>
                        
                </div>
                
            </div>
            <div class="col-lg-6" ><!--  right column-->
                <div class="col-lg-12" ><!--  photo -->
                    <?= getGallery('offre');?>
                </div>
               
            </div>
        </div>
        
    </section>
    
</article>



