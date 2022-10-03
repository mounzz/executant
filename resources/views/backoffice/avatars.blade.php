<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ajouter un avatar') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <form action="/avatars/store" method="POST" enctype='multipart/form-data'>
                        @csrf
                        <input type="text" placeholder="nom de l'avatar" name="name">
                        <input type="file" name="url">
                        <button>envoyer</button>
                    </form>

                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        {{ __('Liste des avatars') }}
                    </h2>
                    @foreach ($avatars as $avatar)
                        <div>
                            <div>
                                {{ $avatar->name }}
                                <img src="{{ asset('storage/avatars/' . $avatar->url) }}" alt="">
                            </div>
                            <form action="/avatars/{{ $avatar->id }}/delete" method="POST">
                                @csrf
                                @method('DELETE')
                                <button>delete</button>
                            </form>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
