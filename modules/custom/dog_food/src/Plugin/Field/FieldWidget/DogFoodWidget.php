<?php

namespace Drupal\dog_food\Plugin\Field\FieldWidget;

use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\WidgetBase;
use Drupal\Core\Form\FormStateInterface;
use Symfony\Component\Validator\ConstraintViolationInterface;

/**
 * Defines the 'dog_food' field widget.
 *
 * @FieldWidget(
 *   id = "dog_food",
 *   label = @Translation("Dog food"),
 *   field_types = {"dog_food"},
 * )
 */
class DogFoodWidget extends WidgetBase {

  /**
   * {@inheritdoc}
   */
  public function formElement(FieldItemListInterface $items, $delta, array $element, array &$form, FormStateInterface $form_state) {

    $element['food_name'] = [
      '#type' => 'textarea',
      '#title' => $this->t('Food name'),
      '#default_value' => isset($items[$delta]->food_name) ? $items[$delta]->food_name : NULL,
    ];

    $element['#theme_wrappers'] = ['container', 'form_element'];
    $element['#attributes']['class'][] = 'dog-food-elements';
    $element['#attached']['library'][] = 'dog_food/dog_food';

    return $element;
  }

  /**
   * {@inheritdoc}
   */
  public function errorElement(array $element, ConstraintViolationInterface $violation, array $form, FormStateInterface $form_state) {
    return isset($violation->arrayPropertyPath[0]) ? $element[$violation->arrayPropertyPath[0]] : $element;
  }

  /**
   * {@inheritdoc}
   */
  public function massageFormValues(array $values, array $form, FormStateInterface $form_state) {
    foreach ($values as $delta => $value) {
      if ($value['food_name'] === '') {
        $values[$delta]['food_name'] = NULL;
      }
    }
    return $values;
  }

}
