<?php

namespace Drupal\campaign\Access;

use Drupal\Core\Access\AccessCheckInterface;
use Drupal\Core\Access\AccessResult;
use Drupal\Core\Session\AccountInterface;

/**
 * Provides access control for custom routes.
 */
class AccessControlHandler implements AccessCheckInterface {

  /**
   * Checks access for the given route and account.
   *
   * @param \Drupal\Core\Session\AccountInterface $account
   *   The user account.
   * @param string $operation
   *   The operation being performed.
   *
   * @return \Drupal\Core\Access\AccessResult
   *   The access result.
   */
  public function access(AccountInterface $account, $operation = NULL) {
    // Example access logic: deny access if the user has 'editor' role.
    if (in_array('editor', $account->getRoles())) {
      return AccessResult::forbidden();
    }
    return AccessResult::allowed();
  }

  /**
   * Checks if this access check applies to the given route.
   *
   * @param string $route_name
   *   The route name.
   *
   * @return bool
   *   TRUE if this check applies to the route, FALSE otherwise.
   */
  public function applies($route_name) {
    // Define which routes this access check should be applied to.
    return $route_name === '/campaign';
  }
}
