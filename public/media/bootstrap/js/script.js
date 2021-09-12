$(window).scroll(function(){
    if($(this).scrollTop()>50){
        $('header > .container > .row > .header-bg__logo').addClass('fixed-logo');
        $('.navbar-collapse').addClass('d-none');
    }
    else if ($(this).scrollTop()<100){
        $('header > .container > .row > .header-bg__logo').removeClass('fixed-logo');
        $('.navbar-collapse').removeClass('d-none');
    }
});