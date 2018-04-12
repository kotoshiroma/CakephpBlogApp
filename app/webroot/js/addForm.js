$(function(){
  var form_cnt = 0; //画像フォームの数を保持する

  $('.btn_addForm').click(function(){
    addForm();
  })

  $(document).on('click', '.btn_del_imgForm', function(){
    $(this).closest('.copyForm').remove();
    form_cnt--;
  })

  function addForm() {
    form_cnt++;

    var lastForm = $('.input_file:last').find('input');
    var name = lastForm.attr('name');
    var id = lastForm.attr('id');

    var lastIdNum = id.replace(/\D/g, ""); //数値部分以外を削除
    var newIdNum = Number(lastIdNum) + 1;

    var newName = name.replace(/[0-9]{1,}/, String(newIdNum)); //1桁以上の数字部分を置換
    var newId = id.replace(/[0-9]{1,}/, String(newIdNum));

    var newForm = $('.dummyForm').clone();
    newForm.attr('style', 'display:inline;');
    newForm.attr('class', 'copyForm input_file');
    newForm.find('input').attr('name', newName);
    newForm.find('input').attr('id', newId);

    newForm.find('label').attr('for', newId);

    $('#imageForms').append(newForm);
  }

  $(document).on('change', 'input[type="file"]', function() {
    // ファイル選択状態の場合
    if ($(this)[0].files[0]) {
      $(this).closest('.copyForm').find('.label_for_inputFile').attr('style', 'display:none;');
      $(this).closest('.copyForm').find('.labelFileName').text($(this)[0].files[0].name);
      $(this).closest('.copyForm').find('.labelFileName').attr('style', 'display:block;');
    }
  })
});
