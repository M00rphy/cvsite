var myEvent = jQuery.Event("keydown");

myEvent.which = 65;   //keycode for 'a'

$(document).keydown(function (e) {
    if (e.which === 38) {
        $(e.target).trigger(myEvent);
        e.preventDefault();
    }
    if (e.which === 65) {
        // You can call your custom function here
        e.preventDefault();
        console.log('a press');
    }
    if (e.which === 32) {
        // You can call your custom function here
        e.preventDefault();
        console.log('Space pressed');
    }

});

