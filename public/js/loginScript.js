/*
loadPage = function (verb, url, data) {
    var form = document.createElement("form");
    
    form.action = url;
    form.method = verb;
    form.target = "_self";
    
    if (data) {
        for (var key in data) {
            var input = document.createElement("textarea");
            input.name = key;
            input.value = typeof data[key] === "object" ? JSON.stringify(data[key]) : data[key];
            form.appendChild(input);
        }
    }

    form.style.display = 'none';
    document.body.appendChild(form);
    
    form.submit();
};
*/

$('form.ajax').on('submit', function () {
    var that = $(this),
        url = that.attr('action') + api_auth_key,
        type = that.attr('method'),
        data = {};

    that.find('[name]').each(function (index, value) {
        var that = $(this),
            name = that.attr('name'),
            value = that.val();

        data[name] = value;
    });

    $.ajax({
        
        url: url,
        type: type,
        data: data,

        beforeSend: function () {
            $('#login').attr('disabled', true);
            $('.login').after('<span class="wait">&nbsp;<img src="./build/images/loading.gif" alt="loading" /></span>');
        },
        complete: function () {
            $('#login').attr('disabled', false);
            $('.wait').remove();
        },
        success: function (response) {

            var data = JSON.parse(response);
            
            if(data.status == "success"){
                    
                if (data.msg == "superadmin") {

                        $('#msg').html('Welcome Super Administrator! Please Wait ....');
                        
                        swal({
                                title: "Login Sucessful!",
                                text: "Please Wait ....",
                                imageUrl: "/public/images/loading.gif",
                                timer: 2000,
                                showConfirmButton: false
                        });
                        
                        $('#login').attr('disabled', true);
                        setTimeout("window.location.href='superadmin';", 2050);
                        //loadPage('POST', 'superadmin', { "school_id": "500" });

                } else if (data.msg == "admin") {

                        $('#msg').html('Welcome Administrator! Please Wait ....');
                        
                        swal({
                                title: "Login Sucessful!",
                                text: "Please Wait ....",
                                imageUrl: "/public/images/loading.gif",
                                timer: 2000,
                                showConfirmButton: false
                        });
                        
                        $('#login').attr('disabled', true);
                        setTimeout("window.location.href='admin/dashboard';", 2050);


                } else if (data.msg == "accountant") {

                        $('#msg').html('Welcome Accountant! Please Wait ....');
                        
                        swal({
                                title: "Login Sucessful!",
                                text: "Please Wait ....",
                                imageUrl: "/public/images/loading.gif",
                                timer: 2000,
                                showConfirmButton: false
                        });
                            
                        $('#login').attr('disabled', true);


                } else if (data.msg == "academic") {

                        $('#msg').html('Welcome Academic! Please Wait ....');
                        
                        swal({
                                title: "Login Sucessful!",
                                text: "Please Wait ....",
                                imageUrl: "./public/images/loading.gif",
                                timer: 2000,
                                showConfirmButton: false
                        });
                        
                        $('#login').attr('disabled', true);
                        setTimeout("window.location.href='./app/views/academics/';", 2050);

                } else if (data.msg == "teacher") {

                        $('#msg').html('Login Sucessful! Please Wait ....');
                        
                        swal({
                                title: "Login Sucessful!",
                                text: "Please Wait ....",
                                imageUrl: "./public/images/loading.gif",
                                timer: 2000,
                                showConfirmButton: false
                        });
                        
                        $('#login').attr('disabled', true);

                } else if (data.msg == "parent") {

                        $('#msg').html('Login Sucessful! Please Wait ....');
                        
                        swal({
                                title: "Login Sucessful!",
                                text: "Please Wait ....",
                                imageUrl: "./public/images/loading.gif",
                                timer: 2000,
                                showConfirmButton: false
                        });
                        
                        $('#login').attr('disabled', true);

                } else if (data.msg == "student") {

                        $('#msg').html('Login Sucessful! Please Wait ....');
                        
                        swal({
                                title: "Login Sucessful!",
                                text: "Please Wait ....",
                                imageUrl: "./public/images/loading.gif",
                                timer: 2000,
                                showConfirmButton: false
                        });
                        
                        $('#login').attr('disabled', true);

                }

            }else{
                sweetAlert("Oops..., Access Denied!", data.msg, "error");
            }

        }
    });

    return false;
});