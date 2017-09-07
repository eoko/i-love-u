<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 *
 */
class ApiController extends Controller
{
  public function addAction(Request $request)
  {
    // On s'assure d'être en requete AJAX
    if($request->isXmlHttpRequest()){
        $ip = $request->getClientIp();
        $loveManager = $this->get('AppBundle\Manager\Manager');
        // On stocke le return de la fonction addLove dans une variable pour la tester
        $status = $loveManager->addLove($ip);
        // On renvoie le code d'erreur suivant le retour de la fonction addLove
        if ( $status ===  'success') {
          $content = json_encode(['status' => 'success']);
          return new Response($content, 200);
        } else {
          $content = json_encode(['message' => 'vous ne pouvez liker qu\'une fois']);
          return new Response($content, 412);
        }


    }
  }

  public function countAction(Request $request)
  {
    if($request->isXmlHttpRequest()){
      $em = $this->getDoctrine()->getManager();

      $countLikes = $em->getRepository('AppBundle:Love')->counting();

      $content = json_encode(['count' => $countLikes]);
      return new Response($content, 200);
    }
  }

  public function loveAction(Request $request)
  {
  }
}
