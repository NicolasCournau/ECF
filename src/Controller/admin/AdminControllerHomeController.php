<?php

namespace App\Controller\admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin', name: 'admin_')]

class AdminControllerHomeController extends AbstractController
{
    #[Route(path: '/home', name: 'home')]
    public function home(): Response
    {
        return $this->render('admin/home.html.twig');
    }
}
