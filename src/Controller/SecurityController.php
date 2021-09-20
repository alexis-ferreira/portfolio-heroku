<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class SecurityController extends AbstractController
{
    /**
     * @Route("/register", name="register")
     */
    public function register(EntityManagerInterface $manager, Request $request, UserPasswordEncoderInterface $hasher)
    {

        $form = $this->createForm(RegistrationType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()):

            $user = $form->getData();
            $hash = $user->getPassword();

            $hashpassword = $hasher->encodePassword($user, $hash);

            $user->setPassword($hashpassword);

            $manager->persist($user);
            $manager->flush();

            $this->addFlash("success", "Félicitations, vous êtes désormais inscrit !");

            return $this->redirectToRoute("login");

        endif;

        return $this->render("security/register.html.twig", [

            "form" => $form->createView()
        ]);
    }

    /**
     * @Route("/login", name="login")
     */
    public function login()
    {

        return $this->render("security/login.html.twig");
    }

    /**
     * @Route("/logout", name="logout")
     */
    public function logout()
    {

    }
}
