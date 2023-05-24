<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class ApiController extends AbstractController
{
    #[Route('/listeRegions', name: 'listeRegions')]
    public function listeRegions(SerializerInterface $serializer): Response
    {
        // appel de l'api : https://geo.api.gouv.fr/decoupage-administratif/regions
        $mesregions =  file_get_contents('https://geo.api.gouv.fr/regions');
        $mesregionsTab =  $serializer->decode($mesregions,  'json');
        // dénormaliser 
       $mesregionsObjet=  $serializer->denormalize($mesregionsTab, 'App\Entity\Region[]');
       // /**Methode 2 */
       // $mesregions  = $serializer->deserialize($mesregions, 'App\Entity\Region[]', 'json');

        // la denormalisation permet de rendre en objet les array donc manipuler comme bon nous semble dans la vue et en back 

        //    dump($mesregionsObjet);
        //    die();

        return $this->render('api/index.html.twig', [
            // 'mesregions' => $mesregionsTab,
            'mesregions' => $mesregionsObjet,
            // 'mesregions' => $mesregions


        ]);
    }
}
