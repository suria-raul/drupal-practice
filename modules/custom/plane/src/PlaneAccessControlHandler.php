<?php

namespace Drupal\plane;

use Drupal\Core\Entity\EntityAccessControlHandler;
use Drupal\Core\Access\AccessResult;
use Drupal\Core\Session\AccountInterface;
use Drupal\Core\Entity\EntityInterface;

class PlaneAccessControlHandler extends EntityAccessControlHandler {

  protected function checkAccess(EntityInterface $entity, $operation, AccountInterface $account) {

    switch ($operation) {
      case 'view':
        return AccessResult::allowedIfHasPermissions($account, ['view plane', 'administer plane']);

      case 'update':
        return AccessResult::allowedIfHasPermissions($account, ['edit plane', 'administer plane'], 'OR');

      case 'delete':
        return AccessResult::allowedIfHasPermissions($account, ['delete plane', 'administer plane'], 'OR');

      default:
        return AccessResult::neutral();
    }

  }

  protected function checkCreateAccess(AccountInterface $account, array $context, $entity_bundle = NULL) {
   return AccessResult::allowedIfHasPermissions($account, ['create plane', 'administer plane'], 'OR');
  }
}
