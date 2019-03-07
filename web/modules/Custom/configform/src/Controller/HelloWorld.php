<?php
namespace Drupal\configform\Controller;

use Drupal\Core\Controller\ControllerBase;
class HelloWorld extends ControllerBase {
    public function content() {
      return [
       
        '#type' => 'markup',
        '#markup' =>'<h1><b>' . $this->t('Hello,World!').'</b></h1>',
      ];
    }
}    