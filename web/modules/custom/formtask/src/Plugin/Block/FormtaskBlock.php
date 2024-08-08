<?php

declare(strict_types=1);

namespace Drupal\formtask\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a formtask block.
 *
 * @Block(
 *   id = "formtask_formtask",
 *   admin_label = @Translation("formtask"),
 *   category = @Translation("Custom"),
 * )
 */
final class FormtaskBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build(): array {
    // Fetch data from the database
    $query = \Drupal::database()->select('company_details', 'c')
      ->fields('c', ['parent_company', 'labelone', 'valueone', 'labeltwo', 'valuetwo'])
      ->execute();

    // Prepare data for rendering
    $content = '';
    foreach ($query as $row) {
      $content .= '<div>';
      $content .= '<span><strong>' . $this->t('@parent_company', ['@parent_company' => $row->parent_company]) . '</strong></span>'.'     ';
      $content .= '<span><strong>' . $this->t('@labelone', ['@labelone' => $row->labelone]) . '</strong></span>'.'     ';
      $content .= '<span>' . $this->t('@valueone', ['@valueone' => $row->valueone]) . '</span>'.'     ';
      $content .= '<span><strong>' . $this->t('@labeltwo', ['@labeltwo' => $row->labeltwo]) . '</strong></span>'.'     ';
      $content .= '<span>' . $this->t('@valuetwo', ['@valuetwo' => $row->valuetwo]) . '</span>';
      $content .= '</div>';
    }

    // Return the renderable array
    $build = [
      '#markup' => $content,
      '#cache' => [
        'tags' => ['node'],
      ]
    ];
    return $build;
  }
}
