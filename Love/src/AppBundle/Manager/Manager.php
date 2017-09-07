<?php

namespace AppBundle\Manager;

use Doctrine\ORM\EntityManager;
use AppBundle\Entity\Love;
/**
 *
 */
class Manager
{
  protected $entity_manager;

  function __construct(EntityManager $entity_manager)
  {
    $this->entity_manager = $entity_manager;
  }

  public function addLove($ip){
      $love = new Love();
      $love->setIp($ip);
      try {
        $this->entity_manager->persist($love);
        $this->entity_manager->flush();
        return 'success';
      } catch( \Exception $error) {
        return 'error';
      }

  }
}
