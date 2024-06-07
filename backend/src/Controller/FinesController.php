<?php

namespace App\Controller;

use App\Repository\FinesRepository;
use App\Services\VerifCodeFine;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;

class FinesController extends AbstractController
{
    use VerifCodeFine;

    #[Route('/checkFine', methods: ['POST', 'GET'])]
    public function index(Request $request, FinesRepository $finesRepo): JsonResponse
    {
        $data = $request->getPayload();
        $idNumbers = $data->get('id_numbers');
        $getIdFine = $finesRepo->findOneBy(["id_numbers" => $idNumbers]);
        if ($getIdFine) {
        }
        $return =
            [
                "data" => "OK",
                "info" => "BAD"

            ];


        return $this->json($return);
    }
}
