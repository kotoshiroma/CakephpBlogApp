$(document).ready(function(){

    $(document).on('click', '.post_management li', function(){

        $.ajax({
            url:'/posts/get_post',
            type:'POST',
            dataType:'json',
            data:{
                'kind_of_post':$(this).attr('id')
            }
        })
        .done(function(data){

            $('#posts_table_pane table tbody tr').remove();
            $('#posts_table_pane table tbody tr').remove();

            data.forEach(function(item) {

                var tr = $('<tr></tr>');

                var td1 = $('<td></td>');
                var chk = $('<input class="chkbox" type="checkbox" name="post_id[]" >');
                chk.val(item.Post.id);
                td1.append(chk);
                tr.append(td1);

                var td2 = $('<td></td>');
                td2.text(item.Post.title);
                tr.append(td2);

                var td3 = $('<td></td>');
                var a = $('<a href="#"></a>');
                a.attr('href', '/posts/edit/' + item.Post.id);
                a.attr('class', 'btn btn-primary btn-xs');
                a.text('編集');
                td3.append(a);
                tr.append(td3);

                var td4 = $('<td></td>');
                td4.text(item.Category.category_name);
                tr.append(td4);

                var td5 = $('<td></td>');
                tr.append(td5);

                var td6 = $('<td></td>');
                td6.text(item.Post.created_fmt);
                tr.append(td6); 

                $('#posts_table_pane table tbody').append(tr);
            })
        })
        .fail(function(textStatus, jqXHR, errorThrown){
            console.log('fail');
            console.log(textStatus);
            console.log(jqXHR);
            console.log(errorThrown);
        })
    });

})
