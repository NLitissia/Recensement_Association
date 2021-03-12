<?php

namespace App\Controller;

use App\Entity\Citoyen;
use App\Repository\CitoyenRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AccueilController extends AbstractController
{
    /**
     * @Route("/accueil", name="accueil")
     */
    public function listCitoyen(CitoyenRepository $Repo)
    {
        $citoyens = $Repo->findAll();
        return $this->render('accueil/index.html.twig', [
            'citoyens' => $citoyens
        ]);
    }
    /**
     * @Route("/" , name="home")
     */
    public function home() {
        return $this->render('accueil/home.html.twig');
    }

    /**
     * @Route("/information" , name="information")
     */

     public function info(){
         return $this->render('accueil/info.html.twig');
     }
}
