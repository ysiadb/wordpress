<?php

add_theme_support('post-thumbnails');
add_theme_support('title-tag');

register_nav_menus(array(
    'main' => 'Menu Principal' ,
    'footer' => 'Bas de page' ,
));

	register_sidebar(
		array(
			'name'          => __( 'Sidebar', 'horrortheme' ),
			'id'            => 'sidebar-1',
			'description'   => __( 'Barre latéral', 'horrortheme' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
    );
    
/* */