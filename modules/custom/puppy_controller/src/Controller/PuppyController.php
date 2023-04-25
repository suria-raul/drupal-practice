<?php

namespace Drupal\puppy_controller\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Datetime\DateFormatterInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class PuppyController extends ControllerBase {
  protected DateFormatterInterface $dateFormatter;
  public function __construct(DateFormatterInterface $dateFormatter) {
    $this->dateFormatter = $dateFormatter;
  }

  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('date.formatter'),
    );
  }

  public function puppy() {
    dump(\Drupal::service('a_service.say')->say());

    die();
  }

}
