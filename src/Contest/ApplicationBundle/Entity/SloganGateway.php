<?php
/**
 * Created by PhpStorm.
 * User: mikolaj.adamczyk
 * Date: 20.10.15
 * Time: 16:08
 */

namespace Contest\ApplicationBundle\Entity;


use Doctrine\ORM\EntityRepository;

class SloganGateway extends EntityRepository
{
    public function insert($content)
    {
        $entityManager = $this->getEntityManager();

        $slogan = Slogan::fromContent($content);
        $entityManager->persist($slogan);
        $entityManager->flush();

        return $slogan;
    }
}