<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ajouter une image') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="/images/store" enctype="multipart/form-data" method="POST">
                        @csrf
                        <select name="categorie_id" id="">
                            @foreach ($categories as $categorie)
                                <option value="{{ $categorie->id }}">{{ $categorie->name }}</option>
                            @endforeach
                        </select>
                        <input type="file" name="url">
                        <button type="submit">ajouter une image</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
