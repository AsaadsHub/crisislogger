// Init datepickers
$('.datepicker').datepicker({});

// Show the other sex if selected
$('input[name="sex"]').on('change', e => {
    if($('input[name="sex"]:checked').val() == 'Other'){
        $('#other-sex-container').slideDown();
    } else {
        $('#other-sex-container').slideUp();
        // Clear the other sex text field
        $('#other-sex').val('');
    }
});

// Show the child's grade
$('input[name="child_school"]').on('change', e => {
    if($('input[name="child_school"]:checked').val() == 'Yes'){
        $('#child_grade_container').slideDown();
    } else {
        $('#child_grade_container').slideUp();
        // Clear the other sex text field
        $('#child_grade').val('');
    }
});
