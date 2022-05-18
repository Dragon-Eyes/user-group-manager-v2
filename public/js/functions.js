// letter assembly
var elinks = document.getElementsByClassName("e-l");
var total_elinks = elinks.length;
for(var i=0; i < total_elinks; i++){
    var part1 = elinks[i].getAttribute("data-ep1");
    var part2 = elinks[i].getAttribute("data-ep2");
    var part3 = elinks[i].getAttribute("data-ep3");
    var newAddress = part1+'@'+part2+'.'+part3;
    elinks[i].setAttribute('href','mailto:'+newAddress);
    elinks[i].innerHTML = newAddress;
}

$(function () {
    $('[data-toggle="tooltip"]').tooltip()
});

$('#registrationmodal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget);
    var invoicetype = button.data('invoicetype');
    var productvariationkey = button.data('productvariationkey');
    var productvariationname = button.data('productvariationname');
    var modal = $(this);
    if(invoicetype == 1) {
        var invoicetypeother = 2;
    } else {
        var invoicetypeother = 1;
    }
    var modaltitleno = '#modal-title-' + invoicetype
    modal.find('#modalinvoicetype input').val(invoicetype);
    modal.find('#modalproductvariationkey input').val(productvariationkey);
    modal.find('#modalproductvariationname input').val(productvariationname);
    modal.find('#modal-title-' + invoicetype).css({"display": ""});
    modal.find('#modal-title-' + invoicetypeother).css({"display": "none"});
});
