<?php
/**
 * Created by PhpStorm.
 * User: mikolaj.adamczyk
 * Date: 20.10.15
 * Time: 16:02
 */

namespace Contest\ApplicationBundle\Entity;


class SloganRepository
{
    private $gateway;
    private $factory;

    public function __construct(SloganGateway $gateway, SloganFactory $factory)
    {
        $this->gateway = $gateway;
        $this->factory = $factory;
    }

    public function insert($content)
    {
        $slogan = $this->gateway->insert($content);

        return $this->factory->makeOne($slogan);
    }

    public function findAll()
    {
        $slogans = $this->gateway->findAll();

        return $this->factory->makeAll($slogans);
    }
}