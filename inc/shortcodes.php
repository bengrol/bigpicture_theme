<?php


/**
 *  crée la visite virtuelle HD Media
 *  1er parametre -> url de la visite
 *  2em style de rendu
 * 
 *  1- link
 *  2- Iframe
 *  3- Panoramique cliquable
 *  4- Miniature Cliquable
 */
add_shortcode('hdMediaGallery', function ($param) {
    extract(
        shortcode_atts(
            array(
                'url' => '', 
                'style' => 1, 
                'id'=> rand(1, 1000)),
            $param
        )
    );
    
    $rtn ;
    switch ($style) {
        case 1:
            $rtn = hdMediaGetLink($url);
            break;
        case 2:
            $rtn = hdMediaGetIFrame($url);
            break;
        default:
            $rtn = hdMediaGetLink($url);
            break;
    }
    
    
    return $rtn;
}

);



function hdMediaGetLink($param){
    return  "<a target='_blank' class='linkvisite360' href='$param' > ".__('visite-virtuelle', 'bigpicture')." </a>";
}
function hdMediaGetIFrame($param){
    
    return "<div class='embed-responsive embed-responsive-16by9'><iframe src='$param' class='embed-responsive-item' scrolling=no frameborder=0> </iframe><br/></div>";
}

?>