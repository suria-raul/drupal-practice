<?php

namespace Drupal\two\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Returns responses for two routes.
 */
class TwoController extends ControllerBase {

  /**
   * Builds the response.
   */
  public function build() {

    $build['content'] = [
      '#type' => 'item',
      '#markup' => $this->t('It works!'),
    ];

    return $build;
  }

}
