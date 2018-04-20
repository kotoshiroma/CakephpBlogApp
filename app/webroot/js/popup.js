$(document).ready(function(){

    // 表示中のポップアップのidを保持する
    // （ポップアップオープン時にセットし、クローズ時にクリアする）
    var current_popup_id = "";

    // ポップアップオープン
    $(document).on('click', '.popup-open', function(){
        
        var btn_id = $(this).prop('id');
        current_popup_id = 'popup-'+btn_id;

        // カテゴリー編集ポップアップの場合、既存カテゴリー名をセット
        if ($('#'+current_popup_id).find('.input-text').attr('data-category-name')) {

            $category_name = $('#'+current_popup_id).find('.input-text').attr('data-category-name');
            $('#'+current_popup_id).find('.input-text').val($category_name);          
        }

        // タグ編集ポップアップの場合、既存タグ名をセット
        if ($('#'+current_popup_id).find('.input-text').attr('data-tag-name')) {

            $tag_name = $('#'+current_popup_id).find('.input-text').attr('data-tag-name');
            $('#'+current_popup_id).find('.input-text').val($tag_name);          
        }
        
        submitBtn_controll();
        $('#'+current_popup_id).fadeIn();
    } );

    // ポップアップクローズ
    $(document).on('click', '.popup-close-icon', function(){

        // $('.popup').fadeOut('fast', function() {
        $('#'+current_popup_id).fadeOut('fast', function() {

            // 入力フォームと表示中ポップアップのidをクリア
            $('.input-popup').val('');
            current_popup_id = "";
        });
    } );

    
    $('.input-popup').keyup(function(){
        submitBtn_controll();
    });

     // 表示中のポップアップのフォームをチェックし、
     // 未入力フォームが１つでも存在する場合は、submitボタンを押せないように制御する
    function submitBtn_controll() {

        var exists_empty_form = false;

        $('#'+current_popup_id).find('.input-popup').each(function() {

            if ($(this).val().length < 1) {
                exists_empty_form = true;
            }
        });

        if (exists_empty_form) {
            $('.submit-popup').attr('disabled', true);
        } else {
            $('.submit-popup').attr('disabled', false);
        }
    }
});