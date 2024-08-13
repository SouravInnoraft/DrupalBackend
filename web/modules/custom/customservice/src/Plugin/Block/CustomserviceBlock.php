<?php

namespace Drupal\customservice\Plugin\Block;

use Drupal;
use Drupal\Core\Block\BlockBase;
use Drupal\customservice\Example;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
/**
 * Provides a customservice block.
 *
 * @Block(
 *   id = "customservice_customservice",
 *   admin_label = @Translation("customservice"),
 *   category = @Translation("Custom"),
 * )
 */
class CustomserviceBlock extends BlockBase implements ContainerFactoryPluginInterface {
  protected $conn;

  /**
   * Constructs a Drupalist object.
   *
   * @param array $configuration
   *   A configuration array containing information about the plugin instance.
   * @param string $plugin_id
   *   The plugin_id for the plugin instance.
   * @param mixed $plugin_definition
   *   The plugin implementation definition.
   * @param Drupal\customservice\Example $conn
   *   The Database connection.
   */
  public function __construct(
    array $configuration,
    $plugin_id,$plugin_definition,Example $conn) {
    parent::__construct($configuration, $plugin_id, $plugin_definition);
    $this->conn=$conn;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
    return new static(
      $configuration,
      $plugin_id,
      $plugin_definition,
      $container->get('customservice.Example')
    );
  }

  /**
   * {@inheritdoc}
   */
  public function build(): array {
    $data=$this->conn->getData();
    $content = '';
    foreach ($data as $row) {
      $content .= '<div>';
      $content .= '<span><strong>' . $this->t('@parent_company', ['@parent_company' => $row->parent_company]) . '</strong></span>' . '     ';
      $content .= '<span><strong>' . $this->t('@labelone', ['@labelone' => $row->labelone]) . '</strong></span>' . '     ';
      $content .= '<span>' . $this->t('@valueone', ['@valueone' => $row->valueone]) . '</span>' . '     ';
      $content .= '<span><strong>' . $this->t('@labeltwo', ['@labeltwo' => $row->labeltwo]) . '</strong></span>' . '     ';
      $content .= '<span>' . $this->t('@valuetwo', ['@valuetwo' => $row->valuetwo]) . '</span>';
      $content .= '</div>';
    }

    $build = [
      '#markup' => $content,
      '#cache' => [
        'tags' => ['node'],
      ]
    ];
    return $build;
  }
}
