<?php

namespace App\Controller;

use App\Entity\Supplier;
use App\Form\SupplierAddType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SupplierController extends AbstractController
{
    /**
     * @Route("/supplier", name="supplier_list")
     */
    public function listAction()
    {
        $supplier = $this->getDoctrine()
            ->getRepository(Supplier::class)
            ->findAll();
        return $this->render('supplier/index.html.twig', [
            'supplier' => $supplier
        ]);
    }

    /**
     * @Route("/supplier/view/{id}", name="supplier_view")
     */
    public
    function ViewAction($id)
    {
        $supplier = $this->getDoctrine()
            ->getRepository(Supplier::class)
            ->find($id);

        return $this->render('supplier/view.html.twig', [
            'supplier' => $supplier
        ]);
    }


}
