<?php

namespace App\Controller;

use App\Entity\Product;
use App\Repository\ProductRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ProductController extends AbstractController
{
    #[Route('/products', name: 'products')]
    public function displayAllProducts(ProductRepository $repo, PaginatorInterface $paginator, Request $request): Response
    {
        $pagination = $paginator->paginate(
            $repo->findAll(),
            $request->query->getInt('page', 1),
            3
        );

        return $this->render('product/index.html.twig', [
            'products' => $pagination,
            'title' => 'List of products',
        ]);
    }

    #[Route('/product/{id}', name: 'product')]
    public function displayProductById(Product $product, PaginatorInterface $paginator, Request $request): Response
    {
        $pagination = $paginator->paginate(
            [$product],
            $request->query->getInt('page', 1),
            3
        );

        return $this->render('product/index.html.twig', [
            'products' => $pagination,
            'title' => 'One product',
        ]);
    }
}
