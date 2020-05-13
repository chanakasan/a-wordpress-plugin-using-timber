<?php

/**
 * Plugin Name: Test Run
 */

// We require the composer autoloader
if (file_exists($composer_autoload = __DIR__.'/vendor/autoload.php')) {
  require_once $composer_autoload;
}

(new \TestRun\Init());
