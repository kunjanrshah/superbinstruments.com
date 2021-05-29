<?php

// BEGIN iThemes Security - Do not modify or remove this line
// iThemes Security Config Details: 2
define( 'DISALLOW_FILE_EDIT', true ); // Disable File Editor - Security > Settings > WordPress Tweaks > File Editor
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
define('DB_NAME', 'superbi1_hdm1');

/** MySQL database username */
define('DB_USER', 'superbi1_hdm1');

/** MySQL database password */
define('DB_PASSWORD', '5ro_01oi+Tg&');


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
define('AUTH_KEY',         'Qc!*HqYel{1,pdTIW( =88GpQBAU{yNo181%KxuqzYJsn`)]XwfVOZbI9-+NCO[,');
define('SECURE_AUTH_KEY',  '1oI@ k[M=fx.=aA&@R7I7(O7BRY]{IjfQ!!;d8&H1Q7i M<&1XyXJD&[D%j[fbB_');
define('LOGGED_IN_KEY',    ')ekL-L:RbaPHfVN*L-@23l@BX9,_yCe7)@YGqZM_a4|KhQ~]dS*b[,1y93($x5y|');
define('NONCE_KEY',        ']OvK=NWjBN_L]KGg&G?*`#Kf^sqlov@@^&E2NU}(<P<{]zK0U}  ~nKWJmXjVbRo');
define('AUTH_SALT',        'MYF`gWz$;4bno6FcfZU_,EMZ9hiGl+46W9`Nbswms!d(|gz@,E3<|#d#uH[@g]To');
define('SECURE_AUTH_SALT', 'f*(F*w.xo)(|e>17jkCi-x}uUQJ/iofGT<af,50c%Bzg}kx}s<t}g2gP:m]*f:):');
define('LOGGED_IN_SALT',   'XIzmN97]1FJAS|e]-s}pHCnneaEdr.}>]R2xFrtJgm[fZ7}gy(J5y$)(/_zyrLP[');
define('NONCE_SALT',       'gza7Cpl*oc-Lnli*z:~;(@/jPY/-7<u?g,5k%d>VD)p,^C<l$c%5u&y~hT=f*dPt');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
