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

    #[Route('/getFine', methods: ['POST'])]
    public function getFine(Request $request, FinesRepository $finesRepo): JsonResponse
    {
        $dataPost = $request->getPayload();
        $idNumbers = $dataPost->get('id_numbers');

        if ($this->verifCodeFine($idNumbers)) {
            $idNumbersValid = $idNumbers;
            $getFine = $finesRepo->findOneBy(['id_numbers' => $idNumbersValid]);
            if ($getFine) {
                $price = $getFine->getPrice();
                $data = [
                    "message" => "The fine was found",
                    "price" => $price
                ];
            } else {
                $data =
                    [
                        "message" => "This identifier does not exist"
                    ];
            }
        } else {
            $data = [
                "message" => "The format of the fine identifier is not correct"
            ];
        }
        return $this->json($data);
    }

    // #[Route('/payment', methods: ['POST'])]
    // public function paymentFine(Request $request, FinesRepository $finesRepo): JsonResponse
    // {
    //     $dataPost = $request->getPayload();





    //     // return $this->json($data);
    // }
}
