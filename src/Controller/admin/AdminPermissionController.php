<?php

namespace App\Controller\admin;

use App\Entity\Permission;
use App\Repository\PermissionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;

#[Route('/admin', name: 'admin_')]

class AdminPermissionController extends AbstractController
{
    #[Route(path: '/permission', name: 'app_admin_permission')]
    public function index(PermissionRepository $permission): Response
    {
        return $this->render('admin_permission/index.html.twig', [
            'controller_name' => 'AdminPermissionController',
            'permission' => $permission->findAll(),
        ]);
    }

    #[Route('/permission/modifier/{id}', name: 'modifier_permission')]

    public function editPermission(Permission $permission, Request $request, EntityManagerInterface $entityManager)
    {
        $form = $this->createForm(EditPermissionType::class, $permission);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $entityManager->persist($permission);
            $entityManager->flush();

            $this->addFlash('message', 'Permission modifiée avec succès');
            return $this->redirectToRoute('main');
        }
        return $this->render('admin/editpermission.html.twig', [
            'permissionForm' => $form->createView(),
        ]);
    }
}
