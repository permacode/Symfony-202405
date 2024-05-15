<?php

namespace App\Controller;

use App\Repository\ProductRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\BrowserKit\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ProductController extends AbstractController
{
    static array $products = [
        [
            'id' => 1,
            'name' => 'Iphone 13',
            'price' => 999.99,
            'description' => 'Apple iPhone 13 Pro 256 Go Bleu Pacifique',
            'category' => 'smartphone',
        ],
        [
            'id' => 2,
            'name' => 'Samsung Galaxy S21',
            'price' => 899.99,
            'description' => 'Samsung Galaxy S21 5G 128 Go Double SIM Noir Phantom',
            'category' => 'smartphone',
        ],
        [
            'id' => 3,
            'name' => 'Huawei P40',
            'price' => 799.99,
            'description' => 'Huawei P40 Pro 5G 256 Go Double SIM Noir',
            'category' => 'smartphone',
        ],
        [
            'id' => 4,
            'name' => 'MacBook Pro',
            'price' => 1299.99,
            'description' => 'Apple MacBook Pro 13" 256 Go SSD 8 Go RAM Intel Core i5 quadricœur à 1,4 GHz Argent',
            'category' => 'laptop',
        ]
    ];
    #[Route('/products', name: 'products')]
    public function displayAllProducts(ProductRepository $repo): Response
    {
        return $this->render('product/index.html.twig', [
            'products' => $repo->findAll(),
        ]);
    }

    #[Route('/product/{id}', name: "product")]
    public function displayProductById(int $id, ProductRepository $repo): Response
    {
        // $returnedProduct = [];
        // if (!!$id) {
        //     foreach (self::$products as $product) {
        //         if ($product['id'] === $id) {
        //             $returnedProduct = $product;
        //         }
        //     }

        //     return $this->json($returnedProduct);
        // } else {
        //     return $this->json("Cette option  n'est pas disponible.");
        // }
        // return $this->json(array_filter(self::$products, fn ($product): bool => $id === $product['id']));
        // $data = (new ArrayCollection(self::$products))
        //     ->findFirst(fn (int $key, array $product): bool =>
        //     $id === $product['id']);

        $product = $repo->findById($id);
        return $this->render('product/index.html.twig', [
            'products' => $product
        ]);
    }
}
