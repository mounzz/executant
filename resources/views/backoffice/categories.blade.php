<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ajouter une catégorie') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <form action="/categorie/store" method="POST">
                        @csrf
                        <input type="text" name="name" placeholder="nom de la catégorie">
                        <button>ajouter</button>
                    </form>
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        {{ __('Afficher les catégories') }}
                    </h2>

                    @foreach ($categories as $categorie)
                        <div>
                            {{ $categorie->name }}
                            <form action="/categorie/{{ $categorie->id }}/delete" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit">supprimer</button>
                            </form>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
