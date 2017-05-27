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
define('DB_NAME', 'imagostructures');

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
define('AUTH_KEY',         'XN+ykQ)En&Le|rk@zDoBwM:KNf$w!b#}B~0+wYCyaO8U%2^7W,2&At0F<s&Jl8Fv');
define('SECURE_AUTH_KEY',  ' o:ZShziW{[|C@zMqp>ZN=ry}69~4}f/n4~<K:I2^l4<E4m=>~N30X.wv]N*QQM9');
define('LOGGED_IN_KEY',    'cD8 GFAE.#|C3%xc*rz|v|c.&-*8M.Y)y!Eh%H[X5,y(1aFlbU[wu+#1-q&LW,&S');
define('NONCE_KEY',        '8ugx|4j7&T5H0:M[f[..+AQo/fbjnE_{6aB)nJn2e2LV6U8PD&6!6KyW0/gn_~2P');
define('AUTH_SALT',        'pOOJO+eY&?Sd.#cf9@J1/M8ucT#}mnc;2hd u:7{M^p4Qj&_]AZhz s<k$ECJ80Y');
define('SECURE_AUTH_SALT', '1!$v,y/;h``o#g..eK3*E.!hvZ,tBa$X&.Og1}a)R}>mS+b7gXDDJ6ki[69)+qXo');
define('LOGGED_IN_SALT',   '<n5`RpfmRduxf Zc8}+8_fDAETB&vNNV;7-y2y0H<4{z9|_w-Dc@$vU?y]:=T2U)');
define('NONCE_SALT',       'RU CI,OK:#| q[qr7E;k:Z^D0P.bbwY=Bi5&>xDAEoNgm& s.Z8$1|P $(3gNS}X');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'imstr_';

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
