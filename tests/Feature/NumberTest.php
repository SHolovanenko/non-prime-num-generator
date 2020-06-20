<?php

namespace Tests\Feature;

use App\Http\Controllers\NumGenerationController;
use App\Http\Resources\NumberResource;
use App\Models\Number;
use App\Services\NumGenerationService;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class BookTest extends TestCase
{
    private $controller;

    public function __construct()
    {
        parent::__construct();
        $service = new NumGenerationService();
        $this->controller = new NumGenerationController($service);
    }

    public function setUp(): void
    {
        parent::setUp();
        self::initDB();
    }

    protected static function initDB() {
        Artisan::call('migrate');
    }

    public function testGenerateNumber() {
        $result = $this->controller->generate();

        $this->assertDatabaseHas('numbers', [
            'id' => $result->id
        ]);

        $this->assertEquals(0, gmp_prob_prime($result->generated_number));
    }

    public function testRetrieveNumber() {
        $result = $this->controller->generate();

        $this->assertDatabaseHas('numbers', [
            'id' => $result->id
        ]);

        $number = new Number();
        $number->id = $result->id;

        $result = $this->controller->retrieve($number);

        $this->assertInstanceOf(NumberResource::class, $result);

        $this->assertEquals($number->id, $result->id);
    }

}