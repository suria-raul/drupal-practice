<?php

namespace Drupal\pet\Entity;

use Drupal\Core\Entity\ContentEntityBase;
use Drupal\Core\Entity\EntityTypeInterface;
use Drupal\Core\Field\BaseFieldDefinition;
use Drupal\user\EntityOwnerTrait;
use Drupal\pet\PetInterface;

/**
 * @ContentEntityType(
 *   id = "pet",
 *   label = @Translation("Pet"),
 *   label_colletion = @Translation("Pets"),
 *   handlers = {
 *    "list_builder" = "Drupal\pet\PetListBuilder",
 *    "views_data" = "Drupal\views\EntityViewsData",
 *    "access" = "Drupal\pet\PetAccessControlHandler",
 *    "form" = {
 *      "add" = "Drupal\pet\Form\PetForm",
 *      "edit" = "Drupal\pet\Form\PetForm",
 *      "delete" = "Drupal\Core\Entity\ContentEntityDeleteForm",
 *    },
 *    "route_provider" = {
 *       "html" = "Drupal\Core\Entity\Routing\AdminHtmlRouteProvider",
 *     }
 *   },
 *   base_table = "pet",
 *   administer_permission = "administer pet",
 *   entity_keys = {
 *     "id" = "id",
 *     "uuid" = "uuid",
 *     "label" = "name",
 *     "owner" = "uid"
 *   },
 *   links = {
 *     "canonical" = "/pet/{pet}",
 *     "collection" = "/admin/content/pets",
 *     "add-form" = "/pet/add",
 *     "edit-form" = "/pet/{pet}/edit",
 *     "delete-form" = /pet/{pet}/delete""
 *   },
 *   field_ui_base_route = "entity.pet.settings"
 * )
 */
class Pet extends ContentEntityBase implements PetInterface {

  use EntityOwnerTrait;

  public static function baseFieldDefinitions(EntityTypeInterface $entity_type) {
    $fields = parent::baseFieldDefinitions($entity_type);

    $fields['name'] = BaseFieldDefinition::create('string')
      ->setLabel(t("Name"))
      ->setDescription(t("The name of your pet"))
      ->setRequired(true)
      ->setDisplayOptions('form', [
        'type' => 'string_textfield'
      ])
      ->setDisplayConfigurable('form', true)
      ->setDisplayOptions('view', [
        'label' => 'hidden',
        'type' => 'string'
      ])
      ->setDisplayConfigurable('view', true);

    $fields['age'] = BaseFieldDefinition::create('integer')
      ->setLabel(t("Age"))
      ->setDescription(t("The age of your pet"))
      ->setRequired(true)
      ->setDisplayOptions('form', [
        'type' => 'number'
      ])
      ->setDisplayConfigurable('form', true)
      ->setDisplayOptions('view', [
        'label' => 'hidden',
        'type' => 'string'
      ])
      ->setDisplayConfigurable('view', true);

    $fields['uid'] = BaseFieldDefinition::create('entity_reference')
      ->setLabel(t('Owner'))
      ->setRequired(true)
      ->setDefaultValueCallback(static::class . '::getDefaultEntityOwner');

    return $fields;
  }
}
