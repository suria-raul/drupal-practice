<?php

namespace Drupal\dog\Form;

use Drupal\Core\Entity\ContentEntityForm;
use Drupal\Core\Form\FormStateInterface;

class DogForm extends ContentEntityForm {
  public function save(array $form, FormStateInterface $form_state) {
    $result = parent::save($form, $form_state);

    $entity = $this->getEntity();

    $this->messenger()->addStatus($this->t("%label has been created/updated!", ['%label' => $entity->label()]));

//    $form_state->setRedirect('entity.dog.collection');

    return $result;
  }

}
