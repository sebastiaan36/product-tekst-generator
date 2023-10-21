<x-app-layout>
    <x-slot name="header">
        <h2 class="font-body font-normal text-3xl tracking-widest text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Merken') }}
        </h2>
    </x-slot>
    <div class="container max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <div class="flex items-center gap-4 mb-6">
            <x-button :href="route('brands.create')">{{ __('Nieuw merk') }}</x-button>
        </div>
    <h1 class="font-title text-3xl text-white my-8">Jouw Merken ({{$allbrands->count()}})</h1>
    <table style="width: 100%" class="table-auto text-white">
        <thead class="text-left">
            <tr class="">
                <th class="p-2">Naam</th>
                <th class="p-2">Aangemaakt</th>
                <th class="p-2">Bewerk</th>
            </tr>
        </thead>

        @foreach($allbrands as $brands)
            <tr class="hover:bg-gray-700">

                <td class="font-body p-2 table-cell"> {{ $brands->name }} </td>
                <td class="font-body p-2 table-cell"> {{ $brands->created_at->diffForHumans()  }}</td>
                <td class="font-body p-2 table-cell"><a href="{{ route('brands.edit', $brands->id) }}">edit</a></td>
            </tr>

        @endforeach

    </table>
    </div>

</x-app-layout>
