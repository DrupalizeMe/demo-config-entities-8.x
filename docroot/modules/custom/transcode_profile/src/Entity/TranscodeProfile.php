<?php

namespace Drupal\transcode_profile\Entity;

use Drupal\Core\Config\Entity\ConfigEntityBase;

/**
 * Defines the Transcode profile entity.
 *
 * @ConfigEntityType(
 *   id = "transcode_profile",
 *   label = @Translation("Transcode profile"),
 *   handlers = {
 *     "list_builder" = "Drupal\transcode_profile\TranscodeProfileListBuilder",
 *     "form" = {
 *       "add" = "Drupal\transcode_profile\Form\TranscodeProfileForm",
 *       "edit" = "Drupal\transcode_profile\Form\TranscodeProfileForm",
 *       "delete" = "Drupal\transcode_profile\Form\TranscodeProfileDeleteForm"
 *     },
 *     "route_provider" = {
 *       "html" = "Drupal\transcode_profile\TranscodeProfileHtmlRouteProvider",
 *     },
 *   },
 *   config_prefix = "transcode_profile",
 *   admin_permission = "administer site configuration",
 *   entity_keys = {
 *     "id" = "id",
 *     "label" = "label",
 *     "uuid" = "uuid"
 *   },
 *   links = {
 *     "canonical" = "/admin/structure/transcode_profile/{transcode_profile}",
 *     "add-form" = "/admin/structure/transcode_profile/add",
 *     "edit-form" = "/admin/structure/transcode_profile/{transcode_profile}/edit",
 *     "delete-form" = "/admin/structure/transcode_profile/{transcode_profile}/delete",
 *     "collection" = "/admin/structure/transcode_profile"
 *   }
 * )
 */
class TranscodeProfile extends ConfigEntityBase implements TranscodeProfileInterface {

  /**
   * The Transcode profile ID.
   *
   * @var string
   */
  protected $id;

  /**
   * The Transcode profile label.
   *
   * @var string
   */
  protected $label;
  
  /**
   * Codec
   *
   * @var string
   */
  protected $codec;
  
  public function getCodec() {
    return $this->codec;
  }
  
}
