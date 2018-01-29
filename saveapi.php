<?php 
//$connect = mysqli_connect('localhost','root','','seekapor');
$connect = mysqli_connect('localhost','root','','seekapor');
//return ['status'=>'success'];
@extract($_POST);
if($id){
$start_date = date('Y-m-d',strtotime($start_date));
$end_date = date('Y-m-d',strtotime($end_date));
$sql = "UPDATE calendar  SET title='$title',start_date='$start_date',end_date='$end_date',color='$color',description='$description'  where id='$id'";
 $ins = mysqli_query($connect,$sql);
 if($ins){
 	return json_encode(['status'=>'success']);
 }else{
 	return json_encode(['status'=>'error']);
 }

}else{

$start_date = date('Y-m-d',strtotime($start_date));
$end_date = date('Y-m-d',strtotime($end_date));
$sql = "INSERT INTO calendar VALUES('','$title','$start_date','$end_date','$color','$term','$description')";
 $ins = mysqli_query($connect,$sql);
 if($ins){
 	return json_encode(['status'=>'success']);
 }else{
 	return json_encode(['status'=>'error']);
 }
}
 ?>