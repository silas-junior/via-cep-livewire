<div>
{{--    <form action="" wire:submit.prevent="searchAddress">--}}
        <div class="flex min-h-screen flex-col items-center justify-center bg-blue-100">
            <div class="flex flex-col w-1/3 bg-white p-4 rounded-md items-center">
                <h1 class="uppercase font-medium">Procure seu cep</h1>

                <input
                    name="cep"
                    id="cep"
                    placeholder="00000-000"
                    wire:model="inputCep"
                    type="text"
                    class="{{ $errors->get('inputCep') ? 'border-red-500' : '' }} w-full border-2 border-gray-50 rounded-md p-2 my-2"
                />
                @error('inputCep') <span class="error text-red-600">{{ $message }}</span> @enderror
                <button
                    class="flex flex-col lg:flex-row items-center bg-blue-200 hover:bg-blue-100 p-4 mt-6 border-gray-50 rounded-md uppercase"
                    type="submit"
                    wire:click.prevent="searchAddress"
                >
                    <div class="flex flex-row" id="btnContent">
                        <span class="mr-2">Procurar</span>
                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                             stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                    </div>

                    <div class="hidden flex-col items-center justify-center" id="loading">
                        <svg class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                             viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                    stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor"
                                  d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                    </div>
                </button>
            </div>

            <div
                class="{{ $data < 1 ? 'hidden ' : '' }} transition-all flex-col w-1/3 bg-white p-4 rounded-md items-start mt-8"
                id="result">
                <div class="flex flex-row items-center">
                    <h3 class="font-bold mr-2">Endereço:</h3>
                    <p id="address">{{ $data['logradouro'] ?? '' }}</p>
                </div>
                <div class="flex flex-row items-center">
                    <h3 class="font-bold mr-2">Bairro:</h3>
                    <p id="neighborhood">{{ $data['bairro'] ?? '' }}</p>
                </div>
                <div class="flex flex-row items-center">
                    <h3 class="font-bold mr-2">Cidade:</h3>
                    <p id="city">{{ $data['localidade'] ?? '' }}</p>
                </div>
                <div class="flex flex-row items-center">
                    <h3 class="font-bold mr-2">Estado:</h3>
                    <p id="state">{{ $data['uf'] ?? '' }}</p>
                </div>
                <div class="flex flex-row items-center">
                    <h3 class="font-bold mr-2">Cep:</h3>
                    <p id="cep">{{ $data['cep'] ?? '' }}</p>
                </div>
            </div>
            @if(session()->has('message'))
                <div
                    class="flex items-center justify-center delay-1000 ease-in-out transition-all flex-row items-center text-white w-1/3 bg-red-400 rounded-md mt-5"
                >
                    {{ session('message') }}
                </div>
            @endif
        </div>
</div>
