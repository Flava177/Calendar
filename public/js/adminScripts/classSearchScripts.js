// On Page Load
$(document).ready(function () {
    
    $("#search_input").keyup(function () {
       
        var searchTerm = $('#search_input').val();

        $.get("/api/class/search?q=" + searchTerm, function (response) {

            var data = JSON.parse(response);
            $("#class_records").empty();
            
            if (data.length == 0) {

                $("#class_records").append("<p style='text-align:center;font-size:14px;color:#ED1C24;'>No matches found<p>");

            } else {

                for (var i = 0; i < data.length; ++i) {

                        $("#class_records").append(
                            "<tr class='even pointer'>"
                            + "<td class='a-center'><input type='checkbox' class='flat hidden-print' name='table_records' value=" + data[i].Academic_year_id +
                            ">" + "</td>"
                            + "<td class='a-center'>" + data[i].Class_id + "</td>"
                            + "<td class='a-center'>" + data[i].Class_name + "</td>"
                            + "<td class='a-center'>" +
                            "</form>" +
                            "<input type='hidden' class='btn btn-success btn-sm hidden-print' style='margin-bottom:5px;' >" +
                            "<input type='hidden' class='btn btn-primary btn-sm hidden-print' style='margin-bottom:5px;' >" +
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
       
    });

});