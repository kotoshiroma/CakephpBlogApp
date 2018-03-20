// $(document).ready(function(){
//
// })

//上記の省略形が下記

$(function(){
  var form_cnt = 0; //画像フォームの数を保持する

  $('#btnAddForm').click(function(){
    addForm();
  })

  $(document).on('click', '.btnDelForm', function(){
    // $(this).parent().remove();
    $(this).closest('.copyForm').remove();
    form_cnt--;
  })

  function addForm() {
    form_cnt++;

    var lastForm = $('#imageForms').find(':last').prev();
    var name = lastForm.attr('name');
    var id = lastForm.attr('id');

    var lastIdNum = id.replace(/\D/g, ""); //数値部分以外を削除
    var newIdNum = Number(lastIdNum) + 1;

    var newName = name.replace(/[0-9]{1,}/, String(newIdNum)); //1桁以上の数字部分を置換
    var newId = id.replace(/[0-9]{1,}/, String(newIdNum));

    var newForm = $('.dummyForm').clone();
    newForm.attr('style', 'display:inline;');
    newForm.attr('class', 'copyForm');
    // newForm.children('input').attr('name', newName);
    // newForm.children('input').attr('id', newId);
    newForm.find('input').attr('name', newName);
    newForm.find('input').attr('id', newId);

    $('#imageForms').append(newForm);
  }

  $(document).on('change', 'input[type="file"]', function() {
    // ファイル選択状態の場合
    if ($(this)[0].files[0]) {
      $(this).attr('style', 'display:none;');
      // $(this).prev().text($(this)[0].files[0].name);
      // $(this).prev().attr('style', 'display:block;');
      $(this).closest('.copyForm').find('.labelFileName').text($(this)[0].files[0].name);
      $(this).closest('.copyForm').find('.labelFileName').attr('style', 'display:block;');
    }
  })
});
