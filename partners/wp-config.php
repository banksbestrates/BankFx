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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'partner_portal' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '.griQ.SxV~]Bi5#Sy@,.tgyq_:dq-:k[Z4C/6)5p95`R^K|U>D>d|i4|eh/:JnKo' );
define( 'SECURE_AUTH_KEY',  'Pj-/Nhr%)g0!^&S.7B0!d7t`Sg3vyzJ@uRXVbiNJk,(d:mIaNrY,,j7+.]?):Vi.' );
define( 'LOGGED_IN_KEY',    'y3Pls5O#FX*<{}Aq~E/7McH9lb?mvu])QwIG>Xx][@]DSm>1r{^d*^&dyT^zM6p}' );
define( 'NONCE_KEY',        'QogFX6xQVC]b7AyoLA{~q)w:w;ol>YR#xl%9LRo=1E,J8Of3C&H@D)816hX=hkZ+' );
define( 'AUTH_SALT',        'aZ,7&Vlm6l/S|ZF.>-yBF]X HM# |&F%|(xd!.2FU&8%>zUXh-oXlJ{rBvfe;+C@' );
define( 'SECURE_AUTH_SALT', 'BC^ud)b`IymN22==,H$6yYp.gokzk>oea1IiHql<b:<T7]^m[O;49A ZYHwgp&)[' );
define( 'LOGGED_IN_SALT',   'E`5E3AA[4in!m=r^WEB}@dN<CHgHM4io,&Rhq:wE$ir)IGm&x@&+.<v1{H%CXO*3' );
define( 'NONCE_SALT',       '`*R$Y.[p$%2x+#eK@]MWke(n~:DVOt/f]N&<etEZc]zELWV+(0LRL;fxAqAmh+cL' );

/**#@-*/

/**
 * WordPress Database Table prefix.
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

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';