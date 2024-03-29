<?php

namespace App\Controller;

use App\Entity\Experiance;
use App\Entity\Product;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use App\Repository\ProductRepository;
use Symfony\Component\HttpFoundation\RequestStack;

class PageController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(ManagerRegistry $doctrine): Response
    {
        return $this->render('page/index.html.twig', []);
    }


    #[Route('/contact', name: 'contact')]
    public function contact(ManagerRegistry $doctrine): Response
    {
        return $this->render('page/contact.html.twig', []);
    }

    #[Route('/experiance', name: 'experiance')]
    public function experiance(ManagerRegistry $doctrine): Response
    {
        return $this->render('page/experiance.html.twig', []);
    }

    #[Route('/shop', name: 'shop')]
    public function shop(ManagerRegistry $doctrine): Response
    {
        return $this->render('page/shop.html.twig', []);
    }

    #[Route('/single', name: 'single')]
    public function single(ManagerRegistry $doctrine, SessionInterface $session, ProductRepository $productRepository, RequestStack $requestStack): Response
    {
        $request = $requestStack->getCurrentRequest();        
        $id = $request->get('id');
        $session->set('product_id', $id);

        $id = $session->get('product_id');
        $product = $productRepository->find($id);

        return $this->render('page/single.html.twig', ['product' => $product]);
    }

    #[Route('/team', name: 'team')]
    public function team(ManagerRegistry $doctrine): Response
    {
        return $this->render('page/team.html.twig', []);
    }

    public function experianceTemplate(ManagerRegistry $doctrine): Response
    {
        $repository = $doctrine->getRepository(Experiance::class);
        $experiance = $repository->findAll();
        return $this->render('partials/_experiance.html.twig',compact('experiance'));
    }

    public function productTemplate(ManagerRegistry $doctrine): Response
    {
        $repository = $doctrine->getRepository(Product::class);
        $product = $repository->findAll();
        return $this->render('partials/_product.html.twig',compact('product'));
    }

    public function photoProductTemplate(ManagerRegistry $doctrine): Response
    {
        $repository = $doctrine->getRepository(Product::class);
        $product = $repository->findAll();
        return $this->render('partials/_photoProduct.html.twig',compact('product'));
    }
}

