<?php

namespace TestRun;

use Timber\Timber;

class View
{
  public static function render_menu_page()
  {
    Timber::$locations = __DIR__.'/views';
    Timber::render('main.twig');
  }
}
