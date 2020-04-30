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
define( 'WPMS_ON', true );
define( 'WPMS_SMTP_PASS', 'dev@dragon12' );
define('DB_NAME', 'kerichog_baraka_shop');

/** MySQL database username */
define('DB_USER', 'kerichog_baraka');

/** MySQL database password */
define('DB_PASSWORD', 'L?UsKFOYdf_8');

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
define('AUTH_KEY',         'x?XzuQ<$Up}1aG/wpB,@EbB}OD/`EdD#D3:xx3_r&:s,+,$P=0,VbO(L2^uFhBfS');
define('SECURE_AUTH_KEY',  'Y:b-tX?N4VWBtUtO]%_gvaY&#3tI |kRC3lCw#`Z}r>_>oFIKNam?[X##?wo7r9p');
define('LOGGED_IN_KEY',    'A$#E76t<rAZ^&Ji4a-6h W~G)yh* tvCKYP67?HC#go%wHq(iRTj:`q@fW69eXOL');
define('NONCE_KEY',        '~2;!Hf)^/*{[iuF`MJZ6@N|&7 N:pM0i5 yzWXG;X@EHc1<n*)<<0P.,/;pX8jHZ');
define('AUTH_SALT',        'ic!t&3;qNA$VzD^{3oYc)U:hDY]?^<!k([h|QLg/|q[?}*jiTYe^:(:/D6.pJPt1');
define('SECURE_AUTH_SALT', 'z#qW/VeN,v?N@%EKA<3nb<voVtbD}duwQ^v8D?xh+Gp]/[7pwx-F<fDH8P>/l?B;');
define('LOGGED_IN_SALT',   '-$:6<Phv9A9.w)<nC0$?KDJ~nx)s~ELFe}Zu0+-j&vsEhPf~ftpm5GJ9XC~k|.N~');
define('NONCE_SALT',       'SVF`7-#NKOmW(d:?x[J {XsXIlj=8A02403Y+D9:8#.:WUyII*oVJ_[m-U9!YSK+');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'gc_';

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
// Enable WP_DEBUG mode
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

