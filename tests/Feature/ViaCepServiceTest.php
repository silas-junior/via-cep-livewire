<?php

namespace Tests\Feature;

use App\Services\ViaCepService;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class ViaCepServiceTest extends TestCase
{
    protected $cep;
    protected $url;
    protected $service;

    protected function setUp(): void
    {
        parent::setUp();
        $this->cep = '04476-130';
        $this->url = Http::get("https://viacep.com.br/ws/{$this->cep}/json/");
        $this->service = new ViaCepService($this->cep);
    }

    public function testResponseOk()
    {
        $this->assertSame(200, $this->url->status());
    }

    public function testIsArray()
    {
        $this->assertTrue(Arr::accessible($this->url->json()));
    }

    public function testIsViaCepServiceWorking()
    {
        $location = $this->service->getLocation();
        $this->assertSame($this->cep, $location['cep']);
    }
}
