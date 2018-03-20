$(document).ready(function(){

    // 選択中の画像の添字を保持
    var _current_idx;

    // モーダルウィンドウをセンタリング
    locateCenter();

    function locateCenter() {

        var w = $(window).width();
        var h = $(window).height();

        var cw = $('.modal_content').outerWidth();
        var ch = $('.modal_content').outerHeight();

        // ウィンドウの横幅 - モーダルウィンドウの横幅 /2 が、端からの余白の長さ
        $('.modal_content').css({'left': ((w - cw)/2) + 'px'});
        $('.modal_content').css({'top': ((h - ch)/2) + 'px'});

    }

    // サムネイル画像クリックイベント
    $(document).on('click', '.modal_open', function() {

        // クリックされたサムネイル画像が、何番目かを取得し、設定する
        _current_idx = $('.modal_open').index(this);

        // サムネイル画像のパスをもとに通常サイズのファイスパスを取得
        var img_pass = $(this).attr('src').replace('thumb_', '');
        var img = $('<img src="' + img_pass + '" class="modal_image"/>');
        img.appendTo('.modal_content');

        $('#overlay, .modal_content').fadeIn('slow');
        // locateCenter();
    });

    // スライド切り替え矢印ボタンクリックイベント
    $(document).on('click', '.slide_arrow', function() {

        $('.modal_content').children('img').remove();

        var img_count = $('.Images_thumb > img').length;
        var imgs = $('.Images_thumb > img');

        // 先頭の要素の場合
        if (_current_idx == 0) {
            if ($(this).attr('id') == "prev") {
                _current_idx = img_count - 1;
            } else {
                _current_idx++;
            }

        // 末尾の要素の場合
        } else if (_current_idx == img_count - 1) {
            if ($(this).attr('id') == "prev") {
                _current_idx--;
            } else {
                _current_idx = 0;
            }
        // それ以外の要素の場合
        } else {
            if ($(this).attr('id') == "prev") {
                _current_idx--;
            } else {
                _current_idx++;
            }
        }

        var img_pass = imgs.eq(_current_idx).attr('src').replace('thumb_', '');
        var img = $('<img src="' + img_pass + '" class="modal_image" />');

        img.appendTo('.modal_content');
        locateCenter();
    });

    // オーバーレイクリックイベント
    $(document).on('click', '#overlay', function() {

        $('.modal_content').children('img').remove();
        $('#overlay, .modal_content').fadeOut('slow');
    });


    $(window).resize(function() {

        locateCenter();
    });
})
