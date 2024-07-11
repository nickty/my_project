<?php

namespace App\Controller;

use App\Entity\Order;
use App\Repository\OrderRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

#[Route('/api/orders')]
class OrderController extends AbstractController
{
    #[Route('', name: 'order_list', methods: ['GET'])]
    public function list(OrderRepository $orderRepository, SerializerInterface $serializer): JsonResponse
    {
        $orders = $orderRepository->findAll();

        // Use the serializer with the custom normalizer
        $data = $serializer->normalize($orders, null, []);

        return new JsonResponse($data);
    }
}
