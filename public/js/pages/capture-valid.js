function valid(){
    if (!$("input[name='share']:checked").val()) {
        swal.fire({
            title: 'You missed a step..',
            text: 'Please select yes or no for share.'
        });
        return false;
    }
    if (!$("input[name='contribute']:checked").val()) {
        swal.fire({
            title: 'You missed a step..',
            text: 'Please select yes or no for contribute.'
        });
        return false;
    }
    return true;
}
