<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gallery') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">


                    @foreach ($images as $image)
                        <div>
                            <img src="{{ asset('storage/images/' . $image->url) }}" alt="">

                            <a href="/download/{{ $image->id }}">
                                <button>télécharger</button>
                            </a>
                            @can('profil-edit')
                            <form action="/galerie/{{ $image->id }}/delete" method="POST">
                                @csrf
                                @method('DELETE')
                                <button>supprimer</button>
                            </form>
                            @endcan
                        </div>
                    @endforeach
                </div>
                {{$images->links()}}
            </div>
        </div>
    </div>
</x-app-layout>
