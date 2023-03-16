<?php

namespace Drupal\ewd\Form;

use Drupal\Core\Entity\ContentEntityForm;
use Drupal\Core\Form\FormStateInterface;

/**
 * Form controller for the ewd entity edit forms.
 */
class EwdForm extends ContentEntityForm {

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
        $this->messenger()->addStatus($this->t('New ewd %label has been created.', $message_arguments));
        $this->logger('ewd')->notice('Created new ewd %label', $logger_arguments);
        break;

      case SAVED_UPDATED:
        $this->messenger()->addStatus($this->t('The ewd %label has been updated.', $message_arguments));
        $this->logger('ewd')->notice('Updated ewd %label.', $logger_arguments);
        break;
    }

    $form_state->setRedirect('entity.ewd.canonical', ['ewd' => $entity->id()]);

    return $result;
  }

}
