$(document).ready(function () {
    $('#form_add_student').on('submit', function (e) {
        e.preventDefault();
        var Form = $(this);
        var formData = new FormData(Form[0]);

        $.ajax({
            type: "POST",
            url: "/register/student",
            data: formData,
            dataType: "json",
            processData: false,
            contentType: false,
            cache: false,
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            success: function (response) {
                console.log(response);
            },
            error: function(err){
                console.error(err);
            }
        });
    })
});