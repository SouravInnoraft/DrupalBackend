<?php

declare(strict_types=1);

namespace Drupal\awards\Entity;

use Drupal\awards\AwardsInterface;
use Drupal\Core\Config\Entity\ConfigEntityBase;

/**
 * Defines the awards entity type.
 *
 * @ConfigEntityType(
 *   id = "awards",
 *   label = @Translation("Awards"),
 *   label_collection = @Translation("Awardss"),
 *   label_singular = @Translation("awards"),
 *   label_plural = @Translation("awardss"),
 *   label_count = @PluralTranslation(
 *     singular = "@count awards",
 *     plural = "@count awardss",
 *   ),
 *   handlers = {
 *     "list_builder" = "Drupal\awards\AwardsListBuilder",
 *     "form" = {
 *       "add" = "Drupal\awards\Form\AwardsForm",
 *       "edit" = "Drupal\awards\Form\AwardsForm",
 *       "delete" = "Drupal\Core\Entity\EntityDeleteForm",
 *     },
 *   },
 *   config_prefix = "awards",
 *   admin_permission = "administer awards",
 *   links = {
 *     "collection" = "/admin/structure/awards",
 *     "add-form" = "/admin/structure/awards/add",
 *     "edit-form" = "/admin/structure/awards/{awards}",
 *     "delete-form" = "/admin/structure/awards/{awards}/delete",
 *   },
 *   entity_keys = {
 *     "id" = "id",
 *     "label" = "label",
 *     "uuid" = "uuid",
 *     "name"="name",
 *     "year"="year",
 *     "description"="description"
 *   },
 *   config_export = {
 *     "id",
 *     "label",
 *     "name",
 *     "year",
 *     "description",
 *   },
 * )
 */
final class Awards extends ConfigEntityBase implements AwardsInterface {

  /**
   * The example ID.
   */
  protected string $id;

  /**
   * The example label.
   */
  protected string $label;

  /**
   * The example name.
   */
   protected string $name;

  /**
   * The example year.
   */
  protected int $year;

  /**
   * The example description.
   */
  protected string $description;
}
