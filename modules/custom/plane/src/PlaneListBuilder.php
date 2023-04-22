<?php

namespace Drupal\plane;

use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Entity\EntityListBuilder;

/**
 * Provides a list controller for the plane entity type.
 */
class PlaneListBuilder extends EntityListBuilder {

  /**
   * {@inheritdoc}
   */
  public function buildHeader() {
    $header['id'] = $this->t('ID');
    $header['label'] = $this->t('Label');
    return $header + parent::buildHeader();
  }

  /**
   * {@inheritdoc}
   */
  public function buildRow(EntityInterface $entity) {
    /** @var \Drupal\plane\PlaneInterface $entity */
    $row['id'] = $entity->id();
    $row['label'] = $entity->toLink();
    return $row + parent::buildRow($entity);
  }

}
