<?php
/**
 * Created by PhpStorm.
 * User: mikolaj.adamczyk
 * Date: 20.10.15
 * Time: 16:11
 */

namespace Contest\ApplicationBundle\Entity;


class SloganFactory
{
    public function makeOne(Slogan $rawSlogan)
    {
        return array('slogan' => $this->make($rawSlogan));
    }

    public function makeAll(array $rawSlogans)
    {
        foreach ($rawSlogans as $rawSlogan) {
            $slogans['slogans'][$rawSlogan->getId()] = $this->make($rawSlogan);
        }

        return $slogans;
    }

    private function make(Slogan $rawSlogan)
    {
        return array(
            'id' => $rawSlogan->getId(),
            'content' => $rawSlogan->getContent(),
        );
    }
}