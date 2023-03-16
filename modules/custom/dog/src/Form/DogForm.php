<?php

namespace Drupal\dog\Form;

use Drupal\Core\Entity\ContentEntityForm;
use Drupal\Core\Form\FormStateInterface;

/**
 * Form controller for the dog entity edit forms.
 */
class DogForm extends ContentEntityForm {

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
        $this->messenger()->addStatus($this->t('New dog %label has been created.', $message_arguments));
        $this->logger('dog')->notice('Created new dog %label', $logger_arguments);
        break;

      case SAVED_UPDATED:
        $this->messenger()->addStatus($this->t('The dog %label has been updated.', $message_arguments));
        $this->logger('dog')->notice('Updated dog %label.', $logger_arguments);
        break;
    }

    $form_state->setRedirect('entity.dog.canonical', ['dog' => $entity->id()]);

    return $result;
  }

}
