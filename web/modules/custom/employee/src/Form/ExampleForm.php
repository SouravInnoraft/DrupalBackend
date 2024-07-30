<?php

declare(strict_types=1);

namespace Drupal\employee\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Provides a Employee form.
 */
final class ExampleForm extends FormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId(): string {
    return 'employee_example';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state): array {

    $form['emp_fullname'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Full Name'),
      '#required' => TRUE,
      '#maxLength' => 50,
    ];

    $form['emp_number'] = [
      '#type' => 'tel',
      '#title' => $this->t('Phone Number'),
      '#required' => TRUE,
    ];

    $form['emp_email'] = [
      '#type' => 'email',
      '#title' => $this->t('Email Address'),
      '#required' => TRUE,
      '#maxLength' => 30,
    ];

    $form['emp_gender'] = [
      '#type' => 'radios',
      '#title' => $this->t('Select Gender'),
      '#options' => [
        'male' => $this->t('Male'),
        'female' => $this->t('Female'),
        'other'=>$this->t('Other'),
      ],
    ];

    $form['actions'] = [
      '#type' => 'actions',
      'submit' => [
        '#type' => 'submit',
        '#value' => $this->t('submit'),
      ],
    ];
    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state): void {
    $formField=$form_state->getValues();
    $empName= trim($formField['emp_fullname']);
    $empNumber=trim($formField['emp_number']);
    $empEmail=trim($formField['emp_email']);

    if (!preg_match("/^([a-zA-Z]+)$/", $empName)) {
      $form_state->setErrorByName('emp_fullname',
      $this->t('Enter the valid first name'));
    }

    if (!preg_match("/^(?:\+91|91|0)?[789]\d{9}$/", $empNumber)) {
      $form_state->setErrorByName('emp_lastname',
      $this->t('Enter the valid phone number'));
    }

    if (!preg_match(
      '/\b[A-Za-z0-9._%+-]+@(gmail|yahoo|outlook|hotmail)\.com\b/',$empEmail)) {
      $form_state->setErrorByName(
        'emp_email',
        $this->t('Enter a Valid Email address of public domains like gmail, yahoo, outlook, hotmail with .com extension.'),
      );
    }
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state): void {
    $this->messenger()->addStatus($this->t('data submitted successfully.'));
    $form_state->setRedirect('<front>');
  }
}
