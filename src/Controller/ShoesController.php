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
    /**
     * @Route("/shoes/view/{id}", name="shoes_view")
     */
    public function viewAction($id)
    {
        $shoes = $this->getDoctrine()
            ->getRepository(Shoes::class)
            ->find($id);

        return $this->render('shoes/view.html.twig', [
            'shoes' => $shoes
        ]);
    }
    /**
     * @Route("/shoes/delete/{id}", name="shoes_delete")
     */
    public function deleteAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $shoes = $em->getRepository(shoes::class)->find($id);
        $em->remove($shoes);
        $em->flush();

        $this->addFlash(
            'error',
            'Shoes delete success'
        );

        return $this->redirectToRoute("shoes_list");
    }
}
