{{--<div class="card eventBoxDark" id="{{$event->id}}">
    <div class="card-body">
        <h3 class="card-title">{{$event->date}}: {{$event->title}}</h3>
        {!!$event->description!!}


        @foreach($attachments as $attachment)
            @component('components.attachment')
                @slot('url')
                    {{$attachment->url}}
                @endslot
                @slot('caption')
                    {{$attachment->caption}}
                @endslot
            @endcomponent
        @endforeach
    </div>
</div>--}}
