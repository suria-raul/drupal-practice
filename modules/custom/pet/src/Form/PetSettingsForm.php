<?php

namespace Drupal\pet\Form;

use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Form\FormBase;

class PetSettingsForm extends FormBase {

  public function getFormId() {
    return 'pet_settings';
  }

  public function buildForm(array $form, FormStateInterface $form_state) {
    $form['settings'] = [
      '#markup' => $this->t("The pet settings form")
    ];

    $form['actions'] = [
      'type' => 'action'
    ];

    $form['actions']['submit'] = [
      'type' => 'submit',
      'value' => $this->t("Save")
    ];

    return $form;
  }

  public function submitForm(array &$form, FormStateInterface $form_state) {
    $this->messenger()->addMessage($this->t("Form submitted!"));
  }
}
