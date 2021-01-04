<?php

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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'teknow_dev');

/** MySQL database username */
define('DB_USER', 'admin');

/** MySQL database password */
define('DB_PASSWORD', '2IkaXakvN6G4oq2kub!');

/** MySQL hostname */
define('DB_HOST', 'myteknow2-0-dev1.cbdmgtweoi8v.eu-west-3.rds.amazonaws.com');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '-=s.q6hQH&,:!|d$x[kY.C,==rb47Rw/smK`SZUHd<AOb$I|mL`w!sX{Hvn+|^*3');
define('SECURE_AUTH_KEY',  'Lx$AH%Q[`2I9UZUX[V8io^A&s>GJYr]@MHt-<_c+s^j-]&-&Y!I/=.]JkJXTEVn@');
define('LOGGED_IN_KEY',    'vwU*.},8@}_9X5{j@zgX.-!&j0ePrI[Yal|CCp>`LYy0Gs0(xYvRhz)PIM44uF0_');
define('NONCE_KEY',        '9v}4}f^b>gjX]G/GxS[$m+aGv@lWo`RAk8ZiXVOBn{KTze6xmA#8.b6&Ub<HhfGQ');
define('AUTH_SALT',        '5gy=|`I| +rSW,oSQ&y>!^H3`9H/y///!X^oc)jGF?/w?7`_]MC!G.1>*`N0?ue[');
define('SECURE_AUTH_SALT', ')y|O[a/i<=TQ!}!EQA{KYMhaYc/IoQL+nC]SBF_)>%bJ xnVabV4q>u)Ou%?1Ud5');
define('LOGGED_IN_SALT',   '^D1B%6E;!Sao#:AV^TS]2T7kcSHVkIQ*[+cV<}@p1BOY7BiJlhi;R_Qh_T]j-&Rf');
define('NONCE_SALT',       '`e3&Jpp|%L8{xT[KP386?)8h@Rc*(@Oxx:&kTu7(I-D!m:^2XIFN?g?E;+C|vps<');

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
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
//ini_set('display_errors', 'on');
//ini_set('error_reporting', E_ALL);
//@ini_set('display_errors', 0);
define('WP_DEBUG', false);
define('WP_DEBUG_LOG', false);
define('WP_DEBUG_DISPLAY', false);
define('FS_METHOD', 'direct');
define('WP_POST_REVISIONS', true);
define('SCRIPT_DEBUG', false);
define('WP_SITEURL', 'https://kairos.blvckpixel.com');
/* That's all, stop editing! Happy publishing. */


/** Absolute path to the WordPress directory. */
if (!defined('ABSPATH')) {
	define('ABSPATH', __DIR__ . '/');
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
