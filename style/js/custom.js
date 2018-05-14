$( document ).ready(function() {
    $('.carousel').carousel({fullWidth: true, indicators: true});
    setInterval(function(){
        $('.carousel').carousel('next');
    },2000);
});
