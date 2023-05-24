<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ApiController extends AbstractController
{
    #[Route('/listeRegions', name: 'listeRegions')]
    public function listeRegions(): Response
    {
        // appel de l'api 
       $mesregions =  file_get_contents('https://geo.api.gouv.fr/regions');
    //    dump($mesregions);
    //    die();
        
        return $this->render('api/index.html.twig', [
            'mesregions' => $mesregions, 
           

            
        ]);
    }
}
