<?php 
$connect = mysqli_connect('localhost','root','','seekapor');

$query = "SELECT * FROM calendar";
$res = mysqli_query($connect,$query);
 $event_array = array();
while($row  = mysqli_fetch_row($res)){
                $event_array[] = array(
                'id'=> $row[0],
                'title' => $row[1].' | '.$row[6],
                'start' => $row[2],
                'end' => $row[2],
                'backgroundColor' => $row[4],
                'description' => $row[6]
            );
}
echo json_encode($event_array);


 ?>