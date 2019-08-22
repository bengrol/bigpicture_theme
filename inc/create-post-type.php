<?php
// creation du post-type chambres
add_action( 'init', function  () {

  $labels = array(
    'name'               =>  'gites' ,
    'singular_name'      =>  'gite' ,
    'menu_name'          =>  'gites',
    'name_admin_bar'     =>  'gite',
    'add_new'            =>  'creer gite',
    'add_new_item'       =>  'Creer un gite',
    'new_item'           =>  'nouveau gite',
    'edit_item'          =>  'Editer gite',
    'view_item'          =>  'Voir gite',
    'all_items'          =>  'tous les gites',
    'search_items'       =>  'Chercher gite',
    'parent_item_colon'  =>  'Parent gite:',
    'not_found'          =>  'No gite found.',
    'not_found_in_trash' =>  'No gite found in Trash.',
  );

  $args = array(
    'labels'             => $labels,
    'public'             => true,
    'publicly_queryable' => true,
    'show_ui'            => true,
    'show_in_menu'       => true,
    'show_in_nav_menus'  => true,
    'query_var'          => true,
    'rewrite'            => array( 'slug' => 'gite' ),
    'capability_type'    => 'post',
    'has_archive'        => true,
    'hierarchical'       => false,
    'menu_position'      => null,
    'supports'           => array( 'title', 'editor', 'author', 'thumbnail',  'comments' )
  );

  register_post_type( 'chambres', $args);
});

// add meta boxes - customs fields to post type chambre
add_action( 'add_meta_boxes', function (){
  $screens = array( 'post', 'chambres' );

  add_meta_box('prix-chambre', 'Prix du gite / Periodes', 'bigpicture_displ_html_prix', 'chambres', 'normal', 'high', array(5)  );
  add_meta_box('surface-chambre', 'Surface du gîte', 'bigpicture_displ_html_surface', 'chambres', 'normal', 'high'  );
  add_meta_box('slider-chambre', 'Gallerie gite', 'bigpicture_displ_html_gallery', 'chambres', 'normal', 'high'  );
  add_meta_box('visite-chambre', 'Visite360 gite', 'bigpicture_displ_html_visite', 'chambres', 'normal', 'high'  );

  // add_meta_box('id-chambre', 'Id du gite', 'bigpicture_displ_html_id_chambre', 'chambres', 'normal', 'high'  );

  /* test meta chambre-post-type*/
  add_meta_box(
    'bigpicture-encart-post-type-chambre', // Metabox HTML ID attribute
    __('Mettre sur la page d\'accueil ?'), // Metabox title
    function (){
      global $post;
      $v= get_post_meta($post->ID, '_post-type-chambre-encart', true);
      ?>

        <select name="_bigpicture-meta[_post-type-chambre-encart]">
            <option name="non" <?= $v == 'non'? "selected":"" ?>>non</option>
            <option name="oui" <?= $v == 'oui'? "selected":"" ?>>oui</option>
        </select>
        <p>Selectionnez oui si vous souhaitez faire apparaitre un encart sur la page d'accueil</p>
      <?php
    }, // callback name
    'chambres', // post type
    'side', // context (advanced, normal, or side)
    'default' // priority (high, core, default or low)
  );
});


function bigpicture_displ_html_prix($post, $metabox){
  global $post;
  $nbPeriode = $metabox['args'][0];

  ?>

    <table>
        <thead>
        <tr>

          <?php

          for($i = 1; $i <= $nbPeriode ; $i++){
            $champ = '_prix-chambre-periode'.$i;
            $prix = get_post_meta($post->ID, $champ, true);

            echo '<th >Periode '.$i.'</th>';
          }

          ?>


        </tr>
        </thead>
        <tbody>
        <tr>

          <?php

          for($i = 1; $i <= $nbPeriode ; $i++){
            $champ = '_prix-chambre-periode'.$i;
            $prix = get_post_meta($post->ID, $champ, true);

            echo '<td  ><input type="text" name="_bigpicture-meta['.$champ.']" value="'.$prix.'"  style="width:100%;"/></td>';

          }

          ?>


        </tr>

        </tbody>
    </table>



  <?php



}


function bigpicture_displ_html_visite(){
  global $post;
  $prix = get_post_meta($post->ID, '_visite-chambre', true);

  echo '<label for="_bigpicture-meta[_visite-chambre]" >URL HDMEDIA de la visite 360</label><br/>';
  echo '<input type="text" name="_bigpicture-meta[_visite-chambre]" value="'.$prix.'" />';
}

function bigpicture_displ_html_id_chambre(){
  global $post;
  $prix = get_post_meta($post->ID, '_id-chambre', true);

  echo '<label for="_bigpicture-meta[_id-chambre]" >Reservation SuperBooking</label><br/>';
  echo '<input type="text" name="_bigpicture-meta[_id-chambre]" value="'.$prix.'" />';
}

function bigpicture_displ_html_surface(){
  global $post;
  $surface = get_post_meta($post->ID, '_surface-chambre', true);

  echo '<label for="_bigpicture-meta[_surface-chambre]" >Surface gite</label><br/>';
  echo '<input type="text" name="_bigpicture-meta[_surface-chambre]" value="'.$surface.'" /> &sup2;';
}
function bigpicture_displ_html_gallery(){
  global $post;
  $surface = get_post_meta($post->ID, '_gallery-chambre', true);

  echo '<label for="_bigpicture-meta[_gallery-chambre]" >Gallerie gite</label><br/>';
  echo '<input type="text" name="_bigpicture-meta[_gallery-chambre]" value="'.$surface.'" /> - entrer le short-code directement';
}


// Save the Metabox Data
function wpt_save_events_meta($post_id, $post) {
  // Is the user allowed to edit the post or page?
  if ( !current_user_can( 'edit_post', $post->ID )){
    return $post->ID;
  }

  if (isset($_POST['_bigpicture-meta'])) {
    $bigpictureMeta = $_POST['_bigpicture-meta'];

    foreach ($bigpictureMeta as $key => $value) {
      if ($post->post_type == 'revision')
        return; // Don't store custom data twice
      $value = implode(',', (array) $value); // If $value is an array, make it a CSV (unlikely)
      if (get_post_meta($post->ID, $key, FALSE)) { // If the custom field already has a value
        update_post_meta($post->ID, $key, $value);
      } else { // If the custom field doesn't have a value
        add_post_meta($post->ID, $key, $value);
      }
      if (!$value)
        delete_post_meta($post->ID, $key); // Delete if blank
    }
  }


}

add_action('save_post', 'wpt_save_events_meta', 1, 2); // save the custom fields



