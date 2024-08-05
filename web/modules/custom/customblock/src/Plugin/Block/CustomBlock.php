<?php

declare(strict_types=1);

namespace Drupal\customblock\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a customblock block.
 *
 * @Block(
 *   id = "customblock_customblock",
 *   admin_label = @Translation("customblock"),
 *   category = @Translation("Custom"),
 * )
 */
class CustomBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    $current_user = \Drupal::currentUser();
    $name = $current_user->getDisplayName();
    // $role = !empty($roles) ? reset($roles) : 'Guest';

    return [
      '#markup' => $this->t('Welcome @name', ['@name' => $name]),
    ];
  }
}
