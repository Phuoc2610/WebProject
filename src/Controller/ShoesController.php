<?php

namespace App\Controller;

use App\Entity\Shoes;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ShoesController extends AbstractController
{
    /**
     * @Route("/shoes", name="shoes_list")
     */
    public function listAction()
    {
        $shoes = $this->getDoctrine()
            ->getRepository(Shoes::class)
            ->findAll();
        return $this->render('shoes/index.html.twig', [
            'shoes' => $shoes
        ]);
    }
}
