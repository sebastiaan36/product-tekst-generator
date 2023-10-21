<x-app-layout>
    <x-slot name="header">
        <h2 class="font-body font-normal text-3xl tracking-widest text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Teksten') }}
        </h2>
    </x-slot>
    <div class="container max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">

        <div class="flex items-center gap-4 mb-6">
            <x-button :href="route('generator.create')">{{ __('Nieuwe tekst') }}</x-button>
        </div>

        <h1 class="font-title text-3xl text-white my-8">Jouw teksten ({{$generator->count()}})</h1>
        <table style="width: 100%" class="table-auto text-white">
            <thead class="text-left">
            <tr class="">
                <th class="p-2">Product naam</th>
                <th class="p-2">Merk</th>
                <th class="p-2">Doel</th>
                <th class="p-2">Aangemaakt</th>
            </tr>
            </thead>

            @foreach($generator as $text)
                <tr class="hover:bg-gray-700">

                    <td class="font-body p-2 table-cell"><a href="{{ route('generator.show', $text->id) }}"> {{ $text->product_name }} </a></td>
                    <td class="font-body p-2 table-cell"> {{ $text->brands->name}} </td>
                    <td class="font-body p-2 table-cell"> {{ $text->brands->goal }} </td>
                    <td class="font-body p-2 table-cell"> {{ $text->created_at->diffForHumans()  }}</td>
                </tr>

            @endforeach

        </table>
    </div>

</x-app-layout>
