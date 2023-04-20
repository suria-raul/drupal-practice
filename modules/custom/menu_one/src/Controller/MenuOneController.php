<?php

namespace Drupal\menu_one\Controller;

use Drupal\Core\Controller\ControllerBase;

class MenuOneController extends ControllerBase {

  public function index() {
    return [
      '#markup' => 'Working!',
    ];
  }

  public function contextualTesting() {
    return [
      '#markup' => 'Contextual Testing!',
    ];
  }

}
