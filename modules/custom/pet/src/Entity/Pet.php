<?php

namespace Drupal\pet\Entity;

use Drupal\Core\Entity\ContentEntityBase;
use Drupal\Core\Entity\EntityStorageInterface;
use Drupal\Core\Entity\EntityTypeInterface;
use Drupal\Core\Field\BaseFieldDefinition;
use Drupal\pet\PetInterface;
use Drupal\user\EntityOwnerTrait;

/**
 * Defines the pet entity class.
 *
 * @ContentEntityType(
 *   id = "pet",
 *   label = @Translation("Pet"),
 *   label_collection = @Translation("Pets"),
 *   label_singular = @Translation("pet"),
 *   label_plural = @Translation("pets"),
 *   label_count = @PluralTranslation(
 *     singular = "@count pets",
 *     plural = "@count pets",
 *   ),
 *   handlers = {
 *     "list_builder" = "Drupal\pet\PetListBuilder",
 *     "views_data" = "Drupal\views\EntityViewsData",
 *     "access" = "Drupal\pet\PetAccessControlHandler",
 *     "form" = {
 *       "add" = "Drupal\pet\Form\PetForm",
 *       "edit" = "Drupal\pet\Form\PetForm",
 *       "delete" = "Drupal\Core\Entity\ContentEntityDeleteForm",
 *     },
 *     "route_provider" = {
 *       "html" = "Drupal\Core\Entity\Routing\AdminHtmlRouteProvider",
 *     }
 *   },
 *   base_table = "pet",
 *   admin_permission = "administer pet",
 *   entity_keys = {
 *     "id" = "id",
 *     "label" = "name",
 *     "uuid" = "uuid",
 *     "owner" = "uid",
 *   },
 *   links = {
 *     "collection" = "/admin/content/pet",
 *     "add-form" = "/pet/add",
 *     "canonical" = "/pet/{pet}",
 *     "edit-form" = "/pet/{pet}/edit",
 *     "delete-form" = "/pet/{pet}/delete",
 *   },
 *   field_ui_base_route = "entity.pet.settings",
 * )
 */
class Pet extends ContentEntityBase implements PetInterface {

  use EntityOwnerTrait;

  /**
   * {@inheritdoc}
   */
  public static function baseFieldDefinitions(EntityTypeInterface $entity_type) {

    $fields = parent::baseFieldDefinitions($entity_type);

    $fields['name'] = BaseFieldDefinition::create('string')
      ->setLabel(t("Name"))
      ->setDescription(t("Pet's Name"))
      ->setRequired(true)
      ->setDisplayOptions('form', [
        'type' => 'string_textfield'
      ])
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayOptions('view', [
        'label' => 'hidden',
        'type' => 'string'
      ])
      ->setDisplayConfigurable('view', TRUE);

    $fields['age'] = BaseFieldDefinition::create('integer')
      ->setLabel(t("Age"))
      ->setDescription(t("Pet's Age"))
      ->setRequired(TRUE)
      ->setDisplayOptions('form', [
        'type' => 'number'
      ])
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayOptions('view', [
        'label' => 'hidden',
        'type' => 'string'
      ])
      ->setDisplayConfigurable('view', TRUE);

    $fields['uid'] = BaseFieldDefinition::create('entity_reference')
      ->setLabel(t('Owner'))
      ->setRequired(true)
      ->setDefaultValueCallback(static::class . '::getDefaultEntityOwner');

    return $fields;
  }

}
