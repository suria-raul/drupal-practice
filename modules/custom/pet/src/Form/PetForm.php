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

    $message_arguments = ['%label' => $entity->toLink()->toString()];
    $logger_arguments = [
      '%label' => $entity->label(),
      'link' => $entity->toLink($this->t('View'))->toString(),
    ];

    switch ($result) {
      case SAVED_NEW:
        $this->messenger()->addStatus($this->t('New pet %label has been created.', $message_arguments));
        $this->logger('pet')->notice('Created new pet %label', $logger_arguments);
        break;

      case SAVED_UPDATED:
        $this->messenger()->addStatus($this->t('The pet %label has been updated.', $message_arguments));
        $this->logger('pet')->notice('Updated pet %label.', $logger_arguments);
        break;
    }

    $form_state->setRedirect('entity.pet.collection');

    return $result;
  }

}
