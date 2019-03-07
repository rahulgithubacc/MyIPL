<?php
namespace Drupal\configform\Controller;
use Drupal\Core\Controller\ControllerBase;
use Drupal\node\Entity\Node;
use Drupal\user\UserInterface;

class HelloAuthor extends ControllerBase{
    public function content($nodeid)
    {
        $nodeob = Node::load($nodeid);
        return array(
            '#type' => 'markup',
            '#markup' => t('Hello @nodeid', array('@nodeid' => $nodeob->getOwner()->getDisplayName())),
        );
    }
}