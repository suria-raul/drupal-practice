<?php

namespace Drupal\plane\Entity;

use Drupal\Core\Entity\ContentEntityBase;
use Drupal\Core\Entity\EntityTypeInterface;
use Drupal\Core\Field\BaseFieldDefinition;
use Drupal\plane\PlaneInterface;
use Drupal\user\EntityOwnerTrait;

/**
 * Defines the plane entity class.
 *
 * @ContentEntityType(
 *   id = "plane",
 *   label = @Translation("Plane"),
 *   label_collection = @Translation("Planes"),
 *   label_singular = @Translation("plane"),
 *   label_plural = @Translation("planes"),
 *   label_count = @PluralTranslation(
 *     singular = "@count planes",
 *     plural = "@count planes",
 *   ),
 *   handlers = {
 *     "list_builder" = "Drupal\plane\PlaneListBuilder",
 *     "views_data" = "Drupal\views\EntityViewsData",
 *     "access" = "Drupal\plane\PlaneAccessControlHandler",
 *     "form" = {
 *       "add" = "Drupal\plane\Form\PlaneForm",
 *       "edit" = "Drupal\plane\Form\PlaneForm",
 *       "delete" = "Drupal\Core\Entity\ContentEntityDeleteForm",
 *     },
 *     "route_provider" = {
 *       "html" = "Drupal\Core\Entity\Routing\AdminHtmlRouteProvider",
 *     }
 *   },
 *   base_table = "plane",
 *   admin_permission = "administer plane",
 *   entity_keys = {
 *     "id" = "id",
 *     "label" = "model",
 *     "uuid" = "uuid",
 *     "owner" = "uid",
 *   },
 *   links = {
 *     "collection" = "/admin/content/plane",
 *     "add-form" = "/plane/add",
 *     "canonical" = "/plane/{plane}",
 *     "edit-form" = "/plane/{plane}/edit",
 *     "delete-form" = "/plane/{plane}/delete",
 *   },
 *   field_ui_base_route = "entity.plane.settings",
 * )
 */
class Plane extends ContentEntityBase implements PlaneInterface {

  use EntityOwnerTrait;

  /**
   * {@inheritdoc}
   */
  public static function baseFieldDefinitions(EntityTypeInterface $entity_type) {

    $fields = parent::baseFieldDefinitions($entity_type);

    $fields['model'] = BaseFieldDefinition::create('string')
      ->setLabel(t('Model'))
      ->setRequired(TRUE)
      ->setSetting('max_length', 255)
      ->setDisplayOptions('form', [
        'type' => 'string_textfield',
        'weight' => -5,
      ])
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayOptions('view', [
        'label' => 'hidden',
        'type' => 'string',
        'weight' => -5,
      ])
      ->setDisplayConfigurable('view', TRUE)
      ->setDescription(t('The Aircraft Model'));

    $fields['uid'] = BaseFieldDefinition::create('entity_reference')
      ->setLabel(t('Author'))
      ->setSetting('target_type', 'user')
      ->setDefaultValueCallback(static::class . '::getDefaultEntityOwner');

    return $fields;
  }

}
