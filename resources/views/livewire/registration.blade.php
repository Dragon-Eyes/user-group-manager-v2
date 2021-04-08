<div>

    <p>Livewire component here</p>

    @if($registrationCount > 0)
        <h4>Bisher angemeldet ({{$registrationCount}})</h4>
        <table>
            @foreach($registrations as $registration)
                <tr>
                    <td>{{$registration->name}}</td>
                    <td class="pl-3" style="white-space: pre-wrap;">{{$registration->comment}}</td>
                    <td class="pl-4">{{$registration->placeText}}</td>
                </tr>
            @endforeach
        </table>
    @endif

    @if($event->is_registration_open && !$registered)
        <h4 style="margin-top: 20px;">Anmelden</h4>

        <form wire:submit.prevent="submit">
            @csrf
{{--            <input type="hidden" name="event_id" value="{{$eventId}}">--}}
            <div class="row">
                <div class="col">
                    <input type="text" class="form-control" name="name" placeholder="Name **" required wire:model="name">
                </div>
                <div class="col">
                    <button type="submit" class="btn btn-danger">anmelden</button>
                </div>
            </div>
            <div class="row" style="margin-top: 5px; margin-left: -6px; padding-left: 0;">
                <div class="col">
                    @if($event->is_online)
                        <input type="radio" id="virtual" name="presence" value="virtual" checked wire:model="presence">
                        <label for="registration[presence]">virtuell</label>
                    @endif
                    @if($event->is_onsite)
                        <input type="radio" id="onsite" name="presence" value="onsite" wire:model="presence"
                               @if(!$event->is_online)
                                checked
                               @endif
                        >
                        <label for="registration[presence]">vor Ort</label>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <input type="email" class="form-control" name="email" placeholder="E-Mail Adresse" wire:model="email">
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <textarea class="form-control" name="comment" rows="3" placeholder="Bemerkungen, Themenvorschläge etc." wire:model="comment"></textarea>
                </div>
            </div>
        </form>
    @endif
    @if($registered)
        <p style="margin-top: 20px;"><strong>Super, dass Du kommst!</strong><br>Wie wäre es mit einem Vortrag von Dir?  ;-)</p>
    @endif
</div>
