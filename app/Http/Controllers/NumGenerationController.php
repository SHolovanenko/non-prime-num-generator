<?php

namespace App\Http\Controllers;

use App\Http\Requests\RetrieveNumberRequest;
use App\Models\Number;
use App\Services\NumGenerationService;
use Illuminate\Http\Request;

class NumGenerationController extends Controller
{
    private $numGenerationService;

    public function __construct(NumGenerationService $numGenerationService)
    {
        $this->numGenerationService = $numGenerationService;
    }

    /**
     * @return NumGenerationService
     */
    private function NumGenerationService() 
    {
        return $this->numGenerationService;
    }

    public function retrieve(Number $number) 
    {
        $result = $this->NumGenerationService()->getNumber($number);
        return $result;
    }

    public function generate() 
    {
        $result = $this->NumGenerationService()->generateNonPrimeNumber();
        return $result;
    }
}
