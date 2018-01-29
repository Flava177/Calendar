// On Page Load
$(document).ready(function () {
    getAcademicyear();

});


//FUnction to Get Academic Years
function getAcademicyear() {
    //Get the academic Years
    $.ajax({
        type: "GET",
        url: "/api/academic_year",

        beforeSend: function () {
            $('#msg').after('<span class="wait">&nbsp;<img src="../../../build/images/loading.gif" alt="loading" /></span>');
        },

        complete: function () {
            $('.wait').remove();
        },

        success: function (response) {

            var data = JSON.parse(response);
            $("#academic_year_records").empty();

             for (var i = 0; i < data.length; ++i) {
               
                $("#academic_year_records").append(
                    "<tr class='even pointer'>"
                    + "<td class='a-center'><input type='checkbox' class='flat hidden-print' name='table_records' value="+ data[i].Academic_year_id +
                        ">" + "</td>"
                    + "<td class='a-center'>" + data[i].Academic_year_id + "</td>"
                    + "<td class='a-center'>" + data[i].Term + "</td>"
                    + "<td class='a-center'>" + data[i].Start_date + "</td>"
                    + "<td class='a-center'>" + data[i].End_date + "</td>"
                    + "<td class='a-center'>" + data[i].File + "</td>"
                    + "<td class='a-center'>" + 
                        "<form id='upload_form' action='' enctype='multipart/form-data' method='post'>"+
                        "<input type='hidden' name='Academic_year_id' id='academic_year' value=" + data[i].Academic_year_id + ">"+
                        "<input type='file' name='fileToUpload' id='fileToUpload' required><br>"+
                        "<input type='submit' class='btn btn-success hidden-print' style='height:30px' value='Upload' name='submit'>"+
                        "</form>"+ 
                        "</td>"
                    + "</tr>"
                );

            }            
        }
    });
}


//Function to pass data from form
$('form.ajax').on('submit', function () {
    var that = $(this),
        url = that.attr('action'),
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
        dataType: "text",

        beforeSend: function () {
            $('#submit').attr('disabled', true);
            $('#msg').after('<span class="wait">&nbsp;<img src="../../../build/images/loading.gif" alt="loading" /></span>');
        },
        complete: function () {
            $('#submit').attr('disabled', false);
            $('.wait').remove();
        },

        success: function (response) {
            
            var data = JSON.parse(response);
            
            if(data.status === "success"){
                $('#msg').html(data.msg);
                $('#err').html('');
            }else{
                $('#err').html(data.msg);
                $('#msg').html('');
                sweetAlert("Oops...", data.msg, "error");
            }
            
            getAcademicyear();
        }
    });


    return false;
});