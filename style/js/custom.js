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