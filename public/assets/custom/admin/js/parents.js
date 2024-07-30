$( document ).ready(function() {
    $('#single-parent').hide();

    $('#single-parent-checkbox').click(function() {
        if ($(this).is(':checked')) {
          $('#parents').hide();
          $('#single-parent').show();
        }else{
            $('#parents').show();
            $('#single-parent').hide();
        }
    });
});
