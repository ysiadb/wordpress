<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset');?>">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <?php wp_head();?>
</head>
<body <?php body_class(); ?>>
    <header class="header">
        <!-- <a href="<?php echo home_url('/');?>">
            <?php echo get_template_directory_uri();?>
        </a> -->
        <?php wp_nav_menu(array('theme_location' => 'main',
        'container' => 'ul' ,
        'menu_class' => 'site_hearder_menu')) ;?>
    </header>

    <?php wp_body_open(); ?>