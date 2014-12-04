<?php

/*----------------------------------------------------*/
// Database
/*----------------------------------------------------*/
define('DB_CHARSET', 'utf8');
define('DB_COLLATE', '');
$table_prefix = getenv('DB_PREFIX') ? getenv('DB_PREFIX') : 'wp_';

/*----------------------------------------------------*/
// Authentication unique keys and salts
/*----------------------------------------------------*/
/**
 * @link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service
 */
define('AUTH_KEY', getenv('AUTH_KEY') ? getenv('AUTH_KEY') : '');
define('SECURE_AUTH_KEY', getenv('SECURE_AUTH_KEY') ? getenv('SECURE_AUTH_KEY') : '');
define('LOGGED_IN_KEY', getenv('LOGGED_IN_KEY') ? getenv('LOGGED_IN_KEY') : '');
define('NONCE_KEY', getenv('NONCE_KEY') ? getenv('NONCE_KEY') : '');
define('AUTH_SALT', getenv('AUTH_SALT') ? getenv('AUTH_SALT') : '');
define('SECURE_AUTH_SALT', getenv('SECURE_AUTH_SALT') ? getenv('SECURE_AUTH_SALT') : '');
define('LOGGED_IN_SALT', getenv('LOGGED_IN_SALT') ? getenv('LOGGED_IN_SALT') : '');
define('NONCE_SALT', getenv('NONCE_SALT') ? getenv('NONCE_SALT') : '');

/*----------------------------------------------------*/
// Custom settings
/*----------------------------------------------------*/
define('WP_AUTO_UPDATE_CORE', false);
define('DISALLOW_FILE_EDIT', true);

/* That's all, stop editing! Happy blogging. */
