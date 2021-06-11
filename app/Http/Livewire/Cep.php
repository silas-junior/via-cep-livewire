<?php

namespace App\Http\Livewire;

use App\Services\ViaCepService;
use Livewire\Component;

class Cep extends Component
{
    public $inputCep;
    public $data;
    protected $rules = [
        'inputCep' => 'required|min:8'
    ];
    protected $messages = [
        'inputCep.required' => 'CEP obrigatório!',
        'inputCep.min' => 'CEP inválido!',
    ];

    public function searchAddress()
    {
        $this->validate();
        $service = new ViaCepService($this->inputCep);

        $service->getLocation()
            ? $this->data = $service->getLocation()
            : $this->inputCep = '';
        $this->inputCep = '';
    }

    public function render()
    {
        return view('livewire.cep');
    }
}
