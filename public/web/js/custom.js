$(document).ready(function(){
    $('.detailes_show').click(function(){
        $('.detailes_show').addClass('hide');
        $(this).removeClass('hide');
    });

    $('.waiter_request').click(function(){
        $('.waiter').css('display','block');
        $('.overflew').css('display','block');
    });

    $('.overflew').click(function(){
        $('.waiter').css('display','none');
        $('.overflew').css('display','none');
    });

    $('.product_content').click(function(){
        $('.product_content').addClass('hide_model');
        $(this).removeClass('hide_model');
        $('.overflew').css('display','block');
    });

    $('.overflew').click(function(){
        $('.product_content').addClass('hide_model');
        $('.overflew').css('display','none');
    });
});