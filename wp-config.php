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
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'vnfare');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         'va99EU%U)V3k0]<!oX|2h^xE@&axw}[>atC9#~8ZpRBpzq?%(}adHTP1{PPU?I%|');
define('SECURE_AUTH_KEY',  ' )GSAII<am!ufqZ9A.|3K6i<v+!W^A1p->HN n<++e]bi_8&.rxqHGo*C)Udy*K,');
define('LOGGED_IN_KEY',    'qUKxDSi2`g7N[s5DnGc%.w_w&@a96zjV>;`h+<#eEO|Qt_w}u-]C9=DnjLz`ed5N');
define('NONCE_KEY',        'FfN!#-c/?+6g.-n?5qsF=Di% }3PsdXq.u51XT[WtHg]u&o74a;S~[rndEI_6apz');
define('AUTH_SALT',        '/V-Lb5iQ|a/J|rBl_KX5mi^[(x@wt<GRB;}qM}0T|,x7<x?8R+3Y88TgV@FqAU@f');
define('SECURE_AUTH_SALT', 'W_s7>4)MJi$?j?[ciQVnJ1Z$9|W,GP6scG /+K6#ZC?B<7iC2CL7/k/iSnuVfBKl');
define('LOGGED_IN_SALT',   '3gNk@yU-?-Jkg_Et_T+w,>q?K/>uv8&i} u:^*6,?9nSqA=)c2fof-){76`+-tnj');
define('NONCE_SALT',       'D2Z}^8A.0-I+oKsyM&lG!oRRFt6i|m-#R7|.75d 4/{}eQPCX,5_?E^4`XI?YP6w');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
