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
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'breads_data' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define( 'AUTH_KEY',          'gys;0l:?c/0K1&7T+yjTy;>f*`[9&0g8~DTH:5A!K(oo!GOSf/#>Pu`y_NVcTDF6' );
define( 'SECURE_AUTH_KEY',   'W>@hHVm/w|BU(]k`$=5S)5#i.a(q(_#TD>P@7h^/-wDfO?f9e;BHIU<e5>pVj#(R' );
define( 'LOGGED_IN_KEY',     '|5L}g!^_e UE<1QhuoKzg=%+2&MqWY5P=H(DY=X7[y11s L&&(L{X*[IA$*Qu+_m' );
define( 'NONCE_KEY',         'f=yP;)(`` Z}kVWcyKz[ n)Ds?=X2V1f]|d0ZBZYsAgs`Rd*^)jdV]~]EfwlK!kt' );
define( 'AUTH_SALT',         '~?U}.G9]1QqLd[_S#ya`4k|OKz`}IEa%%@vpc>gry$kr[cQoU7|RLk/`W*H_G4mj' );
define( 'SECURE_AUTH_SALT',  '`tODi>2fzYJ_c^DZ,qnATzD Rm1)(<Hq]^5FqD}3~WnVP^vtg+IQxfiW&=r1*_Ys' );
define( 'LOGGED_IN_SALT',    ',^}-TF~vX+54RV}`u+ed>*EcGxUB~(a4,RkP(X0{c`+<r|cYutT|b7:N2_Qu.3N)' );
define( 'NONCE_SALT',        '~D6=BY^YeG%ge?/<soTI@X&Z!.hzhPOcIk!vx}mP1Gu8`Qf zXPI],,g0VU;r%hW' );
define( 'WP_CACHE_KEY_SALT', 'ig4C8wRaGZ4fqk}syNc9p[60g?xwI9.CXW0;?2(|i8%t*CIGhFFtl[(CF6k:QN11' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */



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
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
