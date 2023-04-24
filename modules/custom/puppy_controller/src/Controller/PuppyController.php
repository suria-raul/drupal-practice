<?php

namespace Drupal\puppy_controller\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Datetime\DateFormatterInterface;
use Drupal\Core\Entity\EntityTypeManagerInterface;
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
    dump($this->entityTypeManager());

    die();
  }

}
