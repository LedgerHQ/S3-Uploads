<?php

/*
Plugin Name: S3 Uploads
Description: Store uploads in S3
Author: Human Made Limited
Version: 3.0.3
Author URI: https://hmn.md
*/

require_once __DIR__ . '/inc/namespace.php';

add_action( 'plugins_loaded', 'S3_Uploads\\init', 0 );

add_filter( 's3_uploads_s3_client_params', function ( $params ) {
	$params['credentials']['token'] = getenv('AWS_SESSION_TOKEN');
	return $params;
} );


if ( defined( 'WP_CLI' ) && WP_CLI ) {
	WP_CLI::add_command( 's3-uploads', 'S3_Uploads\\WP_CLI_Command' );
}
