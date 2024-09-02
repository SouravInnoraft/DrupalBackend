<?php

declare(strict_types=1);

namespace Drupal\movie\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Configure movie settings for this site.
 */
final class SettingsForm extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId(): string {
    return 'movie_settings';
  }

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames(): array {
    return ['movie.settings'];
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state): array {
    $config = $this->config('movie.settings');

    $form['budget_amount'] = [
      '#type' => 'number',
      '#title' => $this->t('Budget Amount'),
      '#default_value' => $config->get('budget_amount'),
      '#min' => 0,
      '#step' => 1.0,
      '#description' => $this->t('Enter the budget-friendly amount for movies.'),
    ];

    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state): void {
    // @todo Validate the form here.
    // Example:
    // @code
    //   if ($form_state->getValue('example') === 'wrong') {
    //     $form_state->setErrorByName(
    //       'message',
    //       $this->t('The value is not correct.'),
    //     );
    //   }
    // @endcode
    parent::validateForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state): void {
    $this->config('movie.settings')
      ->set('budget_amount', $form_state->getValue('budget_amount'))
      ->save();
    parent::submitForm($form, $form_state);
  }

}
