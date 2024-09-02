<?php

declare(strict_types=1);

namespace Drupal\awards;

use Drupal\Core\Config\Entity\ConfigEntityListBuilder;
use Drupal\Core\Entity\EntityInterface;

/**
 * Provides a listing of awardss.
 */
final class AwardsListBuilder extends ConfigEntityListBuilder {

  /**
   * {@inheritdoc}
   */
  public function buildHeader(): array {
    $header['label'] = $this->t('label');
    $header['id'] = $this->t('Machine name');
    $header['year'] = $this->t('year');
    $header['name']= $this->t('Author');
    $header['description'] = $this->t('description');
    $header['status'] = $this->t('Status');
    return $header + parent::buildHeader();
  }

  /**
   * {@inheritdoc}
   */
  public function buildRow(EntityInterface $entity): array {
    /** @var \Drupal\awards\AwardsInterface $entity */
    $row['label'] = $entity->label();
    $row['id'] = $entity->id();
    $row['year'] = $entity->get('year');
    $row['author'] = $entity->get('name');
    $row['description'] = $entity->get('description');
    $row['status'] = $entity->status() ? $this->t('Enabled') : $this->t('Disabled');
    return $row + parent::buildRow($entity);
  }
}
