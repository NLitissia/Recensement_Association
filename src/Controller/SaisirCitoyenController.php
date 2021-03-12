<?php

namespace App\Controller;

use App\Entity\Citoyen;
use App\Form\CitoyenFormType;
use App\Repository\CitoyenRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class SaisirCitoyenController extends AbstractController
{
    /**
     * @Route("/saisir/citoyen/creation", name="saisir_citoyen_create")
     * @Route("/saisir/citoyen/{id}", name="saisir_citoyen_modification")
     */
    public function saisir(Request $request, Citoyen $citoyen = null)
    {  
        $entityManager = $this->getDoctrine()->getManager();

        if(!$citoyen){
            $citoyen = new Citoyen();
        }
        $form = $this->createForm(CitoyenFormType::class, $citoyen);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $entityManager->persist($citoyen);
            $entityManager->flush();
            return $this->redirectToRoute("accueil");
        }
        return $this->render('saisir_citoyen/saisirCitoyen.html.twig', [
            "citoyen" => $citoyen,
            "form" => $form->createView(),
            "modification" => $citoyen->getId() !== null

        ]);
    }

    /**
     *  @Route("/delete/citoyen/{id}", name="saisir_citoyen_delete")
     * 
     */
    public function deleteCitoyen(Citoyen $citoyen = null,Request $request,CitoyenRepository $Repo){
              
        $entityManager = $this->getDoctrine()->getManager();

         $entityManager->remove($citoyen);
         $entityManager->flush();

         $citoyens = $Repo->findAll();
        return $this->render('accueil/index.html.twig', [
            'citoyens' => $citoyens
        ]);
    }
}
