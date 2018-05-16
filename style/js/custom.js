$( document ).ready(function() {
    $('.carousel').carousel({fullWidth: true, indicators: true});
    setInterval(function(){
        $('.carousel').carousel('next');
    },2000);

    $('.modal').modal();

});

$(document).ready(function(){
    $('select').formSelect();
});

$(document).ready(function() {
    $('input#input_text, textarea#textarea2').characterCounter();
});

$('.dropdown-button').dropdown({
        inDuration: 300,
        outDuration: 225,
        constrainWidth: false, // Does not change width of dropdown to that of the activator
        hover: true, // Activate on hover
        gutter: 0, // Spacing from edge
        belowOrigin: true, // Displays dropdown below the button
        alignment: 'left', // Displays dropdown with edge aligned to the left of button
        stopPropagation: false // Stops event propagation
    }
);