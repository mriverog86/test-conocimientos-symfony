<?php

namespace App\Controller;

use App\Service\SumCalculator;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

class SumCalculatorController extends AbstractController
{
    /**
     * Devuelve un un objeto JSON conteniendo el resultado de la suma de los dós parámetros
     */
    #[Route('/sum/{first}/{second}', name: 'app_sum_calculator')]
    public function index($first, $second, SumCalculator $calculator): JsonResponse
    {
        return new JsonResponse([
            'value' => $calculator->sum($first, $second)
        ]);
    }
}
