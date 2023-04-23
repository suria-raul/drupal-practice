<?php

namespace Drupal\fox;

use Drupal\Core\Entity\EntityAccessControlHandler;
use Drupal\Core\Access\AccessResult;
use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Session\AccountInterface;

class FoxAccessControlHandler extends EntityAccessControlHandler {

  protected function checkAccess(EntityInterface $entity, $operation, AccountInterface $account) {

    switch ($operation) {
      case 'view':
        return AccessResult::allowedIfHasPermissions($account, ['view fox', 'administer fox'], 'OR');

      case 'update':
        return AccessResult::allowedIfHasPermissions($account, ['edit fox', 'administer fox'], 'OR');

      case 'delete':
        return AccessResult::allowedIfHasPermissions($account, ['delete fox', 'administer fox'], 'OR');

      default:
        return AccessResult::neutral();
    }

  }

  protected function checkCreateAccess(AccountInterface $account, array $context, $entity_bundle = NULL) {
    return AccessResult::allowedIfHasPermissions($account, ['create fox', 'administer fox'], 'OR');
  }
}
