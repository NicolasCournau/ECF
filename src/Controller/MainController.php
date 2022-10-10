<?php

namespace App\Controller;

use App\Repository\PermissionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    #[Route('/', name: 'main')]
    public function index(PermissionRepository $permission): Response
    {
        return $this->render('Main/index.html.twig', [
            'controller_name' => 'MainController',
            'permission' => $permission->findAll(),
        ]);
    }
}
