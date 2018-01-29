// On Page Load
$(document).ready(function () {

    //Get the number of students
    $.ajax({
        type: "POST",
        url: "api/users/students",

        success: function (response) {

            var data = JSON.parse(response);
            
            $("#students").html(data);

        }
    });

    //Get the number of students Owing
    $.ajax({
        type: "POST",
        url: "api/users/students",
        data: {fee_status: 'Owing'},  

        success: function (response) {
            var data = JSON.parse(response);

            $("#owing").html(data);

        }
    });

    //Get the number of students Paid
    $.ajax({
        type: "POST",
        url: "api/users/students",
        data: {fee_status: 'Paid'},  

        success: function (response) {
            var data = JSON.parse(response);

            $("#paid").html(data);

        }
    });

    //Get the number of teachers
    $.ajax({
        type: "POST",
        url: "api/users/teachers",

        success: function (response) {
            var data = JSON.parse(response);

            $("#teachers").html(data);

        }
    });

    //Get the number of parents
    $.ajax({
        type: "POST",
        url: "api/users/parents",

        success: function (response) {
            var data = JSON.parse(response);

            $("#parents").html(data);

        }
    });

    //Get the number of classes
    $.ajax({
        type: "POST",
        url: "api/class",

        success: function (response) {
            var data = JSON.parse(response);

            $("#class").html(data);

        }
    });

    //Get male students
    $.ajax({
        type: "POST",
        url: "api/users/students",
        data: {gender: 'Male'},

        success: function (response) {
            var data = JSON.parse(response);

            $("#male_pecentage").html(data.studentsNo + " (" + data.malePercentage +"%)");

        }
    });

    //Get female students
    $.ajax({
        type: "POST",
        url: "api/users/students",
        data: {gender: 'Female'},

        success: function (response) {
            var data = JSON.parse(response);

            $("#female_pecentage").html(data.studentsNo + " (" + data.femalePercentage +"%)");

        }
    });

    //Get male student percentage
    $.ajax({
        type: "POST",
        url: "api/users/teachers",
        data: {gender: 'male'},

        success: function (response) {
            var data = JSON.parse(response);

            $("#male_teachers_pecentage").html(data.teachersNo + " (" + data.femalePercentage +"%)");


        }
    });

    //Get female student percentage
    $.ajax({
        type: "POST",
        url: "api/users/teachers",
        data: {gender: 'Female'},

        success: function (response) {
            var data = JSON.parse(response);

            $("#female_teachers_pecentage").html(data.teachersNo + " (" + data.femalePercentage +"%)");


        }
    });
});