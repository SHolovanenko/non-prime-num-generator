<?php

namespace App\Http\Controllers;

use App\Http\Requests\RetrieveNumberRequest;
use App\Models\Number;
use App\Services\NumGenerationService;
use Illuminate\Http\Request;

class NumGenerationController extends Controller
{
    /** @var NumGenerationService */
    private $numGenerationService;

    /**
     * @param NumGenerationService $numGenerationService
     */
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

    /**
     * Retrieve number
     * @param Number $number
     * @return NumberResource
     */
    public function retrieve(Number $number) 
    {
        $result = $this->NumGenerationService()->getNumber($number);
        return $result;
    }

    /**
     * Generate non prime number
     * @return NumberResource
     */
    public function generate() 
    {
        $result = $this->NumGenerationService()->generateNonPrimeNumber();
        return $result;
    }
}
