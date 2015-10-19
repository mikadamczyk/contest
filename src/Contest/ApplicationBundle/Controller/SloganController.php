<?php
/**
 * Created by PhpStorm.
 * User: mikolaj.adamczyk
 * Date: 19.10.15
 * Time: 16:29
 */

namespace Contest\ApplicationBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class SloganController extends Controller
{
    public function submitAction(Request $request)
    {
        $postedContent = $request->getContent();
        $postedValues = json_decode($postedContent, true);

        $answer['slogan']['content'] = $postedValues['content'];

        return new JsonResponse($answer, Response::HTTP_CREATED);
    }
}