<?php

declare(strict_types=1);

namespace Drupal\formtask\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Returns responses for formtask routes.
 */
final class FormtaskController extends ControllerBase {

  public function content(){
    return [
      '#markup' => '<h1>Welcome to the block view page</h1>',
    ];
  }
}
