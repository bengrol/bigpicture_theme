<?PHP 
$cgv = [
    'en-US' =>540,
    'fr-FR' => 476,
     'de-DE'=>2597
    ];
$getCurrentbigpicturePage =  get_permalink( $post->ID );
?>
<article class="art-chambre">
    <header class="header-colipsable" data-state="inactive"  
            style="background-image : url(<?= getImageHeader(); ?>);">
        <div class="overlay"></div>
        <h1><?php 
        _e( get_post_meta(get_the_ID(), '_type-chambre', true), 'bigpicture');
        echo ' ';
        the_title(); 
        ?></h1>
        <span class="detail-header"><?php getPriceRange(); ?> </span>
        
    </header>
    
    <section class="sec-chambre" style="display: none ">
        <div class="row">
            <div class="col-lg-6 chambre-icon-set"> <!--  left column-->
                <div class="row"> 
                    <div><i class="fa fa-bed fa-2x"></i><?php _e('Lit Double', 'bigpicture'); ?> 2x2m</div>
                    <div><i class="fa fa-arrows-alt fa-2x"></i> <?php echo get_post_meta(get_the_ID(), '_surface-chambre', true) ?>M&sup2;  </div>    
                </div >
                
                <div class="row">
                    <div><i class="fontcustom icon-shower"></i><?php _e('Douche', 'bigpicture'); ?> </div>
                    <div><i class="fontcustom icon-sofa"></i><?php _e('coin salon', 'bigpicture'); ?></div>
                    <div><i class="fontello-icon icon-swimming">&#xe838;</i><?php _e('piscine', 'bigpicture'); ?></div>
                    <div><i class="fontello-icon icon-cab">&#xf1b9;</i><?php _e('parking', 'bigpicture'); ?></div>
                    <div><i class="fontello-icon icon-wifi">&#xf1eb;</i><?php _e('wifi', 'bigpicture'); ?></div>
                </div>
                
                <span><?php the_content(); ?></span>
            </div>
            <div class="col-lg-6" ><!--  right column-->
                <div class="col-lg-12" ><!--  photo -->
                    <?= getGallery('chambre');?>
                </div>
                <div class="col-lg-12 price-info" ><!--  price&info -->
                    <div class="col-lg-7 sec-prix">
                        <div class="">
                            <h3><?php getPriceRange(); ?>
                            </h3>
                        </div>
                        <div class="btn-grp-offres-resp" role="group" >
                       
                        <a target="_blank"  href="<?=  getBookingUrl();?>" class="btn-resa"><?php _e('Reserver', 'bigpicture'); ?></a>
                        
                        <?=getVisite360('chambre'); ?>
                       
		</div>
                        
                    </div>
                    <div class="col-lg-5 sec-info" >
                        
                        <span class="cgv"><a href="<?=get_permalink( $cgv[get_bloginfo('language')]); ?>"><?php _e('Conditions Generales de Vente', 'bigpicture'); ?></a></span>
                    
                    </div>
                    
                </div>
            </div>
        </div>
    </section>
    
</article>


