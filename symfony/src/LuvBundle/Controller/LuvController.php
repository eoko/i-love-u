<?php

namespace LuvBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use LuvBundle\Entity\Lover;

class LuvController extends Controller
{
    /**
    * @Route("/loves")
    */
    public function LoveAction(Request $request) {
        $ip = $request->getClientIp();
        $em = $this->getDoctrine()->getManager();
        $metaonly = $request->query->get('metaonly');

        $lover = $em->getRepository('LuvBundle:Lover')->findOneBy(array('ip' => $ip));
        if($metaonly === 'true') {
            //Real way, add method in repository to count through sql
            $count = sizeof($em->getRepository('LuvBundle:Lover')->findAll());
            $response = new Response();
            $response->setContent($count);
            $response->setStatusCode(200);
            return $response;
        }
        else if($lover) {
            //return 412
            $response = new Response();
            $response->setContent('already exists');
            $response->setStatusCode(412);
            return $response;
        }
        $lover = new Lover();
        $lover->setIp($ip);
        $lover->setCreatedAt(new \DateTime);
        
        $em->persist($lover);
        $em->flush();
        $em->clear();
        
        $response = new Response();
        $response->setContent('');
        $response->setStatusCode(Response::HTTP_OK);
        return $response;
    }




}
