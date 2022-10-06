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
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress' );

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
define( 'AUTH_KEY',         'Z94;ZdRR45phe).ME~qPAH3/T?T7Me7|fQ-D8/Ae5k1x?oxCh>fG75i[k#l8Uk|t' );
define( 'SECURE_AUTH_KEY',  '5QbqhM/K9;z})tdb/Z>qwO:t)Hx0]h86J97I}O3d,$7,~X f.;XqP4gXwNnPwxlN' );
define( 'LOGGED_IN_KEY',    '=_7O,%/qaRJb:K=8BV`)?l1P:As9[^ruW3mTk]PJ)RB`Z[2U$>{`c=L!926Yzg@F' );
define( 'NONCE_KEY',        ',Jr5mr$`kvDhzZCJ36{68PqEns^3EX_.VK:]AD%3b.?xuxUUtPJn)`X1<@o$=MB=' );
define( 'AUTH_SALT',        'xloWnn9Zu_@}RR81KGO=|&<QY9BrO!}H.`/Ugj@;}-kz&[%Q+FZ#p}U7!<-<jp{S' );
define( 'SECURE_AUTH_SALT', '1{Nf^=3/k5M}E=7MGX[})g#Kp#KlDB3S AK9G(a%Ynt@KMytgR!Kcf]JaVB?= QJ' );
define( 'LOGGED_IN_SALT',   'P5U=-V]AT?;(8_lZQMwS^~dO:^ymG@,vA7{w-7Qgw:!6!WLdM^>`?cvl.Qz`?[]5' );
define( 'NONCE_SALT',       '$Z<rJ|5bi<N/O.-8_osB+~9Ma]>6F-OQ )k`.62ER>v1,r<w@}WmNJ@68!Wp=1]=' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
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
