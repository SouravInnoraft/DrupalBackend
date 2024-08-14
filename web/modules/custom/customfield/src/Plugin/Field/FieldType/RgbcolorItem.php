<?php

declare(strict_types=1);

namespace Drupal\customfield\Plugin\Field\FieldType;

use Drupal\Component\Utility\Random;
use Drupal\Core\Field\FieldDefinitionInterface;
use Drupal\Core\Field\FieldItemBase;
use Drupal\Core\Field\FieldStorageDefinitionInterface;
use Drupal\Core\TypedData\DataDefinition;

/**
 * Defines the 'customfield_rgbcolor' field type.
 *
 * @FieldType(
 *   id = "customfield_rgbcolor",
 *   label = @Translation("rgbcolor"),
 *   description = @Translation("Some description."),
 *   default_widget = "customfield_colorpicker",
 *   default_formatter = "customfield_rgbcolor",
 * )
 */
final class RgbcolorItem extends FieldItemBase {

  /**
   * {@inheritdoc}
   */
  public static function propertyDefinitions(FieldStorageDefinitionInterface $field_definition): array {
    $properties['red'] = DataDefinition::create('integer')
      ->setLabel(t('Red value'))
      ->setRequired(TRUE);

    $properties['green'] = DataDefinition::create('integer')
      ->setLabel(t('Green value'))
      ->setRequired(TRUE);

    $properties['blue'] = DataDefinition::create('integer')
      ->setLabel(t('Blue value'))
      ->setRequired(TRUE);
    return $properties;
  }

  /**
   * {@inheritdoc}
   */
  public static function schema(FieldStorageDefinitionInterface $field_definition): array {

    $columns = [
      'red' => [
        'type' => 'int',
        'not null' => FALSE,
        'description' => 'Red color.',
        'min' => 0,
        'max' => 255
      ],
      'green' => [
        'type' => 'int',
        'not null' => FALSE,
        'description' => 'Green color.',
        'min' => 0,
        'max' => 255
      ],
      'blue' => [
        'type' => 'int',
        'not null' => FALSE,
        'description' => 'Blue color.',
        'min' => 0,
        'max' => 255
      ],
    ];

    $schema = [
      'columns' => $columns,
    ];

    return $schema;
  }

  /**
   * {@inheritdoc}
   */
  public static function generateSampleValue(FieldDefinitionInterface $field_definition): array {
    $values['red'] = mt_rand(0, 255);
    $values['green'] = mt_rand(0, 255);
    $values['blue'] = mt_rand(0, 255);
    return $values;
  }
}
