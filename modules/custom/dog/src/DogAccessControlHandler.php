<?php

namespace Drupal\dog;

use Drupal\Core\Entity\EntityAccessControlHandler;
use Drupal\Core\Access\AccessResult;
use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Session\AccountInterface;

class DogAccessControlHandler extends EntityAccessControlHandler {

  protected function checkAccess(EntityInterface $entity, $operation, AccountInterface $account) {
    switch ($operation) {
      case 'view':
        return AccessResult::allowedIfHasPermission($account, 'view dog');

      case 'update':
        return AccessResult::allowedIfHasPermissions($account, ['edit dog', 'administer dog'], 'OR');

      case 'delete':
        return AccessResult::allowedIfHasPermissions($account, ['delete dog', 'administer dog'], 'OR');

      default:
        return AccessResult::neutral();
    }
  }

  protected function checkCreateAccess(AccountInterface $account, array $context, $entity_bundle = NULL) {
    return AccessResult::allowedIfHasPermission($account, 'create dog');
  }

}
