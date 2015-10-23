<?php
/**
 * Created by PhpStorm.
 * User: mikolaj.adamczyk
 * Date: 20.10.15
 * Time: 15:39
 */

namespace Contest\ApplicationBundle\Tests\Entity;

use Contest\ApplicationBundle\Entity\SloganFactory;
use Contest\ApplicationBundle\Entity\SloganGateway;
use Contest\ApplicationBundle\Entity\SloganRepository;

class SloganRepositoryTest extends \PHPUnit_Framework_TestCase
{
    const CONTENT = 'My best slogan!';

    private $repository;

    public function setUp()
    {
        $filename = '/tmp/fortune_database_test.txt';
        $gateway = new SloganGateway($filename);
        $factory = new SloganFactory();
        $this->repository = new SloganRepository($gateway, $factory);
    }

    public function testItPersistsTheSlogan()
    {
        $slogan = $this->repository->insert(self::CONTENT);
        $id = $slogan['slogan']['id'];
        $slogans = $this->repository->findAll();
        $foundSlogan = $slogans['slogans'][$id];

        $this->assertSame(self::CONTENT, $foundSlogan['content']);
    }
}