<?php 
$connect = mysqli_connect('localhost','root','','seekapor');

$id = $_GET['id'];
$type = $_GET['type'];
if($type=='edit'){
$query = "SELECT * FROM calendar where id=".$id;
$res = mysqli_query($connect,$query);

$event_array = array();
while($row  = mysqli_fetch_row($res)){
                $event_array[] = array(
                'id'=> $row[0],
                'title' => $row[1],
                'start' => $row[2],
                'end' => $row[3],
                'backgroundColor' => $row[4],
                'term'=>$row[5],
                'description'=>$row[6]
            );
}
echo json_encode($event_array);
}else{
	$query = "DELETE FROM calendar where id=".$id;
	$res = mysqli_query($connect,$query);
	echo 'success';
}

 ?>