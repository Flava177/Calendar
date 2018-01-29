<!-- put header here -->
<!DOCTYPE html>
<html lang="en">
<!--header of this calendar.php-->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<!-- Meta, title, CSS, favicons, etc. -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<!-- Chrome, Firefox OS, Opera and Vivaldi -->
<meta name="theme-color" content="#16000D">
<!-- Bootstrap -->
<link href="vendor/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- bootstrap-daterangepicker -->
<link href="vendor/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
<link href="vendor/fullcalendar/dist/fullcalendar.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="public/css/toastr.css">
<!-- Custom Theme Style -->
<link href="public/css/custom.min.css" rel="stylesheet">
<style type="text/css">

.divhead .radios .boxer1{
    background-color: red;
    border: 2px solid rgba(0, 0, 0, .2);
     border-radius: 50%;
}
.divhead .radios .boxer2{
    background-color: yellow;
    border: 2px solid rgba(0, 0, 0, .2);
     border-radius: 50%;
}
.divhead .radios .boxer3{
    background-color: green;
    border: 2px solid rgba(0, 0, 0, .2);
    border-radius: 50%;
}
.divhead .radios .boxer4{
    background-color: blue;
    border: 2px solid rgba(0, 0, 0, .2);
     border-radius: 50%;
}

.divhead .radios .boxer5{
    background-color: black;
    border: 2px solid rgba(0, 0, 0, .2);
     border-radius: 50%;
}

</style>
</head>

<!-- page content -->
<div class="right_col" role="main">

  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="dashboard_graph">
  

  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div id='calendar' style="width:60%"></div>
    </div>
  </div>

</div>

    <!-- calendar modal -->
    <div id="CalenderModalNew" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">

          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel">New Calendar Entry</h4>
          </div>
           <form id="saveeventform" class="form-horizontal calender" role="form">
          <div class="modal-body">
            <div id="testmodal" style="padding: 5px 20px;">
             
                <div class="form-group">
                  <label class="col-sm-2 control-label">Title</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="title" name="title">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Description</label>
                  <div class="col-sm-10">
                    <textarea class="form-control" style="height:55px;" id="descr" name="description"></textarea>
                  </div>
                </div>
                 <div class="form-group">
                  <label class="col-sm-2 control-label">Term</label>
                  <div class="col-sm-10">
                    <select class="form-control" name="term" required="required">
                      <option value="">Select term</option>
                      <option value="1">First term</option>
                      <option value="2">Second Term</option>
                      <option value="3">Third term</option>
                    </select>
                  </div>
                </div>
                  <div class="form-group">
                  <label class="col-sm-2 control-label">Date</label>
                  <div class="col-sm-5">
                    <input type="date" class="form-control" id="title" name="start_date" placeholder="Start Date">
                  </div>
                   <div class="col-sm-5">
                    <input type="date" class="form-control" id="title" name="end_date" placeholder="End Date">
                  </div>
                </div>
                  <div class="form-group">
                  <label class="col-sm-2 control-label">Tag</label>
                  <div class="col-sm-10 divhead ">
                  <label class="radio-inline radios">
                  <input type="radio" name="color" value="#ff0000" checked> Red
                  <span class="boxer1">&nbsp;&nbsp;&nbsp;</span>
                  </label>
                  <label class="radio-inline radios">
                     <input type="radio" name="color" value="#fff000"> Yellow
                     <span class="boxer2">&nbsp;&nbsp;&nbsp;</span>
                   </label>
                   <label class="radio-inline radios">
                     <input type="radio" name="color" value="#008000"> Green
                     <span class="boxer3">&nbsp;&nbsp;&nbsp;</span>
                   </label>
                   <label class="radio-inline radios">
                     <input type="radio" name="color" value="#0000FF"> Blue
                     <span class="boxer4">&nbsp;&nbsp;&nbsp;</span>
                   </label>
                  </div>
                </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default antoclose" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
           </form>
        </div>
      </div>
    </div>

    <!-- Edit calendar modal -->

    <div id="CalenderModalEdit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">

          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel2">Edit Calendar Entry </h4>
          </div>
            <form id="editeventform" class="form-horizontal calender" role="form">
              <input type="hidden" name="id" id="eventid">
          <div class="modal-body">
            <div id="testmodal" style="padding: 5px 20px;">
             
                <div class="form-group">
                  <label class="col-sm-2 control-label">Title</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="title2" name="title">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Description</label>
                  <div class="col-sm-10">
                    <textarea class="form-control" style="height:55px;" id="description2" name="description"></textarea>
                  </div>
                </div>
              
                  <div class="form-group">
                  <label class="col-sm-2 control-label">Date</label>
                  <div class="col-sm-5">
                    <input type="date" class="form-control" id="start_date2" name="start_date" placeholder="Start Date">
                  </div>
                   <div class="col-sm-5">
                    <input type="date" class="form-control" id="end_date2" name="end_date" placeholder="End Date">
                  </div>
                </div>
                  <div class="form-group">
                  <label class="col-sm-2 control-label">Tag</label>
                  <div class="col-sm-10 divhead ">
                  <label class="radio-inline radios">
                  <input type="radio" name="color" value="#ff0000" checked> Red
                  <span class="boxer1">&nbsp;&nbsp;&nbsp;</span>
                  </label>
                  <label class="radio-inline radios">
                     <input type="radio" name="color" value="#fff000"> Yellow
                     <span class="boxer2">&nbsp;&nbsp;&nbsp;</span>
                   </label>
                   <label class="radio-inline radios">
                     <input type="radio" name="color" value="#008000"> Green
                     <span class="boxer3">&nbsp;&nbsp;&nbsp;</span>
                   </label>
                   <label class="radio-inline radios">
                     <input type="radio" name="color" value="#0000FF"> Blue
                     <span class="boxer4">&nbsp;&nbsp;&nbsp;</span>
                   </label>                    
                  </div>
                </div>
            </div>
          </div>

<!--button of modals-->

          <div class="modal-footer">
            <button type="button" class="btn btn-danger deleteevent">Delete</button>
            <button type="submit" class="btn btn-primary ">Save changes</button>
             <button type="button" class="btn btn-default antoclose" data-dismiss="modal">Close</button>
          </div>
           </form>
        </div>
      </div>
    </div>

    <div id="fc_create" data-toggle="modal" data-target="#CalenderModalNew"></div>
    <div id="fc_edit" data-toggle="modal" data-target="#CalenderModalEdit"></div>
    <!-- /calendar modal -->

<!--  Script to Submit Form Data -->
<script type="text/javascript" src="public/js/jquery-3.2.1.min.js"></script>

          
          <!-- /footer content -->
          </div>
          </div>
          <!-- jQuery -->
          <script src="vendor/jquery/dist/jquery.min.js"></script>
          <!-- Bootstrap -->
          <script src="vendor/bootstrap/dist/js/bootstrap.min.js"></script>
          <!-- DateJS -->
          <script src="vendor/DateJS/build/date.js"></script>
          <script src="vendor/moment/min/moment.min.js"></script>
          <script src="vendor/fullcalendar/dist/fullcalendar.min.js"></script>
          <script type="text/javascript" src="public/js/toastr.min.js"></script>

          <!-- Custom Theme Scripts -->
          <script src="public/js/custom.js"></script>

          <script type="text/javascript">
              $(function(){
                $('#saveeventform').submit(function(e){
                  e.preventDefault();
                  $.post('http://localhost/cal/saveapi.php',$('#saveeventform').serialize(),function(res){
                    console.log(res);
                    $('#CalenderModalNew').modal('hide');
                    window.location.reload(true);

                  }).fail(function(){
                    alert("Ajax Failed");
                  })
                })

                  $('#editeventform').submit(function(e){
                  e.preventDefault();
                  $.post('http://localhost/cal/saveapi.php',$('#editeventform').serialize(),function(res){
                    console.log(res);
                    $('#CalenderModalEdit').modal('hide');
                    window.location.reload(true);

                  }).fail(function(){
                    alert("Ajax Failed");
                  })
                })

                  $('.deleteevent').click(function(){
                    if(window.confirm("Are you sure")){
                       $.get('http://localhost/calendar.php',{id:$('#eventid').val(),type:'delete'},function(res){
                         window.location.reload(true);
                       });
                    }
                  });
              });

        function  init_calendar() {
          
        if( typeof ($.fn.fullCalendar) === 'undefined'){ return; }
        console.log('init_calendar');
          
        var date = new Date(),
          d = date.getDate(),
          m = date.getMonth(),
          y = date.getFullYear(),
          started,
          categoryClass;

        var calendar = $('#calendar').fullCalendar({
          header: {
          left: 'prev,next today',
          center: 'title',
          right: 'month,agendaWeek,agendaDay,listMonth'
          },
          selectable: true,
          selectHelper: true,
          select: function(start, end, allDay) {
          $('#fc_create').click();

          },
          eventClick: function(calEvent, jsEvent, view) {
          console.log(calEvent);
            //var arr = calEvent.title.split(" | ");
            $.get('http://localhost/cal/editdelapi.php',{id:calEvent.id,type:'edit'},function(res){
              console.log();
  
               var resp = JSON.parse(res)[0];
               $('#eventid').val(resp.id);
               $('#title2').val(resp.title);
               $('#description2').val(resp.description);
               $('#start_date2').val(resp.start);
               $('#end_date2').val(resp.end);
               $('#color2').val(resp.backgroundColor);
               $('#fc_edit').click();

               //Check Events for the next 24 Hours

            }).fail(function(){
              alert("No network connection");
            });
         
         // $('#title2').val(calEvent);
          },
          editable: true,
          events:{
              url: 'http://localhost/cal/geteventapi.php',
              // http://localhost/cal/calender.php
              type: 'GET',             
              error: function() {
                  alert('there was an error while fetching events!');
              },
              success: function(e){
                var today = new Date();
                var tomorrow =new Date(today);
                //Process Tomorrow
                tomorrow = new Date(tomorrow.setDate(tomorrow.getDate() +2));
                //Filter Data
                var filtered = getInRange(e, today, tomorrow); 
                filtered.forEach(function(c,i)


                {
                  if (c.backgroundColor=="#008000") {

              toastr.info(c.title, c.description,{
                    timeout : 20000
                      })

                       toastr.options.closeHtml = '<button><i class="icon-off"></i></button>';
                        //toastr.options.closeButton = true;
                  };
                  //TODO: Here is where you tweak toastr
                                
})                        
              }
              // color: 'yellow',   // a non-ajax option
              // textColor: 'black' // a non-ajax option
          }
          //events:"http://localhost/cal/geteventapi.php"
        });
        
      };

      function getInRange(data, start , end){
        return data.filter(function(el){
          console.log((new Date(el.start) > start) && (new Date(el.start) < end) )
          // debugger;
          return ( (new Date(el.start) >= start) && (new Date(el.start) <= end) );
        });
      }
          </script>
<!-- end -->