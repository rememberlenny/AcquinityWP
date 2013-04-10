<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

if ( file_exists( dirname( __FILE__ ) . '/../env_local' ) ) {

  define('WP_ENV', 'local');
  define('WP_DEBUG', true);

  define('DB_NAME', 'ai_wl');
  define('DB_USER', 'root');
  define('DB_PASSWORD', 'root');
  define('DB_HOST', 'localhost');

} elseif ( file_exists( dirname( __FILE__ ) . '/../env_production' ) ) {

    // Playground Environment
    define('WP_ENV', 'playground');
    define('WP_DEBUG', true);

    define('DB_NAME', 'acquinit_wor1');
    define('DB_USER', 'acquinit_wor1');
    define('DB_PASSWORD', 'w8QncpV9');
    define('DB_HOST', 'localhost');

} else {

    // Production Environment
    define('WP_ENV', 'production');
    define('WP_DEBUG', false);

    // ... production db constants
}
  /** Database Charset to use in creating database tables. */
  define('DB_CHARSET', 'utf8');

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
//define('WP_CACHE', true); //Added by WP-Cache Manager
define( 'WPCACHEHOME', '/home1/acquinit/public_html/wp-content/plugins/wp-super-cache/' ); //Added by WP-Cache Manager
define('AUTH_KEY',         '(WQvpC.Xe!1J5sQG);h./U=&w%_=B_$9x:_d;#YhJFV=mZfR[It?I5Y=aZNZC+ e');
define('SECURE_AUTH_KEY',  '}GK&=v*D+e*8m)GV04Q9T3Izkq-P[A.xct`wc2?[)@=w)7T}2x;s+zYczK=c+Mi_');
define('LOGGED_IN_KEY',    '2])qD~iG|TFmDd+tz#JB,s7]~qHn^U,39[9X$W-,w+|B4uE*az@4t~(|cEnZsdR8');
define('NONCE_KEY',        '_!Z2tQ`9/,lQ[o=Zh!I&S^e~[+u^%[8Pk+J-EeL3v>Grju|l}r]`a#bym*5DHp2:');
define('AUTH_SALT',        'rek;&&Yo1>UlS&B!7O?7dQr)Y$It.-I?!+s9SS5.iZbf}xP{E0(H+im|)r%~-~$+');
define('SECURE_AUTH_SALT', '-ufgX(X+p6K%^HybmKgV Z;lCgRk{k(HiLzj63|)Iz$Un?O^O=l/Ldti[E|XYo3#');
define('LOGGED_IN_SALT',   'v(+K==5- vvjL+)>}Pv|{?6c=cYo!VAU3b?=C}*3^E}{odk/Yw]rjM[};AYk`++*');
define('NONCE_SALT',       'up[k1#kRHS_]gu%pPI&C&p3SBBDv4B0b{44~|bbZ*:~kOaEm<e|}`},Du`n9@6->');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, installME', 'ai_wl');
: * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
  support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */

define('SAVEQUERIES', true);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
  define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');


