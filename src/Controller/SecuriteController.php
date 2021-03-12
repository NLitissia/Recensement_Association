<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\InscriptionType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoder;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class SecuriteController extends AbstractController
{
    /**
     * @Route("/inscription", name="inscription")
     */
    public function index(Request $request,UserPasswordEncoderInterface $encoder)
    {
        $em = $this->getDoctrine()->getManager(); 

        $user = new User();
        $form = $this->createForm(InscriptionType::class,$user);
        
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $user->setPassword($encoder->encodePassword($user,$user->getPassword()));
            $em->persist($user);
            $em->flush();
            
        }
        return $this->render('securite/inscription.html.twig', [
           'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/login", name="connexion")
     */

     public function login(){
         return $this->render('securite/login.html.twig');
     }

     /**
      * @Route("/logout", name="deconnexion")
      */
    public function logout(){}  
}
