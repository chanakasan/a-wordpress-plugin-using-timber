<?php

namespace TestRun;

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
    add_action('admin_enqueue_scripts', [$this, 'register_and_load_assets_cb']);
  }

  public function admin_menu_cb()
  {
    // Ref: https://developer.wordpress.org/reference/functions/add_menu_page/
    add_menu_page('Test Run Admin Page', 'Test Run', 'manage_options', 'test-run', ['\TestRun\View', 'render_menu_page'], 'dashicons-schedule', 3);
  }

  public function register_and_load_assets_cb($hook)
  {
    if ($hook != 'toplevel_page_test-run') {
      return;
    }

    // Ref: https://developer.wordpress.org/reference/functions/wp_register_style/
    // Ref: https://developer.wordpress.org/reference/functions/wp_register_script/
    wp_register_style('test-run-css', plugins_url('assets/css/main.css', TEST_RUN_PLUGIN_FILE));
    wp_register_script('test-run-js', plugins_url('assets/js/main.js', TEST_RUN_PLUGIN_FILE));

    // Ref: https://developer.wordpress.org/reference/functions/wp_enqueue_style/
    // Ref: https://developer.wordpress.org/reference/functions/wp_enqueue_script/
    wp_enqueue_style('test-run-css');
    wp_enqueue_script('test-run-js');
  }
}
