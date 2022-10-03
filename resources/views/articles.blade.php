<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Blog') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @foreach($articles as $article )
                    <div class="m-2 border-b border-gray-200">
                        <div>
                            titre: {{$article->titre}}
                        </div>
                        <div>
                            description: {{$article->contenu}}
                        </div>
                        <div>
                            par: {{$article->user->name}}
                        </div>
                        @can('article-edit')
                        <div>
                            <a href="/articleEdit/{{$article->id}}">
                                <button>éditer</button>
                            </a>
                        </div>
                        <div>
                            <form action="/articles/{{$article->id}}/delete" method="POST">
                                @csrf
                                @method('DELETE')
                                <button>supprimer</button>
                            </form>
                        </div>
                        @endcan
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
