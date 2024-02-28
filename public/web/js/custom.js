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

    $('.plus_para').click(function(){
        console.log($('#quantity').val())
    });

    $('.client_opinion_btn').click(function(){
        $('.client_opinion').css('display','block');
        $('.overflew').css('display','block');
    });

    $('.overflew').click(function(){
        $('.client_opinion').css('display','none');
        $('.overflew').css('display','none');
    });

    $('.receive_way_opts').change(function(){
        if($('.receive_way_opts').val() == 1){
            $('.in_rest').css('display','block')
            $('.from_rest').css('display','none')
            $('.delivery_rest').css('display','none')
        }else if($('.receive_way_opts').val() == 2){
            $('.in_rest').css('display','none')
            $('.from_rest').css('display','block')
            $('.delivery_rest').css('display','none')
        }else{
            $('.in_rest').css('display','none')
            $('.from_rest').css('display','none')
            $('.delivery_rest').css('display','block')
        }
    });
});