<?php

namespace TestRun;

use Timber\Timber;

class View
{
  public static function render_menu_page()
  {
    Timber::$locations = __DIR__.'/views';

    $tab = intval($_GET['tab'] ?? '1');
    $data = [
      'page_name' => 'test-run',
      'current_tab' => $tab,
      'current_tab_partial' => "tab_$tab.twig",
    ];
    Timber::render('main.twig', $data);
  }
}
