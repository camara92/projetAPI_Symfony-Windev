<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class ApiController extends AbstractController
{
    #[Route('/listeRegions', name: 'listeRegions')]
    public function listeRegions(SerializerInterface $serializer ): Response
    {
        // appel de l'api : https://geo.api.gouv.fr/decoupage-administratif/regions
       $mesregions =  file_get_contents('https://geo.api.gouv.fr/regions');
      $mesregionsTab =  $serializer->decode($mesregions,  'json');

    //    dump($mesregionsTab);
    //    die();
        
        return $this->render('api/index.html.twig', [
            'mesregions' => $mesregionsTab, 
           

            
        ]);
    }
}
