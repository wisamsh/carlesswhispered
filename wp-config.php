<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'lovestories' );

/** Database username */
define( 'DB_USER', 'wisam' );

/** Database password */
define( 'DB_PASSWORD', 'Miguel12@raneen' );

/** Database hostname */
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
define( 'AUTH_KEY',         '?/W 6}_ifB7TNOW@oW<Cbqh_(T,I~sN^ul|^U-fTLr{g4*eI-9G@FnnB8>c,R?$P' );
define( 'SECURE_AUTH_KEY',  'FK{Sy:e:S0Gm>V/n~povz%bq<|[[`lT7;NM7Fr4TVq=:N;7=SSEVQ5)8LD_3{9cg' );
define( 'LOGGED_IN_KEY',    'K>xNG.d0XLr&-qkAn/PurE}IBdNwcm2[q`adS9%yt%I=68(~|}i-v?z:k5kx,}[+' );
define( 'NONCE_KEY',        '?|^e<.vVP&s>*kb=dnj#O rv[qdcTj/wG=:@1]Hue8Boc{%/2U=7)Qbq;?[dmh={' );
define( 'AUTH_SALT',        '50}gI+NlEp(4q;?gFNJRtxHZuq9JuR~44+;>h:7J9]_ty,j-~a+EhXr 3MjXak`h' );
define( 'SECURE_AUTH_SALT', 'jk^yt}LJP~_g3Y#<y_TVzBzQ,^W @4x@Vm(Mn+R6%nKY(3O%T4kXcPa.{3.k>Znk' );
define( 'LOGGED_IN_SALT',   'JxE)Hn+>XZ39ErXRBo0O0%mY0X_^(t{+e??SYV)?yJ}@D33F(wT/)B0BP8FKA15 ' );
define( 'NONCE_SALT',       'Cl`@Y?#$@/g][g(UFuQGppZQ7*?0+8J3~,{i-}(b)[81yZ_J]JQl6`4*YoahO;>q' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
 */
$table_prefix = 'wl_';

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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
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
