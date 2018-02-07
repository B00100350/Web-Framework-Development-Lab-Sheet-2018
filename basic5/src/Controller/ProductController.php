<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Product;

class ProductController extends Controller
{
    /**
     * @Route("/product/create/{description}/{price}", name="product_create")
     */
    public function createAction($description, $price)
    {
        //create new product object
        $product = new Product();
        $product->setDescription($description);
        $product->setPrice($price);

        //persist ( save / store ) this object's contents to the database
        $em = $this->getDoctrine()->getManager();
        $em->persist($product);
        $em->flush();

        return new Response('Saved new product with id '.$product->getId());
    }



    /**
     * @Route("/product/{id}", name="product_show")
     */
    public function showAction(Product $product)
    {

       //we are assuming $product is not a NULL

        $template = 'product/show.html.twig';
        $args = [
            'product' => $product
            ];

        return $this->render($template, $args);

    }


    /**
     * @Route("/product", name="product_list")
     */
    public function listAction()
    {
        $productRepository = $this->getDoctrine()->getRepository(Product::class);
        $product = $productRepository->findAll();


        $template = 'product/list.html.twig';
        $args = [
            'products' => $product
        ];

        return $this->render($template, $args);

    }



}
