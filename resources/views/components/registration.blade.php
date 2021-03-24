<h4>Anmelden</h4>
<form action="<?= ROOT_WWW ?>/legacyregister" method="post" style="margin-bottom: 15px;">
    @csrf
    <input type="hidden" name="registration[event_id]" value="{{$eventId}}">
    <div class="row">
        <div class="col">
            <input type="text" class="form-control" name="registration[participant_name]" placeholder="Name **" required>
        </div>
        <div class="col">
            <button type="submit" class="btn btn-danger">anmelden</button>
        </div>
    </div>
    <div class="row" style="margin-top: 5px; margin-left: -6px; padding-left: 0;">
        <div class="col">
            @if($optionVirtual->toHtml() == 1)
                <input type="radio" id="virtual" name="registration[presence]" value="virtual" checked>
                <label for="registration[presence]">virtuell</label>
            @endif
            <?php if($optionOnsite->toHtml() == 1) : ?>
                <input type="radio" id="onsite" name="registration[presence]" value="onsite">
                <label for="registration[presence]">vor Ort</label>
            <?php endif; ?>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <input type="email" class="form-control" name="registration[participant_email]" placeholder="E-Mail Adresse">
        </div>
    </div>
    <div class="row">
        <div class="col">
            <textarea class="form-control" name="registration[comment]" rows="3" placeholder="Bemerkungen, Themenvorschläge etc."></textarea>
        </div>
    </div>
</form>
