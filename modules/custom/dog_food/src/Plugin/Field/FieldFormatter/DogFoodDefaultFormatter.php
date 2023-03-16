<?php

namespace Drupal\dog_food\Plugin\Field\FieldFormatter;

use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\FormatterBase;

/**
 * Plugin implementation of the 'dog_food_default' formatter.
 *
 * @FieldFormatter(
 *   id = "dog_food_default",
 *   label = @Translation("Default"),
 *   field_types = {"dog_food"}
 * )
 */
class DogFoodDefaultFormatter extends FormatterBase {

  /**
   * {@inheritdoc}
   */
  public function viewElements(FieldItemListInterface $items, $langcode) {
    $element = [];

    foreach ($items as $delta => $item) {

      if ($item->food_name) {
        $element[$delta]['food_name'] = [
          '#type' => 'item',
          '#title' => $this->t('Food name'),
          '#markup' => $item->food_name,
        ];
      }

    }

    return $element;
  }

}
