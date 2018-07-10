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
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'sammagk289_wp928');

/** MySQL database username */
define('DB_USER', 'sammagk289_wp928');

/** MySQL database password */
define('DB_PASSWORD', 'S3-p9jd-15');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'uhh0soifietsqwisbgkxlo1ijn7vlkqj2vkueprhypffzsbdsvgjzwgkupbcmvmr');
define('SECURE_AUTH_KEY',  'mxfihplp2jq5mjtfgj6l3o162fadecvbjfq73dlam53ptv72kbzmut0eehl0bjmm');
define('LOGGED_IN_KEY',    'vbofov3yvugheybri2horoz9mgwrl7o53jter9pdgc8lbkpxxloah9jbhnhyr6ik');
define('NONCE_KEY',        'giy55ad9giowjkdxuf6gkd89ptrt1b6j2bj7cnbkz4owrh190ru9y66edbqrjz14');
define('AUTH_SALT',        'tqgsrwzo6jguz2k25g7l3wzrty2rlnkunkelngq0blellpybbe1e6ulguakxb60q');
define('SECURE_AUTH_SALT', 'xsr08qqbaiaj39mq9np8kbi1hvldmaheftptsbnvsrqmpok5tlni2xjsvorcrxi1');
define('LOGGED_IN_SALT',   'sq152dbverb6cjhmkmbfl9ujopreeqe2qgpsj737dfawnk7reub1h37sgnpthp6o');
define('NONCE_SALT',       'ytqi9z3hhco5smx8wiwxswsizbhlmkvitoifdm41xa5nyqnevmsz0jpowtmyggmk');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wpca_';

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
