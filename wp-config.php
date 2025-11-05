<?php

//Begin Really Simple Security session cookie settings
@ini_set('session.cookie_httponly', true);
@ini_set('session.cookie_secure', true);
@ini_set('session.use_only_cookies', true);
//END Really Simple Security cookie settings
//Begin Really Simple Security key
define('RSSSL_KEY', 'jUboTlm09XqHpxGRQS6MLkMGcVlRDewHSQ7s7q3Jm5dXu9j9onjc8RmMS8NqiSf8');
//END Really Simple Security key
define( 'WP_CACHE', true );

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
define( 'DB_NAME', 'gms' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         ';0S!p?VY(Qwt!lAnD4fB`5EFAQ52TD1)`aHoBX!_i)|CV$EzKp$v]-<eST(nxt%{' );
define( 'SECURE_AUTH_KEY',  '3T_I?-z3>0e/b|XR{ScSzQ;FwyT(kVtsF]:NKql2/``YZjryoHJe?f}CRVs1E3+C' );
define( 'LOGGED_IN_KEY',    'ng`OWKA/d}ZVf~q4P;2tCT{@eMX{~dee4,d$wGReY}!,pq&(sinTJJM,bl6Z!HX.' );
define( 'NONCE_KEY',        'w=aDeA2g^L2aXP-w,NNg*0LW|[>lRZi#m8tdM2TpUjPg)Jc0k#QBA/]ozRb@I9m2' );
define( 'AUTH_SALT',        'wPA75y<k-t03BTXxW&U.xeHmUj}z<,?/<`:)KR8^D}D,~~3CS)2J yPYdW0#*id=' );
define( 'SECURE_AUTH_SALT', '.xupE,,Vno.Wuo/P%*h1[FCD4 ]r=WJ ~?,7x`6M=!H;hX97<Q6%*B>8]>BXmM%C' );
define( 'LOGGED_IN_SALT',   '[HZmxZE0j7YBIeR74sQTb=Pn:L4aD>M#G-tlJd]*l?&e2/~y--7xPGh2EZQVgbU`' );
define( 'NONCE_SALT',       'cB hvL[V9O`<M`Oa7`CKh(<;6_&^={bw]0kGZ!sQ>fQcUu8+!tL@=A 07OjxgT}J' );

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
