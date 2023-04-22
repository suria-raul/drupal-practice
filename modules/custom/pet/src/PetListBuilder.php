<?php

namespace Drupal\pet;

use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Entity\EntityListBuilder;

class PetListBuilder extends EntityListBuilder {

  public function buildHeader() {
    $header['id'] = $this->t("ID");
    $header['label'] = $this->t("Name");
    return $header + parent::buildHeader();
  }

  public function buildRow(EntityInterface $entity) {
    $row['id'] = $entity->id();
    $row['label'] = $entity->toLink();
    return $row + parent::buildRow($entity);
  }
}
