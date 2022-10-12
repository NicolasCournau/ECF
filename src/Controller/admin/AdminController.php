<?php

namespace App\Controller\admin;

use App\Entity\User;
use App\Controller\admin\AssignUserType;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;

#[Route('/admin', name: 'admin_')]

class AdminController extends AbstractController
{

    #[Route(path: '/utilisateurs', name: 'app_admin')]
    public function index(UserRepository $user): Response
    {
        return $this->render('admin/index.html.twig', [
            'controller_name' => 'AdminController',
            'user' => $user->findAll(),
        ]);
    }

    #[Route('/utilisateurs/modifier/{id}', name: 'modifier_utilisateur')]

    public function editUser(User $user, Request $request, EntityManagerInterface $entityManager)
    {
        $form = $this->createForm(EditUserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $entityManager->persist($user);
            $entityManager->flush();

            $this->addFlash('message', 'Utilisateur modifié avec succès');
            return $this->redirectToRoute('main');
        }
        return $this->render('admin/edituser.html.twig', [
            'userForm' => $form->createView(),
        ]);
    }

    #[Route('/utilisateurs/assigner/{id}', name: 'assigner_utilisateur')]

    public function assignUser(User $user, Request $request, EntityManagerInterface $entityManager)
    {
        $form = $this->createForm(AssignUserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $entityManager->persist($user);
            $entityManager->flush();

            $this->addFlash('message', 'Utilisateur modifié avec succès');
            return $this->redirectToRoute('main');
        }
        return $this->render('admin/assignuser.html.twig', [
            'AssignUserForm' => $form->createView(),
        ]);
    }
}
