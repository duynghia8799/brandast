<?php

// BEGIN iThemes Security - Do not modify or remove this line
// iThemes Security Config Details: 2
define( 'DISALLOW_FILE_EDIT', true ); // Disable File Editor - Security > Settings > WordPress Tweaks > File Editor
define( 'FORCE_SSL_ADMIN', true ); // Redirect All HTTP Page Requests to HTTPS - Security > Settings > Secure Socket Layers (SSL) > SSL for Dashboard
// END iThemes Security - Do not modify or remove this line

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
define( 'DB_NAME', 'brandast_admin' );

/** MySQL database username */
define( 'DB_USER', 'brandast_admin' );

/** MySQL database password */
define( 'DB_PASSWORD', 'MTXNP1Zs' );

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
define( 'AUTH_KEY',         ')U2mCeT%o_20dvP#J,gD:9cLsSyRXm[nQlPC<?O9v:y1__|%h;!t~M;=X_&KMl:1' );
define( 'SECURE_AUTH_KEY',  '-)9m~PxzgHNxvMeK|p@HFN@pqRnINRnIvbyk9pH$leGOEsQ@Au(pkgKkS0kAbjIw' );
define( 'LOGGED_IN_KEY',    '{ YaYSP)`K_Z69urFqkwgpeQj03G?!XPph4[aeHE,<lQ,/Y3NQJ,!s[ck$v0.AQg' );
define( 'NONCE_KEY',        'x{gv:r4:R!mQ,$KbS6mny@AmND.L3cNXH[RmkR6FqRlkx*iaE;d#DYSc|6Tl<SQU' );
define( 'AUTH_SALT',        '[lc|CqhjZ}S1KfL&oNZy=n 7qiYgs}d5G0Nuw&Qtw~@EAtzAjg,yX&K`2_a` <@<' );
define( 'SECURE_AUTH_SALT', '+_}hszRK?HzWVp-f4-}d;AEg.x0-hsM6g|E;a0[X`ee$v7G%MY90b,:pfaq|@ykA' );
define( 'LOGGED_IN_SALT',   'r^<=zAO;5,Wr1}U#Uh4a)?(nTnZ*LqK{8LiQS@U[[r(]!N8 vWDN4>Ecy#Hlr7OZ' );
define( 'NONCE_SALT',       ')OTbSFyVgk-am1Z64]:I<:g9aCA{9uhd`rO0/om(g>Cs|sPM*1N6^4qLv;J?@>4R' );

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
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false);

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
