<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Neues Event') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4">
                <x-jet-validation-errors class="mb-4" />

                <form method="POST" action="{{ route('eventsavenew') }}">
                    @csrf

                    <div>
                        <x-jet-label for="date" value="{{ __('Datum') }}" />
                        <x-jet-input id="date" class="block mt-1" type="date" name="date" :value="old('date')" required autofocus />
                    </div>

                    <div class="mt-4">
                        <x-jet-label for="is_own_event" value="{{ __('FM Zürich Event') }}" />
                        <input type="checkbox" id="is_own_event" name="is_own_event" :value="old('is_own_event')" checked>
                    </div>

                    <div class="mt-4">
                        <x-jet-label for="title" value="{{ __('Titel') }}" />
                        <x-jet-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" required />
                    </div>

                    <div class="mt-4">
                        <x-jet-label for="description" value="{{ __('Beschreibung') }}" />
                        <textarea id="description" class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" name="description">{{old('description')}}</textarea>
                    </div>

                    <div class="mt-4">
                        <x-jet-label for="is_online" value="{{ __('virtuell') }}" />
                        <input type="checkbox" id="is_online" name="is_online" :value="old('is_online')" checked>
                        <x-jet-label for="is_onsite" value="{{ __('vor Ort') }}" />
                        <input type="checkbox" id="is_onsite" name="is_onsite" :value="old('is_onsite')" checked>
                    </div>

                    <div class="mt-4">
                        <x-jet-label for="is_registration_open" value="{{ __('Registration offen') }}" />
                        <input type="checkbox" id="is_registration_open" name="is_registration_open" :value="old('is_registration_open')">
                    </div>

                    <div class="mt-4">
                        <x-jet-label for="is_claris" value="{{ __('Thema Claris') }}" />
                        <input type="checkbox" id="is_claris" name="is_claris" :value="old('is_claris')">
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
