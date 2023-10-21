<style>
    #loader {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        width: 100%;
        background: rgba(0,0,0,1) url("https://media1.giphy.com/media/cnzP4cmBsiOrccg20V/giphy.gif?cid=ecf05e47v7ure0mpcvrj9nfdp57rooj22phaph2ci7kycba0&ep=v1_gifs_related&rid=giphy.gif&ct=g") no-repeat center center;
        z-index: 99999;
    }
</style>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Teksten') }}
        </h2>
    </x-slot>
    <div id="loader"></div>
    <div style="display: block; margin-left:auto; margin-right:auto; max-width: 600px;" class="container  text-white py-4 px-4 max-w-3xl">
        <h1 class="title">Genereer een tekst</h1>
        <p class="body">Vul hieronder de benodige product gegevens in en genereer een tekst.</p>
        <form method="post" action="{{ route('generator.store') }}" id="frmSubmit" enctype="multipart/form-data">
            @csrf
            <!-- Productnaam -->
            <div class="mt-3">
                <x-input-label for="name" :value="__('Productnaam')" />
                <x-text-input id="product_name" placeholder="bijvoorbeeld Opinel n09" class="block mt-1 w-full" type="text" name="product_name" :value="old('name')" required autofocus />
                <x-input-error :messages="$errors->get('product_name')" class="mt-2" />
            </div>
            <!-- Productnaam -->
            <div class="mt-3">
                <x-input-label for="name" :value="__('Product categorie')" />
                <x-text-input id="product_category" placeholder="Bijvoorbeeld Zakmes" class="block mt-1 w-full" type="text" name="product_category" :value="old('name')" required autofocus />
                <x-input-error :messages="$errors->get('product_category')" class="mt-2" />
            </div>
            <!-- Description -->
            <div class="mt-3">
                <x-input-label for="title" :value="__('Omschrijving')" />
                <x-textarea id="description" placeholder="Vul hier een korte omschrijving of een aantal kenmerken van je product in" name="description" value=""></x-textarea>
                <x-input-error :messages="$errors->get('description')" class="mt-2" />
            </div>
            <!-- Brand -->
            <div class="mt-3">
                <x-input-label for="brand" :value="__('Voor welk merk is deze tekst')" />
                <select class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full" name="brand">
                    @foreach ($brands as $brand)
                        <option value="{{ $brand->id }}" @selected(old('version') == $brand->name)>
                            {{ $brand->name }}
                        </option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('brand')" class="mt-2" />
            </div>

            <!-- Tone -->
            <div class="mt-3">
                <x-input-label for="words" :value="__('Aantal woorden')" />
                <select class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full" name="words">

                        <option value="100">100 woorden (1 coin)</option>
                        <option value="200">200 woorden (1 coin)</option>
                        <option value="300">300 woorden (1 coin)</option>
                        <option value="500">500 woorden (2 coins)</option>
                        <option value="750">750 woorden (2 coins)</option>
                        <option value="1000">1000 woorden (3 coins)</option>

                </select>
                <x-input-error :messages="$errors->get('words')" class="mt-2" />
            </div>

            <x-primary-button class="mt-6">
                {{ __('Genereer tekst') }}
            </x-primary-button>
        </form>
    </div>

    <script>
        window.onload = function () {
            document.getElementById("frmSubmit").onsubmit = function onSubmit(form) {
                document.getElementById('loader').style.display="block";
            }}
    </script>
</x-app-layout>
