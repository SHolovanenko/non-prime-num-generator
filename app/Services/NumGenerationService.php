<?php

namespace App\Services;

use App\Http\Resources\NumberResource;
use App\Models\Number;

class NumGenerationService extends BaseService
{
    const LIMIT_GENERATION = 1000000;

    public function getNumber(Number $number) {
        return new NumberResource($number);
    }

    public function generateNonPrimeNumber() {
        $number = new Number();
        $generation = null;

        do {
            $generation = rand(1, self::LIMIT_GENERATION);
        } while (gmp_prob_prime($generation) > 0);

        $number->generated_number = $generation;
        $number->save();

        return new NumberResource($number);
    }
}
