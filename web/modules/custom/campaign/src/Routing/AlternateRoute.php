<?php

/**
 * @file
 * Contains \Drupal\modulename\Routing\RouteSubscriber.
 */

namespace Drupal\campaign\Routing;


use Drupal\Core\Routing\RouteSubscriberBase;
use Symfony\Component\Routing\RouteCollection;

/**
 * Listens to the dynamic route events.
 */
class AlternateRoute extends RouteSubscriberBase {

  /**
   * {@inheritdoc}
   */
  protected function alterRoutes(RouteCollection $collection) {
    if($route=$collection->get('campaign.defaultSettings')){
       $route->setRequirement('_permission','custom permission');
       $route->setRequirement('_role', 'administrator');
       $route->setRequirement('_', 'administrator');
    }

  }
}
