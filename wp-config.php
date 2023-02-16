<?php
include dirname(__FILE__) . '/wp-content/vendor/autoload.php';

$dotenv = new Symfony\Component\Dotenv\Dotenv();

$dotenv->loadEnv(dirname(__FILE__) . '/.env.development');

/** SSL */
define('FORCE_SSL_ADMIN', true);
// in some setups HTTP_X_FORWARDED_PROTO might contain
// a comma-separated list e.g. http,https
// so check for https existence
if (strpos($_SERVER['HTTP_X_FORWARDED_PROTO'], 'https') !== false)
    $_SERVER['HTTPS']='on';

/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', $_ENV['DB_NAME'] );

/** MySQL database username */
define( 'DB_USER', $_ENV['DB_USER'] );

/** MySQL database password */
define( 'DB_PASSWORD', $_ENV['DB_PASSWORD'] );

/** MySQL hostname */
define( 'DB_HOST', $_ENV['DB_HOST'] );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         $_ENV['AUTH_KEY']);
define('SECURE_AUTH_KEY',  $_ENV['SECURE_AUTH_KEY']);
define('LOGGED_IN_KEY',    $_ENV['LOGGED_IN_KEY']);
define('NONCE_KEY',        $_ENV['NONCE_KEY']);
define('AUTH_SALT',        $_ENV['AUTH_SALT']);
define('SECURE_AUTH_SALT', $_ENV['SECURE_AUTH_SALT']);
define('LOGGED_IN_SALT',   $_ENV['LOGGED_IN_SALT']);
define('NONCE_SALT',       $_ENV['NONCE_SALT']);

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */

// Turns WordPress debugging on
define('WP_DEBUG', true);

// Tells WordPress to log everything to the /wp-content/debug.log file
define('WP_DEBUG_LOG', true);

// Doesn't force the PHP 'display_errors' variable to be on
define('WP_DEBUG_DISPLAY', false);

// Hides errors from being displayed on-screen
@ini_set('display_errors', 0);

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

define( 'WP_HOME', "{$_ENV['SITE_HOST_URL']}" );
define( 'WP_SITEURL', "{$_ENV['SITE_HOST_URL']}");

define( 'WP_CONTENT_DIR', dirname(__FILE__) . '/wp-content' );

define( 'WP_CONTENT_URL', "{$_ENV['SITE_HOST_URL']}/wp-content" );

define( 'WP_SITE_URL', "{$_ENV['SITE_HOST_URL']}");

# Google API needs to be Global Variable for WP Engine
define( 'GOOGLE_MAPS_API_KEY', "{$_ENV['GOOGLE_MAPS_API_KEY']}");

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
