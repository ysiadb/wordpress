<?php

if( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) exit();
    global $wpdb;
    $wpdb->query( "DROP TABLE IF EXISTS wp_askme_questions, wp_askme_reponses" );
    delete_option("jal_db_version");
