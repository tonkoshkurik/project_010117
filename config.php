<?php
$host = 'http://' . $_SERVER['HTTP_HOST']; 
define('__HOST__', $host);
define('_MAIN_DOC_ROOT_', __DIR__);
define( 'DB_HOST', 'localhost' );
define( 'DB_USER', 'root' );
define( 'DB_PASS', '' );
define( 'DB_NAME', 'white-label' );
//define( 'DB_NAME', 'developer_test10' );
define( 'SEND_ERRORS_TO', '' );
//define( 'DISPLAY_DEBUG', false );
//define( 'SITENAME', '' );
define( 'ADMINEMAIL', 'sergiy.tonkoshkuryk@kjointoit.com' );
// NEED TO DEFINE AMERICAN TIMEZONE
date_default_timezone_set('Australia/Sydney');

define('SECRET_KEY', 'qwerty12345');
define('SITE_URL', $_SERVER['HTTP_HOST']);