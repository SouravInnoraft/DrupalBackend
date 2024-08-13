<?php

namespace Drupal\customservice;

use Drupal\Core\Database\Connection;

class Example {
  /**
   * Variable for database connection
   *
   * @var mixed,
   */
  protected $database;

  public function __construct(Connection $database) {
   $this->database=$database;
  }

  /**
   * Function to insert form data into database;
   *
   * @param mixed $form_state
   * @return void
   */
  public function setData($form_state){
    $values = $form_state->getValues();
    $this->database->insert('company_details')->fields([
      'parent_company' => $values['parent_company'],
      'labelone' => $values['labelone'],
      'valueone' => $values['valueone'],
      'labeltwo' => $values['labeltwo'],
      'valuetwo' => $values['valuetwo'],
    ])->execute();
  }

  /**
   * Fetches data from database.
   *
   * @return array
   */
  public function getData():array{
    $query = $this->database->select('company_details', 'c')
      ->fields('c', ['parent_company', 'labelone', 'valueone', 'labeltwo', 'valuetwo'])
      ->execute()->fetchAll();
     return $query;
  }
}
