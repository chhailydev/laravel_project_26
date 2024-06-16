$(document).ready(function() {
    $('#add_role').click(function (e) { 
        e.preventDefault();
        var role = $('.role').val();

        var data = {
            role: role,
        }

        console.log(data)
        $.ajax({
            type: "POST",
            url: "/create/role",
            data: data,
            headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
              console.log(response);  
            },
            error: function(err){
                console.error(err);
            }
        });
    });
})