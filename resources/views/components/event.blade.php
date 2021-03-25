<div class="card eventBoxDark" id="{{$event->id}}">
    <div class="card-body">
        <h3 class="card-title">{{$event->date}}: {{$event->title}}</h3>
        {!!$event->description!!} !!!

        @if($event->registrationOpen)
            @component('components.registration')
                @slot('eventId')
                    {{$event->id}}
                @endslot
                @slot('optionVirtual')
                    {{$event->isOnline}}
                @endslot
                @slot('optionOnsite')
                    {{$event->isOnsite}}
                @endslot
            @endcomponent
        @endif

    </div>
</div>
