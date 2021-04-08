<div class="card eventBoxLight mt-3" id="{{$event->id}}">
    <div class="card-body">
        <h3 class="card-title">{{$event->dateText}}: {{$event->title}}</h3>
        {!!$event->description!!}

        @if(count($event->registrations) > 0 || $event->is_registration_open)
            <livewire:registration :eventId="$event->id" :presence="$event->presence">
        @endif

    </div>
</div>
