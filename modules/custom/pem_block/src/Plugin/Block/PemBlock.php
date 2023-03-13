<?php

namespace Drupal\pem_block\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * @Block(
 *   id = "pem_block",
 *   admin_label = @Translation("Pem Block")
 * )
 */
class PemBlock extends BlockBase {
  public function build()
  {
    return [
      '#markup' => $this->t("The Pem Block!"),
    ];
  }
}
