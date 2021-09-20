<?php

namespace App\Controller;

use App\Entity\Website;
use App\Form\WebsiteType;
use App\Repository\WebsiteRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BackController extends AbstractController
{
    /**
     * @Route("/backOffice", name="backOffice")
     */
    public function backOffice(Request $request, EntityManagerInterface $manager, WebsiteRepository $repository)
    {

        $form = $this->createForm(WebsiteType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()):

            $website = $form->getData();
            $picture = $form->get("picture")->getData();
            $thumbnail = $form->get("thumbnail")->getData();

            if ($picture && $thumbnail):

                $namePicture = date("YmdHis") . uniqid() . $picture->getClientOriginalName();
                $nameThumbnail = date("YmdHis") . uniqid() . $picture->getClientOriginalName();

                $picture->move(
                    $this->getParameter("upload_directory"),
                    $namePicture
                );

                $thumbnail->move(
                    $this->getParameter("upload_directory"),
                    $nameThumbnail
                );

                $website->setPicture($namePicture);
                $website->setThumbnail($nameThumbnail);

            endif;

            $manager->persist($website);
            $manager->flush();

            $this->addFlash('success', 'Le site a bien été ajouté');

            return $this->redirectToRoute("backOffice");

        elseif ($form->isSubmitted() && !$form->isValid()):

            $this->addFlash("error", "Un problème est survenue lors de l'ajout");

        endif;

        return $this->render("back/backOffice.html.twig", [
            "title" => "Ajouter un site",
            "form" => $form->createView()
        ]);
    }

    /**
     * @Route("/websiteManager", name="websiteManager")
     */
    public function websiteManager(WebsiteRepository $repository)
    {
        $websites = $repository->findAll();

        return $this->render("back/websiteManager.html.twig", [
            "title" => "Liste des sites",
            "websites" => $websites
        ]);
    }

    /**
     * @Route("/editWebsite/{id}", name="editWebsite")
     */
    public function editWebsite(Request $request, WebsiteRepository $repository, EntityManagerInterface $manager, $id = null)
    {

        $websites = $repository->find($id);

        $form = $this->createForm(WebsiteType::class, $websites);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()):

            $website = $form->getData();
            $picture = $form->get("picture")->getData();
            $thumbnail = $form->get("thumbnail")->getData();

            if ($picture && $thumbnail):

                $namePicture = date("YmdHis") . uniqid() . $picture->getClientOriginalName();
                $nameThumbnail = date("YmdHis") . uniqid() . $picture->getClientOriginalName();

                $picture->move(
                    $this->getParameter("upload_directory"),
                    $namePicture
                );

                $thumbnail->move(
                    $this->getParameter("upload_directory"),
                    $nameThumbnail
                );

                $website->setPicture($namePicture);
                $website->setThumbnail($nameThumbnail);

            endif;

            $manager->persist($website);
            $manager->flush();

            $this->addFlash('success', 'Le site a bien été ajouté');

            return $this->redirectToRoute("backOffice");

        elseif ($form->isSubmitted() && !$form->isValid()):

            $this->addFlash("error", "Un problème est survenue lors de l'ajout");

        endif;

        return $this->render("back/editWebsite.html.twig", [

            "title" => "Editer un site",
            "form" => $form->createView()
        ]);
    }
}
