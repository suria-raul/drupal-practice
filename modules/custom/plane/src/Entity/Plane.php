<?php

namespace Drupal\plane\Entity;

use Drupal\Core\Entity\ContentEntityBase;
use Drupal\Core\Entity\EntityTypeInterface;
use Drupal\Core\Field\BaseFieldDefinition;
use Drupal\plane\PlaneInterface;
use Drupal\user\EntityOwnerTrait;

/**
 * @ContentEntityType(
 *   id = "plane",
 *   label = @Translation("Plane"),
 *   label_collection = @Translation("Planes"),
 *   handlers = {
 *    "list_builder" = "Drupal\plane\PlaneListBuilder",
 *    "views_data" = "Drupal\views\EntityViewsData",
 *    "access" = "Drupal\plane\PlaneAccessControlHandler",
 *    "form" = {
 *      "add" = "Drupal\plane\Form\PlaneForm",
 *      "edit" = "Drupal\plane\Form\PlaneForm",
 *      "delete" = "Drupal\Core\Entity\ContentEntityDeleteForm",
 *    },
 *    route_provider = {
 *      "html" = "Drupal\Core\Entity\Routing\AdminHtmlRouteProvider",
 *    },
 *   },
 *   base_table = "plane",
 *   admin_permission = "administer plane",
 *   entity_keys = {
 *    "id" = "id",
 *    "uuid" = "uuid",
 *    "label" = "model",
 *    "owner" = "uid",
 *   },
 *   links = {
 *    "canonical" = "/plane/{plane}",
 *    "collection" = "/admin/content/planes",
 *    "add-form" = "/plane/add",
 *    "edit-form" = "/plane/{plane}/edit",
 *    "delete-form" = "/plane/{plane}/delete",
 *   },
 *   field_ui_base_route = "entity.plane.settings",
 * )
 */
class Plane extends ContentEntityBase implements PlaneInterface {

  use EntityOwnerTrait;

  public static function baseFieldDefinitions(EntityTypeInterface $entity_type)
  {
    $fields = parent::baseFieldDefinitions($entity_type);

    $fields['model'] = BaseFieldDefinition::create('string')
      ->setLabel(t("Model"))
      ->setDescription(t("The Model of the aircraft"))
      ->setRequired(TRUE);

    $fields['uid'] = BaseFieldDefinition::create('entity_reference')
      ->setLabel(t("Author"))
      ->setSetting('target_type', 'user')
      ->setDefaultValueCallback(static::class . '::getDefaultEntityOwner');

    return $fields;
  }
}
