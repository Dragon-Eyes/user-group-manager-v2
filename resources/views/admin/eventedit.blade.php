<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Event bearbeiten') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4">
                <x-jet-validation-errors class="mb-4" />
                <form method="POST" action="{{ route('eventsave') }}">
                    @csrf

                    <input type="hidden" name="event_id" value="{{$event->id}}">

                    <div>
                        <x-jet-label for="date" value="{{ __('Datum') }}" />
                        <x-jet-input id="date" class="block mt-1" type="date" name="date" value="{{$event->date}}" required autofocus />
                    </div>

                    <div class="mt-4">
                        <x-jet-label for="is_own_event" value="{{ __('FM Zürich Event') }}" />
                        <input type="checkbox" id="is_own_event" name="is_own_event" value="{{$event->is_own_event}}" @if($event->is_own_event) checked @endif>
                    </div>

                    <div class="mt-4">
                        <x-jet-label for="title" value="{{ __('Titel') }}" />
                        <x-jet-input id="title" class="block mt-1 w-full" type="text" name="title" value="{{$event->title}}" required />
                    </div>

                    <div class="mt-4">
                        <x-jet-label for="description" value="{{ __('Beschreibung') }}" />
                        <textarea id="description" class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" name="description">{{$event->description}}</textarea>
                    </div>

                    <div class="mt-4">
                        <x-jet-label for="is_online" value="{{ __('virtuell') }}" />
                        <input type="checkbox" id="is_online" name="is_online" value="{{$event->is_online}}" @if($event->is_online) checked @endif>
                        <x-jet-label for="is_onsite" value="{{ __('vor Ort') }}" />
                        <input type="checkbox" id="is_onsite" name="is_onsite" value="{{$event->is_onsite}}" @if($event->is_onsite) checked @endif>
                    </div>

                    <div class="mt-4">
                        <x-jet-label for="is_registration_open" value="{{ __('Registration offen') }}" />
                        <input type="checkbox" id="is_registration_open" name="is_registration_open" value="{{$event->is_registration_open}}" @if($event->is_registration_open) checked @endif>
                    </div>

                    <div class="mt-4">
                        <x-jet-label for="is_claris" value="{{ __('Thema Claris') }}" />
                        <input type="checkbox" id="is_claris" name="is_claris" value="{{$event->is_claris}}" @if($event->is_claris) checked @endif>
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
