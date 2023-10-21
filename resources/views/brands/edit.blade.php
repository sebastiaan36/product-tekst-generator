<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Merken') }}
        </h2>
    </x-slot>
    <div style="display: block; margin-left:auto; margin-right:auto; max-width: 600px;" class="container  text-white py-4 px-4 max-w-3xl">
        <h1 class="title">Merk updaten </h1>
        <p class="body">Maak hieronder een merk aan. Je kan er voor kiezen meerdere merken aan te maken. Zo kan je voor elk merk een andere merkomschrijving mee geven en een andere tone of voice.</p>
        <form method="post" action="{{ route('brands.update', $brands->id) }}" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <!-- name -->
            <div class="mt-3">

                <x-input-label for="name" :value="__('Merknaam')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{$brands->name}}" required autofocus />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>
            <!-- Description -->
            <div class="mt-3">
                <x-input-label for="@description"  />
                <x-textarea id="description" placeholder="Vul hier een korte omschrijving van je merk in" value="{{ $brands->description }}" name="description"></x-textarea>
                <x-input-error :messages="$errors->get('description')" class="mt-2" />
            </div>
            <!-- Goal -->
            <div class="mt-3">
                <x-input-label for="goal" " />
                <x-text-input placeholder="Bijvoorbeeld: Overtuigen, SEO, informeren" id="goal" class="block mt-1 w-full" type="text" value="{{ $brands->goal }}" name="goal"  required autofocus />
                <x-input-error :messages="$errors->get('goal')" class="mt-2" />
            </div>

            <!-- Tone -->
            <div class="mt-3">
                <x-input-label for="tone"  />
                <x-text-input placeholder="Bijvoorbeeld: Informeel, Vrolijk, Enthousiast" id="tone" class="block mt-1 w-full" type="text" name="tone" value="{{ $brands->tone }}" required autofocus />
                <x-input-error :messages="$errors->get('tone')" class="mt-2" />
            </div>

            <x-primary-button class="mt-6">
                {{ __('Update') }}
            </x-primary-button>
        </form>
    </div>
</x-app-layout>
