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
        return AccessResult::allowedIf($this->isAllowed($entity, $account, ['view plane', 'administer plane']));

      case 'update':
        return AccessResult::allowedIf($this->isAllowed($entity, $account, ['update plane', 'administer plane']));

      case 'delete':
        return AccessResult::allowedIf($this->isAllowed($entity, $account, ['delete plane', 'administer plane']));

      default:
        return AccessResult::neutral();
    }

  }

  protected function checkCreateAccess(AccountInterface $account, array $context, $entity_bundle = NULL) {
   return AccessResult::allowedIfHasPermissions($account, ['create plane', 'administer plane'], 'OR');
  }

  protected function isAllowed(EntityInterface $entity, AccountInterface $account, array $permission) {
    $isPermitted = AccessResult::allowedIfHasPermissions($account, $permission, 'OR');
    $isAdminOrOwner = $entity->getOwnerId() == $account->id() || $this->isAdmin();
    return $isPermitted && $isAdminOrOwner;
  }

  protected function isAdmin() {
    return \Drupal::currentUser()->id() == 1;
  }
}
