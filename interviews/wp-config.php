<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'theindumb');

/** MySQL database username */
define('DB_USER', 'theindumb');

/** MySQL database password */
define('DB_PASSWORD', 'vvk@0FF1cer');
define('WP_MEMORY_LIMIT', '96M');
/** MySQL hostname */
define('DB_HOST', 'theindumb.db.11621953.hostedresource.com');

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
define('AUTH_KEY',         '[eNC`b|&|U[!@zi9SThc&nZ QeMhvXn5jCrI,#(TtjqO>rO=4l2|4DmTd+)[0OPE');
define('SECURE_AUTH_KEY',  '2wZ9sw&!$v{N!lVJl8d?w7KcR~[{^?D4IK%HOeZ~:,*L1E%?vGVqt|]NSL>)g+eu');
define('LOGGED_IN_KEY',    'lt23z+s,~mB6eN[LoY2#bYdX,pmJhS-ZYV|LY.Q ];6g%nhX*>ZFSU3S#n_CrH>h');
define('NONCE_KEY',        'mj3y$,iL#f4Xm.6dy2MGv;8}!DktWo)&:[-~s-|VZCp:<$U:4pz:zN3l-v#FvSnN');
define('AUTH_SALT',        '|;|W)OFn}G{>c_2]oKcn%t}6s+|8ZbfVAf+}!oE];`>JwL)yMVq=*Mo?Sd|}`_Y(');
define('SECURE_AUTH_SALT', '9RU6V#-lKBrsM-r;YQh^nbrI)dD^Wg{)z+gJbdYF>w}D2+rsy|#S6/-w9Qb72s<k');
define('LOGGED_IN_SALT',   '->P%o]qyC!7?-OLrYsf^M-B$KHd<Oz~,GIx-X:|6R,4sa+p{+X#>|zk~;TNH1a|0');
define('NONCE_SALT',       'FA.1KX<v+]}Ia_P>e{u{XJNH}+3*}bq|/5-L(lA7Yqd;+UHn*uz?}A^?875RAWo$');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'in_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
