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
define('DB_NAME', 'iru_new');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
// define('DB_CHARSET', 'utf8mb4');
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
// define('DB_COLLATE', '');
define('DB_COLLATE', 'utf8_unicode_ci');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '}91hhbdi+gc05+]IBzp+DNs+`rEVihVNwr/^@l*R}j$cmAhMP1}OwBD7Vl9OVKSj');
define('SECURE_AUTH_KEY',  'Y[[7?#dXsHmiLZdL:+WJ.Vq~Fy_$eyw}oC!x&ooi/D_|J1/2{}e)J=94Z<CiniV+');
define('LOGGED_IN_KEY',    '$10pRR:g.~gbs(#diNR6kwfcS%i7WRo3lQf_7-4@w5s,:+S[6K^+y-/8Iax;!El:');
define('NONCE_KEY',        '%mI1Dw}=zr[Ikk|x>_eYA<$jc!+ HmKTCj8`6L-O?fC=arh`6c#fYI+t4X#*TBYX');
define('AUTH_SALT',        '8-{|-p,j$#B:t6b_^Q$!lzf?R* pv#&j|(;TQL,y]phec :jw8%Yeax+=ql}kl:H');
define('SECURE_AUTH_SALT', '96|B&-e-7d(}Em-adRfr)?a644[rV+)}owRx$5j[w[IX_yx{TVqy]j;;z:Y>a1yh');
define('LOGGED_IN_SALT',   '3{jM+(+wj-{8R+K4<W|Cms{8Dp!_l5fxoK;9FksZ63|3-kV@Jjgn=w-2#}d9PQhj');
define('NONCE_SALT',       'Pv)kY7Rj&/e^L+b6=%}3[n4Y xt$+]qxiU>vvBH5J!GYJF[LdTLxGGJO?*Fu,2Uv');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'iru_';

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

define('WP_MEMORY_LIMIT', '2048M');

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. 
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');*/

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

