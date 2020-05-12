<?php

/**
 * Plugin Name: Test Run
 */

add_action('admin_notices', 'testrun_show_message_cb');

function testrun_show_message_cb()
{
  $message = "Yay! Test Run plugin is active. But it's empty :(";
  printf('<div class="error notice"><h2/>%s</h2></div>', $message);
}
