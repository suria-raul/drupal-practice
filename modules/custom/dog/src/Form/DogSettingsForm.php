<?php

namespace Drupal\dog\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

class DogSettingsForm extends FormBase {

  public function getFormId() {
    return 'dog_settings';
  }

  public function buildForm(array $form, FormStateInterface $form_state) {
    $form['settings'] = [
      '#markup' => $this->t("Configure your custom content entity here"),
    ];

    $form['actions'] = [
      '#type' => 'action',
    ];

    $form['actions']['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('save'),
    ];

    return $form;
  }

  public function submitForm(array &$form, FormStateInterface $form_state) {
    $this->messenger()->addMessage($this->t("Form submitted!"));
  }

}
