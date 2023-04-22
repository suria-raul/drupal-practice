<?php

namespace Drupal\pet\Form;

use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Entity\ContentEntityForm;

class PetForm extends ContentEntityForm {

  public function submitForm(array &$form, FormStateInterface $form_state) {
    $result = parent::save($form, $form_state);

    $entity = $this->getEntity();
    $message = $this->t("%label pet has been added", ['%label' => $entity->label()]);
    $this->messenger()->addMessage($message);

    $form_state->setRedirect('entity.pet.collection');

    return $result;
  }
}
