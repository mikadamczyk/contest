<?php
/**
 * Created by PhpStorm.
 * User: mikolaj.adamczyk
 * Date: 20.10.15
 * Time: 15:35
 */

namespace Contest\ApplicationBundle\Entity;


class Slogan
{
    private $id;
    private $content;

    public function __construct($id, $content)
    {
        $this->id = $id;
        $this->content = $content;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getContent()
    {
        return $this->content;
    }
}