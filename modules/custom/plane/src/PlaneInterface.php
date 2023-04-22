<?php

namespace Drupal\plane;

use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\user\EntityOwnerInterface;

/**
 * Provides an interface defining a plane entity type.
 */
interface PlaneInterface extends ContentEntityInterface, EntityOwnerInterface {

}
