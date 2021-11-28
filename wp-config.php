<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
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
define( 'DB_NAME', 'wordpress_project' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'O6KPDPWGc-* Zv!|Oq6@I^?1qxUOTq]r/vo$,);-=_r:*z{|Z~59:0vdNQUNNWQ)' );
define( 'SECURE_AUTH_KEY',  '2T2Rdwh-+$XUkT[E/DwNqH|pEy^T^H9T<0F@*yf@XojqQ85kAR16Sk51Wk;z&mFP' );
define( 'LOGGED_IN_KEY',    'tv5yA|OY{$LAD8dyG$=?|#Tt$w,_`*I1+D%&9S!3V*}-=A@HeYi:{R+oU>1q8ZfO' );
define( 'NONCE_KEY',        '^{/ADb-_rnVeXj[c2+5ygyD *Ja*;i (g3aAW!MF?:j8S[Dt*8u]do9FtrM.gVo^' );
define( 'AUTH_SALT',        '$`I[e3:X#v_V^QzGxkXy~DK Gv+ZMAX>s%wAK0|l*HJI&BvA:p|i?fbwGr JGhr7' );
define( 'SECURE_AUTH_SALT', '|nWQ+vuE%BLhhRG5/lVNuOh +65JmcR$bKXg<4:qN:lW8_<r_hy78a{]V~0KIq]u' );
define( 'LOGGED_IN_SALT',   'X@&^G?nK8.MdM]0d%QOOj-/r=gye/YT)].chWAl2TZ CSp$tZ,^<y[R::4%Y%k@T' );
define( 'NONCE_SALT',       'uj,;w!@$1Tw1(x0;f(7*U)EBsSOt&JqBMm0-2L{5>&YU8W:ULkV{SrTpUU]aw$6;' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp';

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
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
