<?php

namespace Drupal\plane\Form;

use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Form\FormBase;

class PlaneSettingsForm extends FormBase {

  public function getFormId() {
    return 'plane_settings';
  }

  public function buildForm(array $form, FormStateInterface $form_state) {
    $form['settings'] = [
      '#markup' => $this->t('The form for Plane entity')
    ];

    $form['actions'] = [
      '#type' => 'actions'
    ];

    $form['actions']['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Save')
    ];

    return $form;
  }

  public function submitForm(array &$form, FormStateInterface $form_state) {
    $this->messenger()->addStatus($this->t('The Form has been submitted!'));
  }
}
