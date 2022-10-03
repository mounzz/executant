<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User List') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    @foreach ($users as $user)
                        <div>
                            <img src="{{ asset('storage/avatars/' . $user->avatar->url) }}" alt=""
                                class='w-28 h-28 object-cover rounded-full'>
                            {{ $user->name }}
                            {{ $user->lastName }}
                            {{ $user->age }}
                            {{ $user->email }}
                            <a href="/updateProfilAdmin/{{ $user->id }}">
                                <button>editer</button>
                            </a>

                            <form action="/userlist/{{ $user->id }}/delete" method="POST">
                                @csrf
                                @method('DELETE')
                                <button>supprimer</button>
                            </form>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
