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
    private $createdAt;

    public function __construct($id, $content)
    {
        $this->id = $id;
        $this->content = $content;
        $this->createdAt = new \DateTime();
    }

    public function fromContent($content)
    {
        return new Slogan(null, $content);
    }

    public function getId()
    {
        return $this->id;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function getCreatedAt()
    {
        return $this->createdAt;
    }
}