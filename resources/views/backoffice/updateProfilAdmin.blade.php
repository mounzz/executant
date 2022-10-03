<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Update profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="/updateProfilAdmin/{{$user->id}}/update" method="POST">
                        @csrf
                        @method('PUT')
                    <img src="{{ asset('storage/avatars/' . $user->avatar->url) }}" alt=""
                    class='w-28 h-28 object-cover rounded-full'>
                    <input name="name" type="text" placeholder="name" value="{{$user->name}}">
                    <input name="lastName" type="text" placeholder="last name" value="{{$user->lastName}}">
                    <input name="age" type="text" placeholder="age" value="{{$user->age}}">
                    <input name="email" type="text" placeholder="email" value="{{$user->email}}">
                    <select name="avatar_id" id="Avatar">
                        <option value=""></option>
                        @foreach ($avatars as $avatar)
                            <option value="{{$avatar->id}}">{{$avatar->name}}</option>
                        @endforeach
                    </select>
                    @can('profil-edit')
                    <select name="role_id" id="role">
                        @foreach ($roles as $role )
                        <option value="{{$role->id}}">{{$role->role}}</option>
                        @endforeach
                    </select>
                    @endcan
                        <button type="submit">update</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>

