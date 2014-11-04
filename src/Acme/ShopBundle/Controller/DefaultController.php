<?php

namespace Acme\ShopBundle\Controller;

use Acme\ShopBundle\Form\MyForm;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction(Request $request)
    {
        // If we replace PATH with POST, everything working!
        $form = $this->createForm(new MyForm(), null, array('method' => 'PATCH'));
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            var_dump($form->getData());
            echo "Form was submitted and valid!";
            // The form is valid even if the field "products" is empty.

        }

        return $this->render('AcmeShopBundle:Default:index.html.twig', array('form' => $form->createView()));
    }
}
