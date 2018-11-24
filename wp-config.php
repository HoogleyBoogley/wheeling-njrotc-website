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
define('DB_NAME', 'wp_njrotc');

/** MySQL database username */
define('DB_USER', 'wordpress');

/** MySQL database password */
define('DB_PASSWORD', 'password');

/** MySQL hostname */
define('DB_HOST', '35.224.82.238');

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
define('AUTH_KEY',         'D@9&ui3.T;j/+b=`?+,-Jm]dVv-aFo^6XP`L{X0/{|+iDH0. -HG+b/*kpm-7`=<');
define('SECURE_AUTH_KEY',  'iot?*kr|eap@e3gcnoR^zT|:~PXe|<c$jr}8-U/&R#{u|~0p*IAC[j!C@FL87^ms');
define('LOGGED_IN_KEY',    '&(*zS!r,!S! wcb8Fml?!Eo2eq= L*od23L-r+-l6X;SxS`8ofi=:2xai9MQiXE+');
define('NONCE_KEY',        'W)=Xz %?K?A4X*%Q>hovnxZRO8zUf_W<5o-I/X)e&/l|<sh6Yz.q*m;,X`(p||uW');
define('AUTH_SALT',        'u)=5*BH]gqm,M|@&PF*_2[n sE;APQ;N*w!ay!W5)@i)&ruY%?TrKV4`(odV.=9`');
define('SECURE_AUTH_SALT', '3|_yVv#}!Y{0+NC?d0<#yjq~#FkA45`|(*1uO f=T.8O)7>*A&s*ZoF;9EPGsFD=');
define('LOGGED_IN_SALT',   'GYE+&jd.$LX+<e%oF!7DPNcSB~ew&=Aq.0]-0u=yK,oTi ,Rx,JxyP~v.vXr8Yh@');
define('NONCE_SALT',       'E TNX!C$9fdK8qMi-bJB}k][Sd}vb`o5Dtcg,XG7##/Agrf [1qP>5v^@* bdNpk');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'njrotc_wp_';

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

define('FS_METHOD', 'direct');

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
