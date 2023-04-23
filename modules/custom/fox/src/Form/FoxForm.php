<?php

namespace Drupal\fox\Form;

use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Entity\ContentEntityForm;

class FoxForm extends ContentEntityForm {

  public function save(array $form, FormStateInterface $form_state) {
    $result = parent::save($form, $form_state);

    $entity = $this->getEntity();
    $message = $this->t("%label has been added/updated!", ['%label' => $entity->label()]);
    $this->messenger()->addMessage($message);

    $form_state->setRedirect('entity.fox.canonical', ['fox' => $entity->id()]);

    return $result;
  }
}
