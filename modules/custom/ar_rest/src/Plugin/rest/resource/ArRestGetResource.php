<?php

namespace Drupal\ar_rest\Plugin\rest\resource;

use Drupal\Core\Session\AccountProxyInterface;
use Drupal\rest\Plugin\ResourceBase;
use Drupal\rest\ResourceResponse;
use Psr\Log\LoggerInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

/**
 * @RestResource(
 *   id = "ar_rest_get_resource",
 *   label = @Translation("Get resource for AR Rest"),
 *   uri_paths = {
 *     "canonical" = "/ar-rest"
 *   }
 * )
 */
class ArRestGetResource extends ResourceBase {

  protected AccountProxyInterface $currentLoggedInUser;

  public function __construct(array $configuration, $plugin_id, $plugin_definition, array $serializer_formats, LoggerInterface $logger, AccountProxyInterface $currentLoggedInUser) {
    parent::__construct($configuration, $plugin_id, $plugin_definition, $serializer_formats, $logger);
    $this->currentLoggedInUser = $currentLoggedInUser;
  }

  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
    return new static(
      $configuration,
      $plugin_id,
      $plugin_definition,
      $container->getParameter('serializer.formats'),
      $container->get('logger.factory')->get('ar_rest'),
      $container->get('current_user')
    );
  }

  public function get() {
    if (!$this->currentLoggedInUser->hasPermission('access content')) {
      throw new AccessDeniedHttpException();
    }

    $taxonomies = \Drupal::entityTypeManager()->getStorage('taxonomy_term')->loadTree('ar_rest');
    foreach ($taxonomies as $taxonomy) {
      $result[] = [
        'id' => $taxonomy->tid,
        'name' => $taxonomy->name
      ];
    }

    $response = new ResourceResponse($result);
    $response->addCacheableDependency($result);
    return $response;
  }

  public function post() {

  }

  public function delete() {

  }

  public function put() {

  }

}
