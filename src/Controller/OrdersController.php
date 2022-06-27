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

    /**
     * @Route("/orders/view/{id}", name="orders_view")
     */
    public
    function viewAction($id)
    {
        $orders = $this->getDoctrine()
            ->getRepository(orders::class)
            ->find($id);

        return $this->render('orders/view.html.twig', [
            'orders' => $orders
        ]);
    }
}
