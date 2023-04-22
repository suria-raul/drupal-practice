<?php

namespace Drupal\plane;

use Drupal\Core\Entity\EntityListBuilder;
use Drupal\Core\Entity\EntityInterface;

class PlaneListBuilder extends EntityListBuilder {

  public function buildHeader() {
    $header['model'] = $this->t('Model');
    return $header + parent::buildHeader();
  }

  public function buildRow(EntityInterface $entity) {
    $row['model'] = $entity->toLink();
    return $row + parent::buildRow($entity);
  }

}
