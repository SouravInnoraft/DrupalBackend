<?php

namespace Drupal\customblock\Controller;

use Drupal\Core\Controller\ControllerBase;

class CustomController extends ControllerBase {

  public function content() {
    return [
      '#markup' => '<h1>Welcome to the Custom Welcome Page!</h1>',
    ];
  }
}
