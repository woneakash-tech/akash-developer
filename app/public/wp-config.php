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
define( 'DB_NAME', 'local' );

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
define( 'AUTH_KEY',          'g{y9J$C;?jI.#jQDy;[ls4il`jp)[yFfP*19<@0}^x&d`DVNATyfo9*Q WRy@HS_' );
define( 'SECURE_AUTH_KEY',   'r1+<n[.(l<;rn;=hWBv jVYXpmG+GbJ0P 52=p8|JtXUBi2]V.gq}i9`~)u9JmTw' );
define( 'LOGGED_IN_KEY',     'x<1.CZ1mHM{-]g`9nhrt)og+ r6;OK1X |x=A~?.B{$#9fnSA&pLnpgj?}OG;<+0' );
define( 'NONCE_KEY',         'zWCU<gQjg(J}/5Jngg46<s}k~2J /~ot;+5Rn#]5FIKi-r3];;@tn={}qtW>KaZv' );
define( 'AUTH_SALT',         ',87 <#%Gb>>GdLy*O_%3udNXdAU6]gM_1_-_5kZnT jY )Os4a5qqk7H0OS.p-k#' );
define( 'SECURE_AUTH_SALT',  'e^U/(TK*f$$>*W91%!{9[]7aM/I2yk{4C{B6afTH^#bl71o/2T 28n_>LC8Ss7{Y' );
define( 'LOGGED_IN_SALT',    '|KXE3>{QsXW![o>cYL8l|/^yJ5d8_rE:*N@);O.zo:8m3,KG/RM@hG<mR[-p^>as' );
define( 'NONCE_SALT',        'Iko=NFzH6J4AVURh`O,Y-:lV)>5hVB2uaW.C)@~mf*H@AVeu*TOUT&AWxc9]67=E' );
define( 'WP_CACHE_KEY_SALT', 'W%=et&:@Bq.rsP,o13YRoW;c6KrNgo9~kI~9vV5pI+g{wix|D^a7rq@-~$s.?FCl' );


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

define( 'WP_ENVIRONMENT_TYPE', 'local' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
