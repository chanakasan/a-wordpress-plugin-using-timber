<?php

namespace TestRun;

use Timber\Timber;

class SettingsView
{
  public static function render_section_1_cb()
  {
    $html = <<<STR
    <p>This is section one</p>
STR;
    Timber::render_string($html);
  }

  public static function render_section_2_cb()
  {
    $html = <<<STR
    <p>This is section two</p>
STR;
    Timber::render_string($html);
  }

  public static function render_field_1_cb()
  {
    $html = <<<STR
    <input id="testrun_field_1" type="text" name="testrun_visitor_name" value="{{ function('get_option', 'testrun_visitor_name') }}">
STR;
    Timber::render_string($html);
  }

  public static function render_field_2_cb()
  {
    $html = <<<STR
    <input id="testrun_field_2" type="text" name="testrun_visitor_company" value="{{ function('get_option', 'testrun_visitor_company') }}">
STR;
    Timber::render_string($html);
  }
}
