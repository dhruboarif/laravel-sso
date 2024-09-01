<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Clients') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    Here are list of clients:

                    @foreach ($clients as $client)
                        <div class="div">
                            <h1>Client ID: {{ $client->id}}</h1>

                            <h1>Client name: {{ $client->name}}</h1>
                            <h3>
                                <p> {{ $client->redirect}}</p>
                                <p> {{ $client->secret}}</p>

                            </h3>
                        </div>
                    @endforeach
                </div>

                <div>
                    <div class="flex justify-end py-6 px-4 sm:px-6 border-t border-gray-200 sm:border-b">
                        <form action="{{ route('passport.clients.store')}}" method="post"> 
                            <div>
                                @csrf
                                <label for="name" class="block text-sm font-medium text-gray-700">
                                   Name
                                </label>
                                <input type="text" name="name">
                                <label for="redirect" class="block text-sm font-medium text-gray-700">
                                    Redirect URL:
                                </label>
                                <input type="text" name="redirect">
                                <button type="submit">Submit</button>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
