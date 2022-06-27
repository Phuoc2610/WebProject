<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    /**
     * @Route("/user", name="user_list")
     */
    public function listAction()
    {
        $user = $this->getDoctrine()
            ->getRepository(user::class)
            ->findAll();
        return $this->render('user/index.html.twig', [
            'user' => $user
        ]);
    }
    /**
     * @Route("/user/view/{id}", name="user_view")
     */
    public function detailsAction($id)
    {
        $user = $this->getDoctrine()
            ->getRepository(user::class)
            ->find($id);

        return $this->render('user/view.html.twig', [
            'user' => $user
        ]);
    }
}
