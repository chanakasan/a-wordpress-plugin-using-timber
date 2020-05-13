<?php

namespace TestRun;

use Timber\Timber;

/**
 * We can encapsulated our plugin code inside a class like below.
 * This will prevent us from adding things to global namespace.
 */
class Init
{
  public function __construct()
  {
    $this->init();
  }

  protected function init()
  {
    add_action('admin_menu', [$this, 'admin_menu_cb']);
  }

  public function admin_menu_cb()
  {
    // Ref: https://developer.wordpress.org/reference/functions/add_menu_page/
    add_menu_page('Test Run Admin Page', 'Test Run', 'manage_options', 'test-run', [$this, 'render_menu_page'], 'dashicons-schedule', 3);
  }

  public function render_menu_page()
  {
    Timber::$locations = __DIR__.'/views';
    Timber::render('main.twig');
  }
}
