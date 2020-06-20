<?php

namespace App\Http\Controllers;

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

    public function retrieve($id) 
    {
        $result = $this->NumGenerationService()->getNumberById($id);
        return $result;
    }

    public function generate() 
    {
        $result = $this->NumGenerationService()->generateNonPrimeNumber();
        return $result;
    }
}
