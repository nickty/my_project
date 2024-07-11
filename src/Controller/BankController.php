<?php

namespace App\Controller;

use App\Entity\Bank;
use App\Repository\BankRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;

#[Route('/api/banks')]
class BankController extends AbstractController
{
    #[Route('', name: 'bank_create', methods: ['POST'])]
    public function create(Request $request, EntityManagerInterface $em, SerializerInterface $serializer): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        $bank = new Bank();
        $bank->setName($data['name']);
        $bank->setBranch($data['branch']);
        $bank->setRoutingNumber($data['routing_number']);
        $bank->setShortCode($data['short_code']);
        $bank->setActive($data['active']);

        $em->persist($bank);
        $em->flush();

        $json = $serializer->serialize($bank, 'json', ['groups' => 'bank_read']);

        return new JsonResponse($json, JsonResponse::HTTP_CREATED, [], true);
    }

    #[Route('', name: 'bank_list', methods: ['GET'])]
    public function list(BankRepository $bankRepository, SerializerInterface $serializer): JsonResponse
    {
        $banks = $bankRepository->findAll();
        $json = $serializer->serialize($banks, 'json', ['groups' => 'bank_read']);

        return new JsonResponse($json, JsonResponse::HTTP_OK, [], true);
    }

    #[Route('/{id}', name: 'bank_show', methods: ['GET'])]
    public function show(Bank $bank, SerializerInterface $serializer): JsonResponse
    {
        $json = $serializer->serialize($bank, 'json', ['groups' => 'bank_read']);

        return new JsonResponse($json, JsonResponse::HTTP_OK, [], true);
    }

    #[Route('/{id}', name: 'bank_update', methods: ['PUT'])]
    public function update(Request $request, Bank $bank, EntityManagerInterface $em, SerializerInterface $serializer): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        $bank->setName($data['name']);
        $bank->setBranch($data['branch']);
        $bank->setRoutingNumber($data['routing_number']);
        $bank->setShortCode($data['short_code']);
        $bank->setActive($data['active']);

        $em->flush();

        $json = $serializer->serialize($bank, 'json', ['groups' => 'bank_read']);

        return new JsonResponse($json, JsonResponse::HTTP_OK, [], true);
    }

    #[Route('/{id}', name: 'bank_delete', methods: ['DELETE'])]
    public function delete(Bank $bank, EntityManagerInterface $em): JsonResponse
    {
        $em->remove($bank);
        $em->flush();

        return new JsonResponse(null, JsonResponse::HTTP_NO_CONTENT);
    }
}
