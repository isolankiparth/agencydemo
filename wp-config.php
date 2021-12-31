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
define( 'DB_NAME', 'agencydemo' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

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
define( 'AUTH_KEY',         ' M=xitEh)POJ|cdz?E>qm5l^vYC({~:Iq!TO?i:IFmbTL@QEx2LzKTA4Xuh(.bF1' );
define( 'SECURE_AUTH_KEY',  'ki zN.f#XBb=:w4pPHlO@TxJRY`_AH@4=c-O .9CHf$9`:(rD:61p$)d($lt|b|9' );
define( 'LOGGED_IN_KEY',    '!4IE<&CiC[k6!2c/X#kGn4vgAMr]1!f;I&eV}8!W2F%~uGM|=h6G+,dG6]g #D[/' );
define( 'NONCE_KEY',        '[I}/Y{KUHlNvsk_P~xZCEynigJ9q0w;ZnF,/VXY^/7u/?YhC271vT8<c4kGmM##I' );
define( 'AUTH_SALT',        'I@~(F*3ZGU#r-6d):gcW O{&rEP9WcabMn~md+R^k:R|87OD*rf2Y,x_i^:lD+#0' );
define( 'SECURE_AUTH_SALT', '&}/3%rk7#eJx@cKagohEVqk_&w+_,i,a]LB6tE0%*nmRdVeAw/uYP2$^V0k ws^i' );
define( 'LOGGED_IN_SALT',   '4eTXp`0H5g5rrOO^t7{`Lv(-7_1Twm%HUh)5CM@OO^E!drZca}]M`!@]7h-.PwdG' );
define( 'NONCE_SALT',       'e<AU{_ *k6/^+~KHa.BNKIrF7Jwc>2Tm[6~`C-bF@oxmWLdgtvMKys2Y:3Ske/g?' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'ad_';

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
