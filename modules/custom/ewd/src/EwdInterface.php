<?php

namespace Drupal\ewd;

use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\Core\Entity\EntityChangedInterface;
use Drupal\user\EntityOwnerInterface;

/**
 * Provides an interface defining an ewd entity type.
 */
interface EwdInterface extends ContentEntityInterface, EntityOwnerInterface, EntityChangedInterface {

}
