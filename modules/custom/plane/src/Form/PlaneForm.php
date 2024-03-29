<?php

namespace Drupal\plane\Form;

use Drupal\Core\Entity\ContentEntityForm;
use Drupal\Core\Form\FormStateInterface;

/**
 * Form controller for the plane entity edit forms.
 */
class PlaneForm extends ContentEntityForm {

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
        $this->messenger()->addStatus($this->t('New plane %label has been created.', $message_arguments));
        $this->logger('plane')->notice('Created new plane %label', $logger_arguments);
        break;

      case SAVED_UPDATED:
        $this->messenger()->addStatus($this->t('The plane %label has been updated.', $message_arguments));
        $this->logger('plane')->notice('Updated plane %label.', $logger_arguments);
        break;
    }

    $form_state->setRedirect('entity.plane.canonical', ['plane' => $entity->id()]);

    return $result;
  }

}
