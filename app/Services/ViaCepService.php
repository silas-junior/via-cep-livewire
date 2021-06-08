<?php


namespace App\Services;


use Illuminate\Support\Facades\Http;

class ViaCepService
{
    private $cep;
    public function __construct($cep)
    {
        $this->cep = $cep;
    }

    public function getLocation()
    {
        $url = Http::get("https://viacep.com.br/ws/{$this->cep}/json/");

        return $url->json();
    }
}
