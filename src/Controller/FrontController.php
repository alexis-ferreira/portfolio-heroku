<?php

namespace App\Controller;

use App\Repository\WebsiteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FrontController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(): Response
    {
        return $this->render('front/home.html.twig');
    }

    /**
     *@Route("/websiteList", name="websiteList")
     */
    public function websiteList(WebsiteRepository $repository)
    {

        $website = $repository->findLimit();

        return $this->render("front/websiteList.html.twig", [

            "website" => $website
        ]);
    }
    
    /**
    *@Route("/viewWebsite/{id}", name="viewWebsite")
    */
    public function viewWebsite(WebsiteRepository $repository, $id = null)
    {

        $website = $repository->find($id);

        return $this->render("front/viewWebsite.html.twig", [

            "website" => $website
        ]);
    }
    
    /**
    *@Route("/allWebsite", name="allWebsite")
    */
    public function allWebsite(WebsiteRepository $repository)
    {

        $websites = $repository->findAllWebsite();
    
        return $this->render("front/allWebsite.html.twig", [

            "websites" => $websites
        ]);
    }
    
    /**
    *@Route("/cv", name="cv")
    */
    public function cv()
    {
    
        return $this->render("front/cv.html.twig");
    }
}
