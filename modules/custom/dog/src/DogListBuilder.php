<?php

namespace Drupal\dog;

use Drupal\Core\Entity\EntityListBuilder;
use Drupal\Core\Entity\EntityInterface;

class DogListBuilder extends EntityListBuilder {
  public function buildHeader() {
    $header['id']  = $this->t("ID");
    $header['label'] = $this->t("Name");
    return $header + parent::buildHeader();
  }

  public function buildRow(EntityInterface $entity) {
    $row['id'] = $entity->id();
    $row['label'] = $entity->toLink();
    return $row + parent::buildRow($entity);
  }
}
