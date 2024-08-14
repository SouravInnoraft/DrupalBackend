<?php

declare(strict_types=1);

namespace Drupal\customfield\Plugin\Field\FieldWidget;

use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\WidgetBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Defines the 'customfield_rgbcolor' field widget.
 *
 * @FieldWidget(
 *   id = "customfield_rgbcolor",
 *   label = @Translation("rgbcolor"),
 *   field_types = {"customfield_rgbcolor"},
 * )
 */
final class RgbcolorWidget extends WidgetBase {

  /**
   * {@inheritdoc}
   */
  public function formElement(FieldItemListInterface $items, $delta, array $element,
   array &$form, FormStateInterface $form_state): array {
    $element['red'] = [
      '#type' => 'number',
      '#title' => $this->t('Red'),
      '#default_value' => $items[$delta]->red ?? NULL,
    ];
    $element['green'] =  [
      '#type' => 'number',
      '#title' => $this->t('Green'),
      '#default_value' => $items[$delta]->green ?? NULL,
    ];
    $element['blue'] = [
      '#type' => 'number',
      '#title' => $this->t('Blue'),
      '#default_value' => $items[$delta]->blue ?? NULL,
    ];
    return $element;
  }
}
