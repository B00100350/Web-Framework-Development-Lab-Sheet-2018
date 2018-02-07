<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Product;
use App\Entity\Category;
use App\Repository\ProductRepository;

class ProductController extends Controller
{
    /**
     * @Route("/product/create/{description}/{price}", name="product_create")
     */
    public function createAction($description, $price)
    {
        // create new product object
        $product = new Product();
        $product->setDescription($description);
        $product->setPrice($price);

        // this will do for now
        $category = new Category();
        $category->setName('deafult');

        $product->setCategory($category);

        // persist (save/store) this object's contents to the database
        $em = $this->getDoctrine()->getManager();
        $em->persist($product);
        $em->persist($category);
        $em->flush();


        return $this->redirectToRoute('product_show', [
            'id' => $product->getId()
        ]);
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
