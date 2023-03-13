<?php

namespace Drupal\one\Controller;

use Drupal\Core\Controller\ControllerBase;

class OneController extends ControllerBase {

  public function index()
  {
    return [
      '#theme' => 'one_page',
    ];
  }
}
