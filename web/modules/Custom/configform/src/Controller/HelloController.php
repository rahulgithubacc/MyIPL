<?php
namespace Drupal\configform\Controller;

use Drupal\Core\Controller\ControllerBase;
class HelloController extends ControllerBase {
    public function content() {
      return [
       
        '#type' => 'markup',
        '#markup' =>'<h1><b>' . $this->t('Hello, World!'),
      ];
    }
}    