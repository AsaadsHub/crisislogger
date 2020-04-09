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

/*
var options = {
    startStep: 1,
    clickableSteps: true,
    rules: {

    }
};
var wizard = new KTWizard('questionnaire_wizard',options);

$('#Submit').click(e => {
    let allAreFilled = true;
    document.getElementById("QuestionnaireForm").querySelectorAll("[required]").forEach(function(i) {
        if (!allAreFilled) return;
        if (!i.value) allAreFilled = false;
        if (i.type === "radio") {
            let radioValueCheck = false;
            document.getElementById("QuestionnaireForm").querySelectorAll(`[name=${i.name}]`).forEach(function(r) {
                if (r.checked) radioValueCheck = true;
            });
            allAreFilled = radioValueCheck;
        }
    });
    if (!allAreFilled) {
        console.table(allAreFilled);
        alert('Fill all the fields');
    }
   // $('#QuestionnaireForm').submit();
});
*/
var KTWizard3 = function() {
    var e, r, t;
    return {
        init: function() {
            var i;
            KTUtil.get("questionnaire_wizard"), e = $("#QuestionnaireForm"), (t = new KTWizard("questionnaire_wizard", {
                startStep: 1,
                clickableSteps: !0
            })).on("beforeNext", function(e) {
                !0 !== r.form() && e.stop()
            }), t.on("beforePrev", function(e) {
                !0 !== r.form() && e.stop()
            }), t.on("change", function(e) {
                KTUtil.scrollTop()
            }), r = e.validate({
                ignore: ":hidden",
                rules: {

                },
                invalidHandler: function(e, r) {
                    console.log(r.invalid);
                    KTUtil.scrollTop(), swal.fire({
                        title: "",
                        text: "There are some errors in your submission. Please correct them.",
                        type: "error",
                        confirmButtonClass: "btn btn-secondary"
                    })
                },
                submitHandler: function(e) {
                    $('#QuestionnaireForm').submit();
                }
            });
        }
    }
}();
jQuery(document).ready(function() {
    KTWizard3.init()
});
