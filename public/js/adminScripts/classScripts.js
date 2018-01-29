// On Page Load
$(document).ready(function() {

getClasses();

});

//FUnction to Get Academic Years
function getClasses() {
    //Get the academic teachers
    $.ajax({
            type: "GET",
            url: "/api/class",
            data: { url: 'view' },

            beforeSend: function() {
                $('#msg').after('<span class="wait">&nbsp;<img src="../../../build/images/loading.gif" alt="loading" /></span>');
            },

            complete: function() {
                $('.wait').remove();
            },

            success: function(response){
                var data = JSON.parse(response);
                $("#class_records").empty();

                for (var i = 0; i < data.length; ++i) {

                    $("#class_records").append(
                        "<tr class='even pointer'>"
                        + "<td class='a-center'><input type='checkbox' class='flat hidden-print' name='table_records' value=" + data[i].Academic_year_id +
                        ">" + "</td>"
                        + "<td class='a-center'>" + data[i].Class_id + "</td>"
                        + "<td class='a-center'>" + data[i].Class_name + "</td>"
                        + "<td class='a-center'>" +
                        "</form>"+
                        "<input type='hidden' class='btn btn-success btn-sm hidden-print' style='margin-bottom:5px;' >"+
                        "<input type='hidden' class='btn btn-primary btn-sm hidden-print' style='margin-bottom:5px;' >"+
                        "<form id='' action='' method='post' class='hidden-print'>" +
                        "<input type='hidden' name='Class_name' value=" + data[i].Class_name + ">" +
                        "<button type='submit' class='btn btn-success btn-sm' style='margin-bottom:5px;'>View</button>" +
                        "<form id='' method='post' class='hidden-print'>" +
                        "<input type='hidden' name='Class_name' value=" + data[i].Class_name + ">" +
                        "<button type='submit' class='btn btn-primary btn-sm' style='margin-bottom:5px;'>Notify Class</button>" +
                        "</form>" +
                        "</td>"
                        + "</tr>"
                    );

                } 
            }
    });

}

//Function to pass data from form
$('form.ajax').on('submit', function(){
    var that = $(this),
        url = that.attr('action'),
        type = that.attr('method'),
        data = {};

    that.find('[name]').each(function(index, value){
        var that = $(this),
            name = that.attr('name'),
            value = that.val();

        data[name] = value;
    });

    $.ajax({
        url: url,
        type: type,
        data: data,

        beforeSend: function() {
            $('#submit').attr('disabled', true);
            $('#msg').after('<span class="wait">&nbsp;<img src="../../../build/images/loading.gif" alt="loading" /></span>');
        },
        complete: function() {
            $('#submit').attr('disabled', false);
            $('.wait').remove();
        },
        success: function(response){
            var data = JSON.parse(response);

            if (data.status === "success") {
                $('#msg').html(data.msg);
                $('#err').html('');
            } else {
                $('#err').html(data.msg);
                $('#msg').html('');
                sweetAlert("Oops...", data.msg, "error");
            }

            getClasses();
        }
    });

return false;
});