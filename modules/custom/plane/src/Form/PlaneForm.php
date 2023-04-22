<?php

namespace Drupal\plane\Form;

use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Entity\ContentEntityForm;

class PlaneForm extends ContentEntityForm {

  public function submitForm(array &$form, FormStateInterface $form_state) {
    $result = parent::save($form, $form_state);

    $entity = $this->getEntity();
    $message = $this->t('The %label plane model has been added!', ['label' => $entity->toLink()->toString()]);
    $this->messenger()->addMessage($message);

    $form_state->setRedirect('entity.plane.collection');

    return $result;
  }
}
