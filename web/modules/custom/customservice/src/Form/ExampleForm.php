<?php

namespace Drupal\customservice\Form;

use Drupal\Core\Cache\Cache;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Provides a Customservice form.
 */
class ExampleForm extends FormBase {

  protected $conn;
  /**
   * {@inheritdoc}
   */
  public function getFormId(): string {
    return 'customservice_example';
  }

  /**
   * Class constructor.
   */
  public function __construct($conn) {
    $this->conn = $conn;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('customservice.Example')
    );
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state): array {

    $form['parent_company'] = [
      '#type' => 'textfield',
      '#title' => $this->t('parent company'),
      '#required' => TRUE,
    ];
    $form['labelone'] = [
      '#type' => 'textfield',
      '#title' => $this->t('label 1'),
      '#required' => TRUE,
    ];
    $form['valueone'] = [
      '#type' => 'number',
      '#title' => $this->t('value 1'),
      '#required' => TRUE,
    ];

    $form['labeltwo'] = [
      '#type' => 'textfield',
      '#title' => $this->t('label 2'),
      '#required' => TRUE,
    ];
    $form['valuetwo'] = [
      '#type' => 'number',
      '#title' => $this->t('value 2'),
      '#required' => TRUE,
    ];
    $form['actions'] = [
      '#type' => 'actions',
      'submit' => [
        '#type' => 'submit',
        '#value' => $this->t('Send'),
      ],
    ];
    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state): void {
    // @todo Validate the form here.
    // Example:
    // @code
    //   if (mb_strlen($form_state->getValue('message')) < 10) {
    //     $form_state->setErrorByName(
    //       'message',
    //       $this->t('Message should be at least 10 characters.'),
    //     );
    //   }
    // @endcode
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state): void {
    $this->conn->setData($form_state);
    $this->messenger()->addStatus($this->t('The message has been sent.'));
    Cache::invalidateTags(['node']);
  }
}
