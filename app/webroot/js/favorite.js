$(document).ready(function(){

    $(document).on('click', '#btn_favorite', function(){

        // 未ログインの場合、ログインを促すポップアップを出す
        if (!$('#btn_favorite').data('userid')) {

            return;
        } 

        
        $.ajax({
            url:'/favorites/add',
            type:'POST',
            dataType:'json',
            data:{
                 'post_id':$('#btn_favorite').data('postid')
                ,'user_id':$('#btn_favorite').data('userid')
            }
        })
        .done(function(data){

            console.log(data);
        })
        .fail(function(textStatus, jqXHR, errorThrown){
            console.log('fail');
            console.log(textStatus);
            console.log(jqXHR);
            console.log(errorThrown);
        })
    });

})
