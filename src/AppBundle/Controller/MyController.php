<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class MyController extends Controller
{
    
    /**
     * @Route("/")
     */
    public function mainAction(){
        return new Response('main');
    }
    
    /**
     * @Route("/my/{myName}")
     */
    public function showAction($myName){
        
        $txt = [
            'Specifications of the Antminer D3 are as follows:',
            'Hash rate: 15 GH/s (Variation of ±5% is expected)',
            'Power consumption: 1200W (at the wall, with Bitmain\'s APW3 PSU, 93% efficiency, 25°C ambient temp).'
        ];
        
        
        $templating = $this->container->get('templating');
        $html = $templating->render('my_view/show.html.twig', array(
           'name' => $myName,
            'txt' => $txt,
        ));
        
        //return new Response('myName: '.$myName);
        return new Response($html);
    }
    
    /**
     * @Route("/my/{myName}/test", name="my_show_test")
     * @Method("GET")
     */
    public function showTestAction($myName){
        $arr = array(
            '1' => 'gdfgdf',
            '2' => 'fd',
            '3' => 'tre',
        );
        
        //return new Response( json_encode($arr) );
        return new JsonResponse($arr);
    }
}