$(document).ready(function(){

    $('.post_code').keyup(function() {

        if ($('.post_code').val().length < 7) {
            return;
        }

        $.ajax({
            url:'/users/get_post_code',
            type:'POST',
            dataType:'json',
            data:{
                'post_code':$('.post_code').val()
            }
        })
        .done(function(data){

            $('.address1').val(data.PostCode.address1);
            $('.address2').val(data.PostCode.address2 + data.PostCode.address3);

        })
        .fail(function(textStatus, jqXHR, errorThrown){
            console.log('fail');
            console.log(textStatus);
            console.log(jqXHR);
        })
    });

})
