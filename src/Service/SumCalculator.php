<?php

namespace App\Service;

/**
 * Servicio para sumar dos números
 */
class SumCalculator
{
    /** Devuelve el resultado de la suma de los dos números pasados por parámetro
     *
     * @param $first double Primer sumando
     * @param $second double Segundo sumando
     *
     * @return
     */
    public function sum($first, $second)
    {
        if(!is_numeric($first)){
            throw new \Exception("El parámetro first debe ser un número.");
        }
        $first = (double)$first;

        if(!is_numeric($second)){
            throw new \Exception("El parámetro second debe ser un número.");
        }
        $second = (double)$second;

        return $first + $second;
    }
}
