$( document ).ready(function() {
    $('.carousel').carousel({fullWidth: true, indicators: true});
    setInterval(function(){
        $('.carousel').carousel('next');
    },5000);

    $('.modal').modal();

    $('.slider').slider();

    $('.collapsible').collapsible();

    $('input#input_text, textarea#textarea2').characterCounter();

    $('select').formSelect();

    $('.dropdown-button').dropdown({
            inDuration: 600,
            outDuration: 225,
            constrainWidth: false, // Does not change width of dropdown to that of the activator
            hover: true, // Activate on hover
            gutter: 0, // Spacing from edge
            belowOrigin: true, // Displays dropdown below the button
            alignment: 'left', // Displays dropdown with edge aligned to the left of button
            stopPropagation: false, // Stops event propagation
            coverTrigger: false, // If false, the dropdown will show below the trigger.
            closeOnClick: true // 	If true, close dropdown on item click.
        }
    );

    $('.modalopening').click(function () {
        var contactID = $(this).attr('dir');
        $('.contactID').val(contactID);

        var openHrs = $(this).parent().siblings('.openHrs')[0].innerHTML;
        $('#openHours').val(openHrs);
        console.log(openHrs);

        var openDay = $(this).parent().siblings('.openDay')[0].innerHTML;
        $('#openDay').val(openDay);
    });

});
