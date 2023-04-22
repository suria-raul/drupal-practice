<?php

namespace Drupal\pet\Form;

use Drupal\Core\Entity\ContentEntityForm;
use Drupal\Core\Form\FormStateInterface;

/**
 * Form controller for the pet entity edit forms.
 */
class PetForm extends ContentEntityForm {

  /**
   * {@inheritdoc}
   */
  public function save(array $form, FormStateInterface $form_state) {
    $result = parent::save($form, $form_state);

    $entity = $this->getEntity();
    $message = $this->t("Your Pet %label has been added!", ['%label' => $entity->toLink()->toString()]);
    $this->messenger()->addMessage($message);

    $form_state->setRedirect('entity.pet.collection');

    return $result;
  }

}
