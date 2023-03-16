<?php

namespace Drupal\dog;

use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\Core\Entity\EntityChangedInterface;
use Drupal\user\EntityOwnerInterface;

/**
 * Provides an interface defining a dog entity type.
 */
interface DogInterface extends ContentEntityInterface, EntityOwnerInterface, EntityChangedInterface {

}
