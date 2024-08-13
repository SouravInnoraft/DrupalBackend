<?php

namespace Drupal\services;
 use Drupal\Core\Session\AccountInterface;

class Example {

  protected $currentUser;

  public function __construct(AccountInterface $currentUser) {
    $this->currentUser = $currentUser;
  }

  public function getDemoValue() {
    return $this->currentUser->getAccountName();
  }
}
