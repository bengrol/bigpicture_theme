</div><!-- #main -->
</div>

    <footer  class="civilite-footer row" role="contentinfo" id="footer-sec">
        
        <div id="footer-row" class="">

                <p class="col-md-6 col-sm-6 col-xs-12">

                    <p>DOMAINE DE PUYCHÊNE</p>
                    <p>85 route du Somail - 11120 Saint-Nazaire-d'Aude</p>
                    <p><i class="fa fa-phone"></i> - +33 (0)6 01 97 39 31</p>
                    <p><i class="fa fa-phone"></i> - +33 (0)6 11 64 49 19</p>

                    <p><a href="http://www.domaine-de-puychene.com" target="_blank">domaine-de-puychene.com</a>
                        --  <a href="https://fr-fr.facebook.com/DomaineDePuychene/"><i class="fa fa-facebook-official fa-2x"></i></a>
                    </p>
                    
                    
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12">
                    
                        <?php
                        $args = array(
                            'theme_location' => 'footer',
                            'container' => false,
                            'menu_class'      => 'link-footer',
                            
                        );
                        wp_nav_menu($args);
                        ?>
                    
                </div>
                
                
            
        </div>
        
        
        
    </footer> 


<?php wp_footer(); ?>

 
  
  

</body>
</html>