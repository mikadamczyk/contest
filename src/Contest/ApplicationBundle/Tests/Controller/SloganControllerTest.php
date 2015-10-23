<?php
/**
 * Created by PhpStorm.
 * User: mikolaj.adamczyk
 * Date: 19.10.15
 * Time: 16:19
 */

namespace Contest\ApplicationBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

class SloganControllerTest extends WebTestCase
{
    private function post($uri, array $data)
    {
        $headers = array('CONTENT_TYPE' => 'application/json');
        $content = json_encode($data);
        $client = static::createClient();
        $client->request('POST', $uri, array(), array(), $headers, $content);

        return $client->getResponse();
    }

    private function get($uri)
    {
        $headers = array('CONTENT_TYPE' => 'application/json');
        $client = static::createClient();
        $client->request('GET', $uri, array(), array(),$headers);

        return $client->getResponse();
    }


    public function testSubmitNewSlogan()
    {
        $response = $this->post('api/slogan', array('content' => 'The best Content'));

        $this->assertSame(Response::HTTP_CREATED, $response->getStatusCode());
    }

    public function testSubmitEmptySlogan()
    {
        $response = $this->post('/api/slogan', array('content' => ''));

        $this->assertSame(Response::HTTP_UNPROCESSABLE_ENTITY, $response->getStatusCode());
    }

    public function testSubmitNoSlogan()
    {
        $response = $this->post('/api/slogan', array());

        $this->assertSame(Response::HTTP_UNPROCESSABLE_ENTITY, $response->getStatusCode());
    }

    public function testListingAllSlogans()
    {
        $response = $this->get('/api/slogans');

        $this->assertSame(Response::HTTP_OK, $response->getStatusCode());
    }
}