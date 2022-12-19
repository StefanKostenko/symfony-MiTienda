<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PageController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(): Response
    {
        return $this->render('page/index.html.twig', []);
    }

    #[Route('/checkout', name: 'checkout')]
    public function checkout(): Response
    {
        return $this->render('page/checkout.html.twig', []);
    }

    #[Route('/contatct', name: 'contatct')]
    public function contatct(): Response
    {
        return $this->render('page/contatct.html.twig', []);
    }

    #[Route('/experiance', name: 'experiance')]
    public function experiance(): Response
    {
        return $this->render('page/experiance.html.twig', []);
    }

    #[Route('/login', name: 'login')]
    public function login(): Response
    {
        return $this->render('page/login.html.twig', []);
    }

    #[Route('/register', name: 'register')]
    public function register(): Response
    {
        return $this->render('page/register.html.twig', []);
    }

    #[Route('/shop', name: 'shop')]
    public function shop(): Response
    {
        return $this->render('page/shop.html.twig', []);
    }

    #[Route('/single', name: 'single')]
    public function single(): Response
    {
        return $this->render('page/single.html.twig', []);
    }

    #[Route('/team', name: 'team')]
    public function team(): Response
    {
        return $this->render('page/team.html.twig', []);
    }
}

