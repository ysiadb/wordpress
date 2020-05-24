<?php

add_theme_support('post-thumbnails');
add_theme_support('title-tag');

register_nav_menus(array(
	'main' => 'Menu Principal',
	'footer' => 'Bas de page',
));

function horror_widgets_init()
{
	// Mon widget sur mesure
	register_sidebar(array(
		'name'			=> __('Sidebar', 'horrortheme'),
		'id'			=> 'zone-widgets-1',
		'description'	=> __('Sidebar sur le côté du blog.', 'horrortheme'),
		'before_widget'	=> '<div id="%1$s" class="widget %2$s">',
		'after_widget'	=> '</div>',
		'before_title'	=> '<div class="widget-title th3">',
		'after_title'	=> '</div>',
	));
}
add_action('widgets_init', 'horror_widgets_init');
/* */

add_filter("login_redirect", "gkp_subscriber_login_redirect", 10, 3);
function gkp_subscriber_login_redirect($redirect_to, $request, $user)
{

	if (is_array($user->roles))
		if (in_array('subscriber', $user->roles)) return site_url('/welcome');

	return home_url();
}


function traitement_formulaire_subscriber()
{

	global $wpdb;

	switch ($_POST) {

		case isset($_POST['email']) && isset($_POST['selection']):

			$newuser = $_POST['email'];
			$userdata = array(
				'user_login' =>  $newuser,
				'user_url'   =>  'http://localhost/projets/wordpress',
				'user_pass'  =>  NULL 
			);
			 
			$user_id = wp_insert_user( $userdata );

			if ($_POST['selection'] == 'AnswerQuestion') {
				$newquestion = $_POST['selection'];
				$insertnewquestion = $wpdb->prepare("SELECT * FROM {$wpdb->prefix}post");
				$insertnewquestion =$wpdb->insert("");
				
				echo '<div><p>Hahahahahaha</p></div>';
				wp_redirect('/projets/wordpress/index.php/welcome-answerer');
			}

		break;

		case $_POST['selection'] == 'AskQuestion' :
			wp_redirect('/projets/wordpress/index.php/welcome-asker');
		break;


	}

	if (isset($_POST['email']) && isset($_POST['selection']) && isset($_POST['data'])) {
		if ($_POST['selection'] == 'AskQuestion') {
			wp_redirect('/projets/wordpress/index.php/welcome-asker');
		}
		if ($_POST['selection'] == 'AnswerQuestion') {
			wp_redirect('/projets/wordpress/index.php/welcome-answerer');
		}
	}
}

add_action('template_redirect', 'traitement_formulaire_subscriber');
