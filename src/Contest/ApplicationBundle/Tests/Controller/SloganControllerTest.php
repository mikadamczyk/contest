<?php
/**
 * Created by PhpStorm.
 * User: mikolaj.adamczyk
 * Date: 19.10.15
 * Time: 16:19
 */

namespace Contest\ApplicationBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Tests\Functional\WebTestCase;
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

    public function testSubmitNewSlogan()
    {
        $response = $this->post('api/contest', array('content' => 'The best Content'));

        $this->assertSame(Response::HTTP_CREATED, $response->getStatusCode());
    }
}