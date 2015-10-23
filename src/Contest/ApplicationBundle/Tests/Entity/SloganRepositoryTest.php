<?php
/**
 * Created by PhpStorm.
 * User: mikolaj.adamczyk
 * Date: 20.10.15
 * Time: 15:39
 */

namespace Contest\ApplicationBundle\Tests\Entity;

use Contest\ApplicationBundle\Entity\Slogan;
use Contest\ApplicationBundle\Entity\SloganFactory;
use Contest\ApplicationBundle\Entity\SloganGateway;
use Contest\ApplicationBundle\Entity\SloganRepository;
use Prophecy\PhpUnit\ProphecyTestCase;

class SloganRepositoryTest extends ProphecyTestCase
{
    const ID = 10000;
    const CONTENT = 'My best slogan!';

    private $gateway;
    private $repository;

    public function setUp()
    {
        parent::setUp();
        $gatewayClassname = 'Contest\ApplicationBundle\Entity\SloganGateway';
        $this->gateway = $this->prophesize($gatewayClassname);
        $factory = new SloganFactory();
        $this->repository = new SloganRepository($this->gateway->reveal(), $factory);
    }

    public function testItPersistsTheSlogan()
    {
        $slogan = new Slogan(self::ID, self::CONTENT);
        $this->gateway->insert(self::CONTENT)->willReturn($slogan);
        $this->repository->insert(self::CONTENT);

        $this->gateway->findAll()->willReturn(array($slogan));
        $slogans = $this->repository->findAll();
        $foundSlogan = $slogans['slogans'][self::ID];

        $this->assertSame(self::CONTENT, $foundSlogan['content']);
    }
}