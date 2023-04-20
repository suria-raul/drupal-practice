<?php

namespace Drupal\menu_one\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a menu one block block.
 *
 * @Block(
 *   id = "menu_one_block",
 *   admin_label = @Translation("Menu One Block"),
 *   category = @Translation("Custom")
 * )
 */
class MenuOneBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
//    we're unable to make contextual links work
    $build['content'] = [
      '#markup' => $this->t('It works!'),
      '#contextual_links' => [
        'random' => [
          'route_parameters' => ['block' => 1]
        ]
      ]
    ];
    return $build;
  }

}
