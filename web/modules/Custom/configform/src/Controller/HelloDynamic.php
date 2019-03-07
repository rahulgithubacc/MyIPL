<?php
/**
 * @file
 * Contains \Drupal\hello\Controller\HelloController.
 */
namespace Drupal\configform\Controller;
 
use Drupal\Core\Controller\ControllerBase;
 
class HelloDynamic extends ControllerBase {
  public function content($name) {
    return array(
      '#type' => 'markup',
      '#markup' => t('Hello @name', array('@name' => $name)),
    );
  }
}