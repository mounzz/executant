<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editer votre article') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <div>
                        <form action="/articleEdit/{{ $article->id }}/update" method="POST">
                            <div>
                                titre: <input type="text" name="titre" id="" value="{{ $article->titre }}">

                            </div>
                            <div>
                                description:
                                <textarea name="contenu" id="" cols="30" rows="10" value="{{ $article->contenu }}">{{ $article->contenu }}</textarea>

                            </div>
                            <div>
                                par: {{ $article->user->name }}
                            </div>
                            <div>

                                @csrf
                                @method('PUT')
                                <button>
                                    update
                                </button>

                            </div>
                        </form>
                    </div>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
