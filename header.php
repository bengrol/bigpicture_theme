<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta name="description" content="">
	<meta name="viewport" content="width=device-width">
	<title><?php  wp_title( '|', true, 'right' ); bloginfo('name'); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
   
<!--   facebook open graph-->
    <meta property="og:url" content="http://beta-site-3.fr/bigpicture/">
    <meta property="og:title" content="<?php  wp_title( '|', true, 'right' ); bloginfo('name'); ?>">
    <meta property="og:description" content="<?= bloginfo('description');?>">
    <meta property="og:site_name" content="<?= bloginfo('name');?>">

    <meta property="og:image" content="<?php $img = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full'); 
    echo $img[0]; ?>">
    <meta property="og:type" content="hotel">
      	<?php wp_head(); ?>
   
</head>

<body <?php body_class(); ?> id="content">
	
    <div id="loaderDiv" class="ijn" ></div>
    <header id="main-header">
        <div id="logo-container">
            <a href="<?php bloginfo('url'); ?>">
                <img src="<?php echo get_template_directory_uri() ?>/images/logo/logo-blanc.png" id="img-logo">
            </a>
        </div>

        <div id="menu-header" class="">
            <span class="glyphicon glyphicon-chevron-up icon-rotating" aria-hidden="true"></span>
            <span id="menu-header-sp">MENU</span>

        </div>

        <div class="btn-group-vertical btn-group-lg" role="group" id="main-nav-container" >
            <nav id="main-nav">
                <?php
                $args = array(
                    'theme_location' => 'primary'
                );
                wp_nav_menu($args);
                ?>
            </nav>

        </div>
        <div class="menu-lang-container">
            <?php
            $args = array(
                'theme_location' => 'lang',
                'container' => false
            );
            wp_nav_menu($args);
            ?>
        </div>
        
        <div class="btn-grp-offres" >
        <?php
            $blog = [
            'en-US' =>1527,
            'fr-FR' => 1520,
            'de-DE'=>2780
            ];
            ?>

         <a href="<?php echo get_permalink( $blog[get_bloginfo('language')]); ?>" class="btn-offre border-bottom-radius">
            <i class="fa fa-bookmark-o"></i><?php _e('visite 360', 'bigpicture'); ?></a>
        </div>
                    
         
        <button class="btn-resa  resa-toogle" id="resa-responsive" style=""><i class="fa fa-calendar "></i><span><?php _e('Reserver', 'bigpicture'); ?></span></button>
    </header>
    <aside>
        <div class="btn-grp-offres" role="group" >
            <?php
            $blog = [
            'en-US' =>1510,
            'fr-FR' => 1039,
            'de-DE'=>2765
            ];
            ?>

            <a href="<?php echo get_permalink( $blog[get_bloginfo('language')]); ?>" class="btn-event"><i class="fa fa-star "></i><?php _e('Actualités', 'bigpicture'); ?></a>
            <button id="bt-resa-aside"  class="btn-resa border-bottom-radius resa-toogle"><i class="fa fa-calendar "></i><?php _e('Reserver', 'bigpicture'); ?></button>
        </div>
        <?php  get_template_part('partial', 'reservation'); ?>
    </aside>
<div id="main" class="site-main ">