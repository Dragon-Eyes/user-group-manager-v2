<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-yellow-50 overflow-hidden shadow-xl sm:rounded-lg p-4">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight mb-2">Zukünftige Events</h2>
                <table class="text-left w-full">
                    <thead class="font-semibold, text-gray-800">
                        <tr>
                            <th class="py-1">Datum</th>
                            <th class="py-1">Titel</th>
                            <th>&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($events as $event)
                            <tr class="py-1">
                                <td class="py-1">{{$event->dateText}}</td>
                                <td class="py-1">{{$event->title}}</td>
                                <td>
{{--                                    <a href="/eventedit/{{$event->id}}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">{{__('Bearbeiten')}}</a>--}}
                                    <a href="/eventedit/{{$event->id}}" class="inline-flex items-center px-2 py-1 bg-gray-300 border border-transparent rounded-md font-semibold text-xs text-gray-800 tracking-widest hover:bg-gray-800 hover:text-gray-100 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">{{__('Bearbeiten')}}</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <a href="{{route('eventcreate')}}" class="inline-flex items-center px-4 py-2 bg-gray-300 border border-transparent rounded-md font-semibold text-xs text-gray-800 tracking-widest hover:bg-gray-800 hover:text-gray-100 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150 mt-4">{{__('Neues Event')}}</a>
            </div>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-4">
            <div class="bg-yellow-50 overflow-hidden shadow-xl sm:rounded-lg p-4">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight mb-2">Anmeldungen</h2>
                <table class="text-left">
                    <thead class="font-semibold, text-gray-800">
                    <tr>
                        <th>Event</th>
                        <th>Name</th>
                        <th>Kommentar</th>
                        <th>&nbsp;</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($events as $event)
                        <tr>
                            <td>{{$event->dateText}}</td>
                            <td></td>
                            <th>&nbsp;</th>
                            <th>&nbsp;</th>
                        </tr>
                        @foreach($event->registrations as $registration)
                            <tr class="hover:bg-gray-100">
                                <th>&nbsp;</th>
                                <td>{{$registration->name}}</td>
                                <td>{{$registration->comment}}</td>
                                <td>
                                    <a href="/registration/{{$registration->id}}/delete" class="inline-flex items-center px-2 py-1 bg-gray-300 border border-transparent rounded-md font-semibold text-xs text-gray-800 tracking-widest hover:bg-gray-800 hover:text-gray-100 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">{{__('Löschen')}}</a>
                                </td>
                            </tr>
                        @endforeach
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-4">
            <div class="bg-green-50 overflow-hidden shadow-xl sm:rounded-lg p-4">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight mb-2">Frühere Events</h2>
                <table class="text-left w-full">
                    <thead class="font-semibold, text-gray-800">
                    <tr>
                        <th class="py-1">Datum</th>
                        <th class="py-1">Titel</th>
                        <th>&nbsp;</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($eventsPast as $event)
                        <tr class="py-1">
                            <td class="py-1">{{$event->dateText}}</td>
                            <td class="py-1">{{$event->title}}</td>
                            <td>
                                {{--                                    <a href="/eventedit/{{$event->id}}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">{{__('Bearbeiten')}}</a>--}}
                                <a href="/eventedit/{{$event->id}}" class="inline-flex items-center px-2 py-1 bg-gray-300 border border-transparent rounded-md font-semibold text-xs text-gray-800 tracking-widest hover:bg-gray-800 hover:text-gray-100 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">{{__('Bearbeiten')}}</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>



        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-6">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight mb-2">Content</h2>
                <x-jet-validation-errors class="mb-4" />
                <form method="POST" action="{{ route('contentsave') }}">
                    @csrf
                    <input type="hidden" name="forum" value="{{$content->forum}}">
                    <input type="hidden" name="intro" value="{{$content->intro}}">
                    <input type="hidden" name="intro" value="{{$content->countdown}}">
                    <div class="mt-4">
                        <x-jet-label for="alert" value="{{ __('Alert') }}" />
                        <textarea id="alert" class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" name="alert">{{$content->alert}}</textarea>
                    </div>
                    <div class="flex items-center justify-end mt-4">
                        <x-jet-button class="ml-4">
                            {{ __('Speichern') }}
                        </x-jet-button>
                    </div>
                </form>

                <x-jet-validation-errors class="mb-4" />
                <form method="POST" action="{{ route('contentsave') }}">
                    @csrf
                    <input type="hidden" name="alert" value="{{$content->alert}}">
                    <input type="hidden" name="forum" value="{{$content->forum}}">
                    <input type="hidden" name="intro" value="{{$content->countdown}}">
                    <div class="mt-4">
                        <x-jet-label for="intro" value="{{ __('Intro') }}" />
                        <textarea id="intro" class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" name="intro">{{$content->intro}}</textarea>
                    </div>
                    <div class="flex items-center justify-end mt-4">
                        <x-jet-button class="ml-4">
                            {{ __('Speichern') }}
                        </x-jet-button>
                    </div>
                </form>

                <x-jet-validation-errors class="mb-4" />
                <form method="POST" action="{{ route('contentsave') }}">
                    @csrf
                    <input type="hidden" name="alert" value="{{$content->alert}}">
                    <input type="hidden" name="intro" value="{{$content->intro}}">
                    <input type="hidden" name="intro" value="{{$content->countdown}}">
                    <div class="mt-4">
                        <x-jet-label for="forum" value="{{ __('Forum') }}" />
                        <textarea id="forum" class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" name="forum">{{$content->forum}}</textarea>
                    </div>
                    <div class="flex items-center justify-end mt-4">
                        <x-jet-button class="ml-4">
                            {{ __('Speichern') }}
                        </x-jet-button>
                    </div>
                </form>

                <x-jet-validation-errors class="mb-4" />
                <form method="POST" action="{{ route('contentsave') }}">
                    @csrf
                    <input type="hidden" name="alert" value="{{$content->alert}}">
                    <input type="hidden" name="intro" value="{{$content->intro}}">
                    <input type="hidden" name="forum" value="{{$content->forum}}">
                    <div class="mt-4">
                        <x-jet-label for="countdown" value="{{ __('Countdown') }}" />
                        <input type="datetime-local" id="countdown" name="countdown" value="{{$content->countdown}}">
                    </div>
                    <div class="flex items-center justify-end mt-4">
                        <x-jet-button class="ml-4">
                            {{ __('Speichern') }}
                        </x-jet-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
