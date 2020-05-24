<?php

/*
Plugin Name: Askme
Description: Askme propose la création de questionnaire en toute simplicité pour vos sites
Version: 1.0
Author: Manel & Daisy
Text Domain: askme-md
*/

add_action('admin_menu', 'askme_setup_menu');

function askme_setup_menu()
{
    add_menu_page('Askme Page', 'Askme-md', 'manage_options', 'askme-md', 'askme_init');
}
function askme_init()
{
    echo "<h1>Hello World</h1>";
}

function askme_register_widget()
{
    register_widget('askme_widget');
}

add_action('widgets_init', 'askme_register_widget');





class askme_widget extends WP_Widget
{

    function __construct()
    {
        parent::__construct(
            // widget ID
            'askme_widget',
            // widget name
            __('Askme Questionnaire', ' askme_widget_domain'),
            // widget description
            array('description' => __('Askme Widget Tutorial', 'askme_widget_domain'),)
        );
    }

    public function widget($args, $instance)
    {
        $title = apply_filters('widget_title', $instance['title']);
        echo $args['before_widget'];
        //if title is present
        if (!empty($title))
            echo $args['before_title'] . $title . $args['after_title'];

        //output
        echo __('Yo les potos ! ', 'askme_widget_domain');

        echo '
        <form method="POST" action"#">
        <input type="submit" name="AskQuestion" value="Je prefere poser les questions"><br>
        <input type="submit" name="AnswerQuestion" value="Je prefere donner les reponses"><br>
        </form>';
        echo $args['after_widget'];
    }

    public function form($instance)
    {
        if (isset($instance['title']))
            $title = $instance['title'];
        else
            $title = __(' ', 'askme_widget_domain');
?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>
<?php
    }

    public function update($new_instance, $old_instance)
    {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
        return $instance;
    }
}

global $jal_db_version;
$jal_db_version = '1.0';

function jal_install() {
	global $wpdb;
	global $jal_db_version;

    $table_name = $wpdb->prefix . 'askme_questions';
    $table_name2 = $wpdb->prefix . 'askme_reponses';
	
	$charset_collate = $wpdb->get_charset_collate();

	$sql = "CREATE TABLE $table_name (
        id bigint(20) NOT NULL AUTO_INCREMENT,
        question_date datetime NOT NULL,
		question_auteur bigint(20) NOT NULL,
		question_content longtext NOT NULL,
		PRIMARY KEY  (id))$charset_collate;

        CREATE TABLE $table_name2 (
        id bigint(20) NOT NULL AUTO_INCREMENT,
        reponse_date datetime NOT NULL,
		reponse_auteur bigint(20) NOT NULL,
		reponse_content longtext NOT NULL,
        id_question bigint(20) NOT NULL,
		PRIMARY KEY  (id)
    ) $charset_collate;";

	require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta( $sql );

	add_option( 'jal_db_version', $jal_db_version );
}
register_activation_hook( __FILE__, 'jal_install' );

// function deactive_plugin_database_tables(){
//     global $wpdb;
//     global $table_name2;
//     global $table_name;

//      $wpdb->query("DROP TABLE IF EXISTS $table_name, $table_name2");
// }

// register_uninstall_hook(__FILE__, 'deactive_plugin_database_tables');


function deactive_test()
{
    global $wpdb;
    global $jal_db_version;

    $sql = "DROP TABLE IF EXISTS {$wpdb->prefix}askme_questions, {$wpdb->prefix}askme_reponses";

	require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta($sql);
    add_option( 'jal_db_version', $jal_db_version );

}

register_uninstall_hook(__FILE__, 'deactive_test');