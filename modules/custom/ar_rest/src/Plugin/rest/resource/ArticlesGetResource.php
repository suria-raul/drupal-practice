<?php

namespace Drupal\ar_rest\Plugin\rest\resource;

use Drupal\node\Entity\Node;
use Drupal\rest\Plugin\ResourceBase;
use Drupal\rest\ResourceResponse;

/**
 * @RestResource(
 *   id = "articles_get_resource",
 *   label = @Translation("Get Articles Resource"),
 *   uri_paths = {
 *     "canonical" = "/get-articles"
 *   }
 * )
 */
class ArticlesGetResource extends ResourceBase {

  public function get()
  {
    $nids = \Drupal::entityQuery('node')
      ->accessCheck(false)
      ->condition('status', 1)
      ->condition('type', 'article')
      ->execute();

    $articles = Node::loadMultiple($nids);

    $response = new ResourceResponse($articles);
    $response->addCacheableDependency($articles);
    return $response;
  }
}
