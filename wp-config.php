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
define( 'DB_NAME', 'tantascan' );

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
define( 'AUTH_KEY',         '|-DlM[:*ohFg@Y1)?WrO?b-i=XyksSG8Tf@Tq.E:1-}@{HX0C]hyr(h0 ``-H!cu' );
define( 'SECURE_AUTH_KEY',  '-ru)L|k;/3eDn>kQUtYwBIw.KOF4CliOB;sPpMH%gJ+*`q/t}Jx$?N$U)}FmHZR}' );
define( 'LOGGED_IN_KEY',    '+|BS7m:5BTY][Ks!?Wg^M(br&jw*LIv7=jon*|6B*Zt{zR,a^/m}{xcysg_^D `P' );
define( 'NONCE_KEY',        '8] @_;>kpVl:oUJ*ImWpNv~//Si)bc2j#M8X)XA^]LBCQy19UtDl[Bx|1FIoT7Tu' );
define( 'AUTH_SALT',        '3V0q:sSR`muE?>1?%|!HaY (<;~`J*6)~fhP:2=2/qu3_?z-X,thLvds&O5l/x:g' );
define( 'SECURE_AUTH_SALT', '9`5{*y!|QFMGPDWII~Q0z~.1_O]2)<!}iW8I7j4(m/2WneRAl*5fUvY.6&bS.r0F' );
define( 'LOGGED_IN_SALT',   'n~>g|1[_ZT!5R+#42G){~tQM),7G=la;n$q$HA*ucr+lzU`y=q*,DsKnnsW>c6e2' );
define( 'NONCE_SALT',       'pQZGN]vw+yT+~h./cCO5,v/Rn(Njg|~O8+(4OdHp@:u{<6,4If|vnS10z@u;9kSW' );

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
$table_prefix = 'wp_tanta_';

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
define( 'WP_DEBUG', false);
define( 'WP_DEBUG_DISPLAY', true );
define('WP_ALLOW_MULTISITE', true);
define('DISALLOW_FILE_MODS', false);
define('DISALLOW_FILE_EDITS',false);
/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */
define( 'MULTISITE', true );
define( 'SUBDOMAIN_INSTALL', false );
define( 'DOMAIN_CURRENT_SITE', 'localhost:70' );
define( 'PATH_CURRENT_SITE', '/tantaScan/' );
define( 'SITE_ID_CURRENT_SITE', 1 );
define( 'BLOG_ID_CURRENT_SITE', 1 );

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
