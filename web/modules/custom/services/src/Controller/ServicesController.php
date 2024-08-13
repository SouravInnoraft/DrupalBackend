<?php

declare(strict_types=1);

namespace Drupal\services\Controller;

use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Returns responses for Services routes.
 */
final class ServicesController extends ControllerBase {

  protected $demoService;

  /**
   * Class constructor.
   */
  public function __construct($demoService) {
    $this->demoService = $demoService;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('services.example')
    );
  }

  /**
   * Generates an example page.
   */
  public function demo() {
    return [
      '#markup' => t('Hello @value!', array('@value' => $this->demoService->getDemoValue())),
    ];
  }
}
