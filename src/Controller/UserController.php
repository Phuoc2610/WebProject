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
}
