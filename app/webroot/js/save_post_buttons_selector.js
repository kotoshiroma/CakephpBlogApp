$(document).ready(function(){

    $(document).on('click', '#dropdown_publish, #dropdown_draft', function(){

        if ($(this).attr('id') == 'dropdown_publish' ) {
            $('#submit_draft').attr('style', 'display: none;');
            $('#submit_publish').attr('style', 'display: block;');
        } else {
            $('#submit_publish').attr('style', 'display: none;');
            $('#submit_draft').attr('style', 'display: block;');
        }

        e.preventDefault();
    });
});
