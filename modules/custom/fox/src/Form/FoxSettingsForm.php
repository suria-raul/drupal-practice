<?php

namespace Drupal\fox\Form;

use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Form\FormBase;

class FoxSettingsForm extends FormBase {

  public function getFormId() {
    return 'fox_settings';
  }

  public function buildForm(array $form, FormStateInterface $form_state) {
    $form['settings'] = [
      '#type' => 'markup',
      '#markup' => $this->t("The fox settings form")
    ];

    $form['actions'] = [
      '#type' => 'actions'
    ];

    $form['actions']['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t("Save")
    ];

    return $form;
  }

  public function submitForm(array &$form, FormStateInterface $form_state) {
    $this->messenger()->addMessage($this->t("Form submitted!"));
  }
}
