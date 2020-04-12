$(document).ready(function(){

    $('.select2').select2({
        minimumResultsForSearch:1/0
    });
    $('#share-thought-btn').click(function () {
        if ($("#share-thought-form").length > 0) // if element found on page.
        {
            $([document.documentElement, document.body]).animate({
                scrollTop: $("#share-thought-form").offset().top
            }, 1500);
        }
        else
        {
            window.location.href = '/' //if not, redirect the user into the first page.
        }

    });

});
