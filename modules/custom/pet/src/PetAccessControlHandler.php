<?php

namespace Drupal\pet;

use Drupal\Core\Entity\EntityAccessControlHandler;
use Drupal\Core\Access\AccessResult;
use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Session\AccountInterface;

class PetAccessControlHandler extends EntityAccessControlHandler {

  protected function checkAccess(EntityInterface $entity, $operation, AccountInterface $account) {

    switch ($operation) {
      case 'view':
        return AccessResult::allowedIfHasPermission($account, 'view pet');

      case 'update':
        return AccessResult::allowedIfHasPermissions($account, ['edit pet', 'administer pet', 'OR']);

      case 'delete':
        return AccessResult::allowedIfHasPermissions($account, ['delete pet', 'administer pet'], 'OR');

      default:
        return AccessResult::neutral();
    }

  }

  protected function checkCreateAccess(AccountInterface $account, array $context, $entity_bundle = NULL) {
    return AccessResult::allowedIfHasPermissions($account, ['create pet', 'administer pet'], 'OR');
  }
}
