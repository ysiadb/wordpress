<?php

add_theme_support('post-thumbnails');
add_theme_support('title-tag');

register_nav_menus(array(
    'main' => 'Menu Principal' ,
    'footer' => 'Bas de page' ,
));

function horror_widgets_init() {	
	// Mon widget sur mesure
		register_sidebar( array(
			'name'			=> __( 'Sidebar', 'horrortheme' ),
			'id'			=> 'zone-widgets-1',
			'description'	=> __( 'Sidebar sur le côté du blog.', 'horrortheme' ),
			'before_widget'	=> '<div id="%1$s" class="widget %2$s">',
			'after_widget'	=> '</div>',
			'before_title'	=> '<div class="widget-title th3">',
			'after_title'	=> '</div>',
		) );
}
add_action( 'widgets_init', 'horror_widgets_init' );
/* */