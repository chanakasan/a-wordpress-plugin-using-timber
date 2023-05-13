<?php

namespace TestRun;

/**
 * We can encapsulated our plugin code inside a class like below.
 * This will prevent us from adding things to global namespace.
 */
class Init
{
  protected function __construct()
  {
    // Ref: https://developer.wordpress.org/reference/hooks/admin_init/
    // Ref: https://developer.wordpress.org/reference/hooks/admin_menu/
    // Ref: https://developer.wordpress.org/reference/hooks/admin_enqueue_scripts/
    add_action('admin_init', [$this, 'admin_init_cb']);
    add_action('admin_menu', [$this, 'admin_menu_cb']);
    add_action('admin_enqueue_scripts', [$this, 'register_and_load_assets_cb']);
  }

  public function admin_init_cb()
  {
    // Ref: https://developer.wordpress.org/reference/functions/register_setting/
    // Ref: https://developer.wordpress.org/reference/functions/add_settings_section/
    // Ref: https://developer.wordpress.org/reference/functions/add_settings_field/
    register_setting('test-run', 'testrun_visitor_name');
    register_setting('test-run', 'testrun_visitor_company');
    add_settings_section('testrun_section_1', 'Section One', ['\TestRun\SettingsView', 'render_section_1_cb'], 'test-run');
    add_settings_section('testrun_section_2', 'Section Two', ['\TestRun\SettingsView', 'render_section_2_cb'], 'test-run');
    add_settings_field('testrun_visitor_name', 'Visitor Name', ['\TestRun\SettingsView', 'render_field_1_cb'], 'test-run', 'testrun_section_1');
    add_settings_field('testrun_visitor_company', 'Company Name', ['\TestRun\SettingsView', 'render_field_2_cb'], 'test-run', 'testrun_section_2');
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
