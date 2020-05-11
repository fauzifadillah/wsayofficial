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
define( 'DB_NAME', 'u6516000_wp109' );

/** MySQL database username */
define( 'DB_USER', 'u6516000_wp109' );

/** MySQL database password */
define( 'DB_PASSWORD', ']6Z81S]ypV' );

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
define( 'AUTH_KEY',         's04rihqaqdopzunpvn1vnrfflokfrg1qkiqyuft4virsmhasppmvm8hfkb7vnnio' );
define( 'SECURE_AUTH_KEY',  'hvu0nrghs3v4qqxbevjl5sumgwju1qpk0dvhpsbjhknlulxmwjqwxsvfnqlsaakc' );
define( 'LOGGED_IN_KEY',    'x0j07tyyve6ybxsxdxzsjghitt6eh3dazuk501qypq6y50x0zzulrneaizoqasbl' );
define( 'NONCE_KEY',        'lmcgrfmn6r4imndwe4r3wmkpj21fkzr0h7nllt1mm8uudb0ooqm60d9dsmon99uc' );
define( 'AUTH_SALT',        'mgc2hd2xqll0ujdp5cpfcdyl9xid2hte6afhvlbzn2sorggkhgqqk1fejd2vrdy8' );
define( 'SECURE_AUTH_SALT', 'v2mkt6795abvo2g72mrsovbhvok6kunt1eyk4ofhoteham6x6xr7klh0hb3rtviz' );
define( 'LOGGED_IN_SALT',   'usvdkpnrjspmggjv73shqvolxos8ltlzhk4c35lzvvwoaqwjrb9kd2dk6mujcisx' );
define( 'NONCE_SALT',       'vjytwutxxtkvr7lmlbjb3bt4fdbianm93xk8yf6sajxovlrqrn8clolzbtkeu1et' );

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
