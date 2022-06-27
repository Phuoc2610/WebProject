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
/**
 * @Route("/orders/delete/{id}", name="orders_delete")
*/
    public function deleteAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $orders = $em->getRepository(orders::class)->find($id);
        $em->remove($orders);
        $em->flush();

        $this->addFlash(
            'error',
            'Orders deleted'
        );

        return $this->redirectToRoute('Orders_list');

}
}
