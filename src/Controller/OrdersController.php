<?php

namespace App\Controller;

use App\Entity\Orders;
use App\Entity\Shoes;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class OrdersController extends AbstractController
{
    /**
     * @Route("/orders", name="orders_list")
     */
    public function listAction()
    {
        $orders = $this->getDoctrine()
            ->getRepository(orders::class)
            ->findAll();
        return $this->render('orders/index.html.twig', [
            'orders' => $orders
        ]);
    }

}
