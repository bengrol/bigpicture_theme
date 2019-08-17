<?php
include 'inc/create-post-type.php';
include 'inc/shortcodes.php';
include 'inc/googleAnalytics.php';
//include 'inc/shortcodes-recap-prix-gite.php';
//include 'inc/favicon-gene.php';



function getHotelId(){
  $id= "";
  return $id;
}

function getCurrentLang(){
  $idLan = 1;
  if( get_bloginfo('language') == "fr-FR"){
    $idLan =4;
  }
  return  $idLan;
}

function getPriceRange(){
    global $post ;
    
    $prixbas = get_post_meta($post->ID, '_prix-bas-chambre', true);
    $prixhaut = get_post_meta($post->ID, '_prix-chambre', true);
        
    if(isset($prixbas) && $prixbas!=0){
        printf(__('de %s &euro; ', 'bigpicture').' '
                .__('à %s &euro; ', 'bigpicture').' '
                .__('jour', 'bigpicture'), $prixbas, $prixhaut );
    
    }
    else{
        print( $prixhaut.' &euro; /').__('jour', 'bigpicture');
    }
    
}


function getBookingUrl(){
  $mapping = [
         4 => 'fr-FR',
         1 => 'de-DE',
         2 => 'en-GB',
  ];

  global $post;
  $urlRes = "https://via.eviivo.com";
  $urlRes .= "/" . get_bloginfo('language');
  $urlRes .= "/Puychene11120";

  return $urlRes;
}

function getImageBandeau(){
    global $post;
     $image[0] =  get_template_directory_uri().'/images/bandeau-default.png';
     if(isset($post->ID)){
        if (get_post_thumbnail_id($post->ID)){
            $image = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large'); 
        }
     }
        return $image[0];
}

function getImageHeader(){
    global $post;
    
$imageData[0]= get_template_directory_uri().'/images/header-default-small.jpg';
// recupere l'image à la une
    if (has_post_thumbnail()) {
        unset($imageData);
        $imageData = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'large');
    }
    return $imageData[0];
    
    
}

function getVisite360($post_type){
   global $post;
   
    $post_type_visite = "_visite-".$post_type;
    $urlVisite = get_post_meta($post->ID, $post_type_visite, true);
    
        if($urlVisite){
        
            return do_shortcode('[hdMediaGallery url="'.$urlVisite.'" ]');
        
        }
    
}

function getGallery($post_type){
    $post_type_gallery = "_gallery-".$post_type;
    
    $gallery = get_post_meta(get_the_ID(), $post_type_gallery, true);
    
    $thumb = get_the_post_thumbnail(get_the_ID(), 'mediem');
    
    
if ($gallery) {
        return do_shortcode(get_post_meta(get_the_ID(), '_gallery-chambre', true));
    } elseif ($thumb) {
        return $thumb;
    } else {
        return '<img src="'.get_template_directory_uri().'/images/img-default.png" alt="image manguante" class="attachment-mediem"/>';
    } 
}

/*
* inclusion css - javascrit - etc
*
*/
function bigpicture_scripts_styles() {
	
    // styles
    wp_enqueue_style('style', get_stylesheet_uri());
    wp_enqueue_style( 'bigpicture-style', get_template_directory_uri().'/css/bootstrap.css' , array(), null );
    wp_enqueue_style( 'bigpicture-map', get_template_directory_uri().'/css/myStyle.css.map' , array(), null );
    wp_enqueue_style( 'bigpicture-style-map', get_template_directory_uri().'/css/bootstrap.css.map' , array(), null );
    wp_enqueue_style( 'bigpicture-fontawesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css' , array(), null );
    wp_enqueue_style( 'custom-font', get_template_directory_uri().'/fonts/fontcustom.css' , array(), null );

    
    // scripts
    wp_deregister_script('jquery');
    wp_enqueue_script( 'jquery', get_template_directory_uri().'/js/jquery.js' );
    wp_enqueue_script( 'jquery-ui', get_template_directory_uri().'/js/jquery-ui.js', array('jquery'), null, true);
    wp_enqueue_script( 'myjquery', get_template_directory_uri().'/js/myJs.js', array('jquery'), null, true);
    wp_enqueue_script( 'reservation-script', get_template_directory_uri().'/js/reservation.js', array(), null, true);
    
        
        
}
add_action( 'wp_enqueue_scripts', 'bigpicture_scripts_styles' );

//load_template(get_template_directory().'/inc/page-temp1.php');
/*
* 
*/
function bigpicture_setup(){
	/* permet traduction */
	load_theme_textdomain( 'bigpicture', get_template_directory() . '/languages' );

}
add_action( 'after_setup_theme', 'bigpicture_setup' );


// fonction pour re-attribuer un media à une page
add_filter("manage_upload_columns", 'upload_columns');
add_action("manage_media_custom_column", 'media_custom_columns', 0, 2);

function upload_columns($columns) {

	unset($columns['parent']);
	$columns['better_parent'] = "Parent";

	return $columns;

}
 function media_custom_columns($column_name, $id) {

	$post = get_post($id);

	if($column_name != 'better_parent')
		return;

		if ( $post->post_parent > 0 ) {
			if ( get_post($post->post_parent) ) {
				$title =_draft_or_post_title($post->post_parent);
			}
			?>
			<strong><a href="<?php echo get_edit_post_link( $post->post_parent ); ?>"><?php echo $title ?></a></strong>, <?php echo get_the_time(__('Y/m/d')); ?>
			<br />
			<a class="hide-if-no-js" onclick="findPosts.open('media[]','<?php echo $post->ID ?>');return false;" href="#the-list"><?php _e('Re-Attach'); ?></a></td>

			<?php
		} else {
			?>
			<?php _e('(Unattached)'); ?><br />
			<a class="hide-if-no-js" onclick="findPosts.open('media[]','<?php echo $post->ID ?>');return false;" href="#the-list"><?php _e('Attach'); ?></a>
			<?php
		}

}

add_image_size( 'bigpicture-title-size', 1000, 100, array( 'left', 'top' ) );

/* enregister les menus  */
register_nav_menus(array(
    'primary'=>__('Principal Menu bigpicture')
));
register_nav_menus(array(
    'lang'=>__('langues Menu bigpicture')
));
register_nav_menus(array(
    'footer'=>__('Footer Menu bigpicture')
));

/* chargement des traductions */
load_theme_textdomain('bigpicture', get_template_directory().'/languages');


 add_theme_support( 'post-thumbnails' );



/**

 * Enregistre 2 zones de widget

 */

add_action( 'widgets_init', function () {

    register_sidebar( array(
        'name'          => __( 'Zone Widget principale', 'bigpicture' ),
        'id'            => 'bigpicture-sidebar-1',
        'description'   => __( 'Zon de widget Barre latterale', 'bigpicture' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',

    ) );

    register_sidebar( array(
        'name'          => __( 'Zone Widget du footer', 'bigpicture' ),
        'id'            => 'bigpicture-sidebar-2',
        'description'   => __( 'Zone de widget Footer', 'bigpicture' ),
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

}

);


function bigpicture_change_and_link_excerpt( $more ) {
	if ( is_admin() ) {
		return $more;
	}

	// Change text, make it link, and return change
	return '&hellip; <a href="' . get_the_permalink() . '"> ' . __( 'read more', 'bigpicture' ) . ' </a>';
 }
 add_filter( 'excerpt_more', 'bigpicture_change_and_link_excerpt', 999 );



 function oldStyle_read_more($titre=null){

    if($titre==null){

        $titre = __( 'Lire la suite', 'bigpicture' );

    }

    
    return '<a class="btn btn-oldstyle" title="'. get_the_title( get_the_ID()).' louer gite" role="button" href="' . get_permalink( get_the_ID() ) . '">' . $titre .  '</a>';

}




?>
