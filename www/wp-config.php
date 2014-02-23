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
define('DB_NAME', 'foolsday');

/** MySQL database username */
define('DB_USER', 'foolsday');

/** MySQL database password */
define('DB_PASSWORD', 'admin');

/** MySQL hostname */
define('DB_HOST', 'localhost');

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
define('AUTH_KEY',         ':EKiO2O|ypfLJSyW/3UsXP[*/,&uV5uhYgz7Cl$|{oX`(qCoQr#7.n{4Vj?w6c]P');
define('SECURE_AUTH_KEY',  'ylxT}AEb1T3>oc:,icw,fXb6D1Y^I`>!bi3fL6LhJ7`|:aan3%|Wn/>}VWuA[EZz');
define('LOGGED_IN_KEY',    ')5IY_W(5U1$/cU<[DJiZOOZ+}u&K5`z%/kp]~ky4^@z[7w5tjygloU(Zum5]rp$n');
define('NONCE_KEY',        '36Aq#1QW(sJ*4-&xOV$vL22;xUy9Q=r_dft7iO^QDX&AeR_m$wSp!lpl=)I0.G+`');
define('AUTH_SALT',        ' 8~pfZ8KAt2gN+)*lhz4O`CjsPR,]E~662gOs3@wj Oh_U_-eNhhUHOlWoF@L@tF');
define('SECURE_AUTH_SALT', 'V[1NGiW2gI`d7ec$G@/dm`@M6)g%N~iuDN+-3fdWvt]WoZ|lVN o$-RR/i^Dwn8?');
define('LOGGED_IN_SALT',   'Ye&z(`VS4*/)7~kh[$jl1GM>|/K-B=EN+oZ`xYg8%xCOl9$#@w`|ER/m44|Wk1Dd');
define('NONCE_SALT',       '=hh65MFD<<e<4i`4cB LPk3^9A=E1nmL1DF2T;Ca%Vq^)47Q?I$r6PQ7_9Ix<yK9');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = '_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', 'ru_RU');

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
