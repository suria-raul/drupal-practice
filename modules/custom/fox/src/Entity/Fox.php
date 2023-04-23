<?php

namespace Drupal\fox\Entity;

use Drupal\Core\Entity\ContentEntityBase;
use Drupal\Core\Entity\EntityTypeInterface;
use Drupal\Core\Field\BaseFieldDefinition;
use Drupal\user\EntityOwnerTrait;
use Drupal\fox\FoxInterface;

/**
 * @ContentEntityType(
 *   id = "fox",
 *   label = @Translation("Fox"),
 *   label_collection = @Translation("Foxes"),
 *   handlers = {
 *     "list_builder" = "Drupal\fox\FoxListBuilder",
 *     "views_data" = "Drupal\views\EntityViewsData",
 *     "access" = "Drupal\fox\FoxAccessControlHandler",
 *     "form" = {
 *       "add" = "Drupal\fox\Form\FoxForm",
 *       "edit" = "Drupal\fox\Form\FoxForm",
 *       "delete" = "Drupal\Core\Entity\ContentEntityDeleteForm"
 *     },
 *     "route_provider" = {
 *       "html" = "Drupal\Core\Entity\Routing\AdminHtmlRouteProvider"
 *     }
 *   },
 *   base_table = "fox",
 *   admin_permission = "administer fox",
 *   entity_keys = {
 *     "id" = "id",
 *     "uuid" = "uuid",
 *     "label" = "name",
 *     "owner" = "uid"
 *   },
 *   links = {
 *     "collection" = "/admin/content/foxes",
 *     "canonical" = "/fox/{fox}",
 *     "add-form" = "/fox/add",
 *     "edit-form" = "/fox/{fox}/edit",
 *     "delete-form" = "/fox/{fox}/delete"
 *   },
 *   field_ui_base_route = "entity.fox.settings"
 * )
 */
class Fox extends ContentEntityBase implements FoxInterface {

  use EntityOwnerTrait;

  public static function baseFieldDefinitions(EntityTypeInterface $entity_type) {
    $fields = parent::baseFieldDefinitions($entity_type);

    $fields['name'] = BaseFieldDefinition::create('string')
      ->setLabel(t("Name"))
      ->setDescription(t("The fox name"))
      ->setRequired(TRUE)
      ->setDisplayOptions('form', [
        'type' => 'string_textfield',
      ])
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayOptions('view', [
        'label' => 'hidden',
        'type' => 'string',
      ])
      ->setDisplayConfigurable('view', TRUE);

    $fields['age'] = BaseFieldDefinition::create('string')
      ->setLabel(t("Age"))
      ->setDescription(t("The age of the fox"))
      ->setRequired(TRUE)
      ->setDisplayOptions('form', [
        'type' => 'integer',
      ])
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayOptions('view', [
        'label' => 'above',
        'type' => 'string'
      ])
      ->setDisplayConfigurable('view', TRUE);

    $fields['uid'] = BaseFieldDefinition::create('entity_reference')
      ->setSetting('target_type', 'user')
      ->setDefaultValueCallback(static::class . '::getDefaultEntityOwner');

    return $fields;
  }
}
