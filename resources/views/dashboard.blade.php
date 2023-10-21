<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 grid auto-cols-auto grid-flow-row lg:grid-cols-3 gap-5 sm:grid-cols-1 md:grid-cols-1">
        <div class="max-w-xl sm:px-6 lg:px-8 sm:mb-4">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="font-title mb-6 text-3xl">Start direct</h3>
                    <div class="mb-4">
                        <x-button :href="route('generator.create')">{{ __('Nieuwe Tekst') }}</x-button>
                    </div>
                    <div class="mb-4">
                        <x-button :href="route('brands.create')">{{ __('Nieuw Merk') }}</x-button>
                    </div>
                    <div class="mb-4">
                        <x-button :href="route('generator.index')">{{ __('Bekijk alle Teksten') }}</x-button>
                    </div>
                </div>
            </div>
        </div>
        <div class="max-w-xl sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="font-title mb-6 text-3xl">Merken</h3>

                    @foreach($brands as $brand)

                        <a class="block mb-4" href="{{ route('brands.show', $brand->id) }}">{{ $brand->name }}</a>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="max-w-xl sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="font-title mb-6 text-3xl">Teksten</h3>

                    @foreach($generator as $text)

                        <a class="block mb-4" href="{{ route('generator.show', $text->id) }}">{{ $text->product_name }}</a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="grid grid-cols-4 gap-4">
        <div>01</div>
        <!-- ... -->
        <div>09</div>
    </div>
</x-app-layout>
