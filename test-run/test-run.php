<?php

/**
 * Plugin Name: Test Run
 */


// don't run if someone access this file directly
defined('ABSPATH') || exit;

// define plugin file path
if (!defined('TEST_RUN_PLUGIN_FILE')) {
  define('TEST_RUN_PLUGIN_FILE', __FILE__);
}

// We require the composer autoloader
if (file_exists($composer_autoload = __DIR__.'/vendor/autoload.php')) {
  require_once $composer_autoload;
}

(new \TestRun\Init());
