<?php

declare(strict_types=1);

namespace Drupal\customfield\Plugin\Field\FieldFormatter;

use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\FormatterBase;

/**
 * Plugin implementation of the 'rgbcolor' formatter.
 *
 * @FieldFormatter(
 *   id = "customfield_rgbcolor",
 *   label = @Translation("rgbcolor"),
 *   field_types = {"customfield_rgbcolor"},
 * )
 */
final class RgbcolorFormatter extends FormatterBase {

  /**
   * {@inheritdoc}
   */
  public function viewElements(FieldItemListInterface $items, $langcode): array {
    $element = [];

    foreach ($items as $delta => $item) {
      // Get the RGB values
      $r = $item->red ?? 0;
      $g = $item->green ?? 0;
      $b = $item->blue ?? 0;

      // Create the RGB string
      $rgb_value = "rgb($r, $g, $b)";

      // Render the color box
      $element[$delta] = [
        '#markup' => t('<div
        style="height:500px;width:500px; background-color:@rgb_value;">
        @Helloworld</div>', ['@rgb_value' => $rgb_value
      ,'@Helloworld'=>'Hello world']),
      ];
    }
    return $element;
  }
}
