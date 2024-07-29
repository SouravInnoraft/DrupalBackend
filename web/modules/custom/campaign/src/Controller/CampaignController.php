<?php

namespace Drupal\campaign\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Returns responses for Campaign routes.
 */
class CampaignController extends ControllerBase {

  public function contentStatic() {
    $build = [
      '#markup' => $this->t('<h3>This is the content of MyModule settings page</h3>'),
    ];
    return $build;
  }

  public function contentVariable($count) {
    $build = [
      '#markup' => $this->t('<h3>This is the content of MyModule settings page
       <strong>@count</strong></h3>', ['@count' => $count]),
    ];
    return $build;
  }
}
