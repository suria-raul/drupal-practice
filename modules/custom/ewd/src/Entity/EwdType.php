<?php

namespace Drupal\ewd\Entity;

use Drupal\Core\Config\Entity\ConfigEntityBundleBase;

/**
 * Defines the Ewd type configuration entity.
 *
 * @ConfigEntityType(
 *   id = "ewd_type",
 *   label = @Translation("Ewd type"),
 *   label_collection = @Translation("Ewd types"),
 *   label_singular = @Translation("ewd type"),
 *   label_plural = @Translation("ewds types"),
 *   label_count = @PluralTranslation(
 *     singular = "@count ewds type",
 *     plural = "@count ewds types",
 *   ),
 *   handlers = {
 *     "form" = {
 *       "add" = "Drupal\ewd\Form\EwdTypeForm",
 *       "edit" = "Drupal\ewd\Form\EwdTypeForm",
 *       "delete" = "Drupal\Core\Entity\EntityDeleteForm",
 *     },
 *     "list_builder" = "Drupal\ewd\EwdTypeListBuilder",
 *     "route_provider" = {
 *       "html" = "Drupal\Core\Entity\Routing\AdminHtmlRouteProvider",
 *     }
 *   },
 *   admin_permission = "administer ewd types",
 *   bundle_of = "ewd",
 *   config_prefix = "ewd_type",
 *   entity_keys = {
 *     "id" = "id",
 *     "label" = "label",
 *     "uuid" = "uuid"
 *   },
 *   links = {
 *     "add-form" = "/admin/structure/ewd_types/add",
 *     "edit-form" = "/admin/structure/ewd_types/manage/{ewd_type}",
 *     "delete-form" = "/admin/structure/ewd_types/manage/{ewd_type}/delete",
 *     "collection" = "/admin/structure/ewd_types"
 *   },
 *   config_export = {
 *     "id",
 *     "label",
 *     "uuid",
 *   }
 * )
 */
class EwdType extends ConfigEntityBundleBase {

  /**
   * The machine name of this ewd type.
   *
   * @var string
   */
  protected $id;

  /**
   * The human-readable name of the ewd type.
   *
   * @var string
   */
  protected $label;

}
