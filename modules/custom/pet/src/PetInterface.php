<?php

namespace Drupal\pet;

use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\user\EntityOwnerInterface;

interface PetInterface extends ContentEntityInterface, EntityOwnerInterface {

}
