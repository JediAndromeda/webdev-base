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
define('DB_NAME', 'startwordpress');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

/** MySQL hostname */
define('DB_HOST', 'localhost');

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
define('AUTH_KEY',			'9!h/6 TJRFlBRfgTj|#!/ctG!9cRWt- s/+h^D<+d&(b~( 6Kf,xp`OOc2IpZ>CV');
define('SECURE_AUTH_KEY',	'U[:$CpgJG}]?~8V+=)51wz_doGvW8sB#.)5`ZZi9Sw!j:duw!5j2<fYh1z[KWJ?{');
define('LOGGED_IN_KEY',   	'(b_//7lqDYQ3f_afIXuDWC`;z}<-]6;Fz:$q@bE=t|9pn7<? nBk-nU|e1M6A |4');
define('NONCE_KEY',         'IhnqMhFwW7Xlq#+DZD`iw:$9qo?JdX_Lor;.G5U]`<pM|YR37-ZCf<E)|}({^B,J');
define('AUTH_SALT',         '?;~M=e;i_=i*oOi|yrZ]<(-xQwK2clJ0p-:}KXL,$4UjZoj_2vfS{E(:,gdowz#R');
define('SECURE_AUTH_SALT',  'iS3pQ3|Ss#@5RrtqQ+{=YHx|pEc?*uyM6df!s%0`>m!Ml:vjKY@+4:#+O;Dn%isy');
define('LOGGED_IN_SALT',    'GN#C#n;EVZ0Gac@<FzX_%6S[^iJMnUP,EIw?x-Br%<r^e6UdRPF`J9le>*nNx3b8');
define('NONCE_SALT',        'ZmSN+g-Lm-|jD-?t(Q@k9=>65GwN|vBE]]Dg|eS@f0DkIs-.KAw+ s7Qj/;&DB%x');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'butts69_';

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
define('WP_DEBUG', true);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

