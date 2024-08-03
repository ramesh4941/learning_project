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

    $('#single_parent_relation').on('change', function() {
        const ParentType = $(this).val();
        const parentName = $('#name');
        const parentOccupation = $('#occupation');
        if (ParentType) {
            parentName.attr('placeholder', `Enter ${ParentType} Name`);
            parentOccupation.attr('placeholder', `Enter ${ParentType} Occupation`);

            $('.singleParentLabel').html(ParentType + " ");
        } else {
            parentName.attr('placeholder', 'Enter Name');
            parentOccupation.attr('placeholder', 'Enter Occupation');
        }
    });
});
