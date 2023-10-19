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
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpresst4' );

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
define( 'AUTH_KEY',         'QSf^<*o#z`z6jG68g#l0CHi.w:MSN|~M4W=((J-=_9G/7)>MR`AGzJc[Rr@e?M+3' );
define( 'SECURE_AUTH_KEY',  'ErnGgM}iRuo7gs=E9*kkD{-Bf<s!E_a4~9X:R<P*&-{NdWK=HF5cr$>7QMz-^SmH' );
define( 'LOGGED_IN_KEY',    'w^/Vj(z9CU]JJ@dT=@CR?c*7ptd7aR?l%_d9ow3<J5Lzj}aN:_+xqvv[|*YrGCp:' );
define( 'NONCE_KEY',        'W7f[%-x8>5!r;-5T,U /VHI1oENoC<o(2NJoS]2RkJ7HDPnLRP4vqSn,+i CEY8C' );
define( 'AUTH_SALT',        '%ZQZ@%Au|a;fa:U5!&ljR8@+O}3$64Ml uCYL<hSMTu}f`F$;ywv+*&7Je%).{r[' );
define( 'SECURE_AUTH_SALT', '#n5))-RTjNqbL~*LhBYNem`0#A9y]360R!%r]NA6pI*VAawo-7JRK}y#K}2t7NHe' );
define( 'LOGGED_IN_SALT',   '#U]0Ja(`WT}3Wq7hlJJoeo;MxP.TN7.3!%2vI>sYE{@cR_m9x0![j-`U3^qLUQ*%' );
define( 'NONCE_SALT',       '*>k~aCGL%$AoFPA9D35^wCVqx6)#](*XoA46{j8|t,t3)YP{g4?sWseAj4AP e;}' );

/**#@-*/

/**
 * WordPress database table prefix.
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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
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
