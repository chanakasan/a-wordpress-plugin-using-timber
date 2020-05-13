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
    add_action('admin_notices', [$this, 'show_message_cb']);
  }

  public function show_message_cb()
  {
    $message = "Yay! Test Run plugin is active. But it's empty :(";
    printf('<div class="error notice"><h2/>%s</h2></div>', $message);
  }
}
