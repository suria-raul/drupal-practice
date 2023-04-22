<?php

namespace Drupal\simple_ajax_form\Form;

use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Ajax\AjaxResponse;
use Drupal\Core\Ajax\HtmlCommand;

class SimpleAjaxForm extends FormBase {

  public function getFormId() {
    return 'simple_ajax_form';
  }

  public function buildForm(array $form, FormStateInterface $form_state) {
    $form['settings'] = [
      '#type' => 'markup',
      '#markup' => '<div id="result"></div>'
    ];

    $form['first'] = [
      '#type' => 'textfield',
      '#title' => $this->t("First Number")
    ];

    $form['second'] = [
      '#type' => 'textfield',
      '#title' => $this->t("Second Number")
    ];

    $form['actions'] = [
      '#type' => 'button',
      '#value' => $this->t("Calculate Sum"),
      '#ajax' => [
        'callback' => '::calculate'
      ]
    ];

    return $form;
  }

  public function calculate(array &$form, FormStateInterface $formState) {
    $result = $formState->getValue('first') + $formState->getValue('second');
    $response = new AjaxResponse();
    $response->addCommand(
      new HtmlCommand(
        '#result',
        '<div>' . $this->t("The result is @result", ['@result' => $result]) . '</div>'
      )
    );

    return $response;
  }

  public function submitForm(array &$form, FormStateInterface $form_state) {

  }
}
