<?php
/**
 * Created by PhpStorm.
 * User: mikolaj.adamczyk
 * Date: 20.10.15
 * Time: 16:08
 */

namespace Contest\ApplicationBundle\Entity;


class SloganGateway
{
    private $filename;

    public function __construct($filename)
    {
        $this->filename = $filename;
    }

    public function insert($content)
    {
        $content = trim($content);
        $line = $content."\n";
        file_put_contents($this->filename, $line, FILE_APPEND);
        $lines = file($this->filename);
        $lineNumber = count($lines) - 1;

        return new Slogan($lineNumber, $content);
    }

    public function findAll()
    {
        $contents = file($this->filename);
        foreach ($contents as $id => $content) {
            $quotes[$id] = new Slogan($id, trim($content));
        }

        return $quotes;
    }
}