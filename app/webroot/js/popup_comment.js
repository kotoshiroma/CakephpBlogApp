$(document).ready(function(){

    $(document).on('click', '#popup_comment_open', function(){

        $('#popup_comment').fadeIn();
        
    } );

    $(document).on('click', '.popup_close_icon', function(){

        $('#popup_comment').fadeOut('fast', function() {

            $('.commentator input').val('');
            $('.comment textarea').val('');
        });
        
    } );

    // 投稿者名とコメント本文が未入力の場合は、投稿ボタンを押せないようにする
    $('.form_contributor').keyup(function(){

        if ($('.form_contributor').val().length > 0 && $('.form_comment').val().length > 0) {

            $('.btn_contribute').attr('disabled', false);
        } else {
            $('.btn_contribute').attr('disabled', true);
        }
    });

    $('.form_comment').keyup(function(){

        if ($('.form_contributor').val().length > 0 && $('.form_comment').val().length > 0) {

            $('.btn_contribute').attr('disabled', false);
        } else {
            $('.btn_contribute').attr('disabled', true);
        }
    });
});