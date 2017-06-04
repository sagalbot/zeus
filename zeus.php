<?php
/**
 * Plugin Name:     Zeus
 * Plugin URI:      http://github.com/sagalbot/zeus
 * Description:     WordPres Automated End-To-End Testing
 * Author:          Jeff Sagal
 * Author URI:      http://github.com/sagalbot
 * Text Domain:     zeus
 * Domain Path:     /languages
 * Version:         0.1.0
 *
 * @package         Zeus
 */

use Zeus\App;


/**
 * Autoload class files, create a new App instance.
 */
require_once 'vendor/autoload.php';

add_action('plugins_loaded', [ App::class, 'instance' ]);