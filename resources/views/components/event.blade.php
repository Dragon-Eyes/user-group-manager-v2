<div class="card eventBoxLight mt-3" id="{{$event->id}}">
    <div class="card-body">
        <h3 class="card-title">{{$event->dateText}}: {{$event->title}}</h3>
        {!!$event->description!!}

        @if(count($event->registrations) > 0 || $event->is_registration_open)
            <livewire:registration :eventId="$event->id">
        @endif


        @if(count($event->registrations) > 0)
        <h4>Bisher angemeldet (<?= count($event->registrations); ?>)</h4>
        <table>
            @foreach($event->registrations as $registration)
                <tr>
                    <td>{{$registration->name}}</td>
                    <td class="pl-3" style="white-space: pre-wrap;">{{$registration->comment}}</td>
                    <td class="pl-4">{{$registration->placeText}}</td>
                </tr>
            @endforeach
        </table>
        @endif

        @if($event->is_registration_open)
            @component('components.registration')
                @slot('eventId')
                    {{$event->id}}
                @endslot
                @slot('optionVirtual')
                    {{$event->is_online}}
                @endslot
                @slot('optionOnsite')
                    {{$event->is_onsite}}
                @endslot
            @endcomponent
        @endif
    </div>
</div>
