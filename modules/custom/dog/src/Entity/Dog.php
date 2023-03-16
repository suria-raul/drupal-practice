<?php

namespace Drupal\dog\Entity;

use Drupal\Core\Entity\ContentEntityBase;
use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\Core\Entity\EntityTypeInterface;
use Drupal\Core\Field\BaseFieldDefinition;

/**
 * @ContentEntityType(
 *   id = "dog",
 *   label = @Translation("Dog"),
 *   label_collection = @Translation("Dogs"),
 *   handlers = {
 *     "list_builder" = "Drupal\dog\DogListBuilder",
 *     "view_builder" = "Drupal\Core\Entity\EntityViewBuilder",
 *     "views_data" = "Drupal\views\EntityViewsData",
 *     "form" = {
 *       "add" = "Drupal\dog\Form\DogForm",
 *       "edit" = "Drupal\dog\Form\DogForm",
 *       "delete" = "Drupal\Core\Entity\ContentEntityDeleteForm",
 *     },
 *     "route_provider" = "Drupal\Core\Entity\Routing\AdminHtmlRouteProvider",
 *     "access" = "Drupal\dog\DogAccessControlHandler",
 *   },
 *   base_table = "dog",
 *   admin_permission = "administer dog",
 *   entity_keys = {
 *     "id" = "id",
 *     "uuid" = "uuid",
 *     "label" = "name",
 *   },
 *   links = {
 *     "collection" = "/admin/content/dogs",
 *     "add-form" = "/dog/add",
 *     "canonical" = "/dog/{dog}",
 *     "edit-form" = "/dog/{dog}/edit",
 *     "delete-form" = "/dog/{dog}/edit",
 *   },
 *   field_ui_base_route = "entity.dog.settings",
 * )
 */
class Dog extends ContentEntityBase implements ContentEntityInterface {

  public static function baseFieldDefinitions(EntityTypeInterface $entity_type) {
    $fields = parent::baseFieldDefinitions($entity_type);

    $fields['name'] = BaseFieldDefinition::create('string')
      ->setLabel(t("Name"))
      ->setDescription(t("The name of your dog"))
      ->setRequired(true)
      ->setDisplayOptions('form', [
        'type' => 'text_long',
        'weight' => 6,
      ])
      ->setDisplayConfigurable('form', true)
      ->setDisplayOptions('view', [
        'type' => 'string',
        'label' => 'hidden'
      ])
      ->setDisplayConfigurable('view', true);

    return $fields;
  }

}
