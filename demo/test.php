<?php
require_once('connection.php');

if($_REQUEST['action']==1){
$data=$_POST['user'];
extract($data);
$stmt = $conn->prepare(sprintf("SELECT * FROM user WHERE user_name='%s' AND password='%s'",$email,$pwd)); 
 $stmt->execute();
 $result=$stmt->rowCount();
 if($result){
 $fetch_data = $stmt->fetch();
	extract($fetch_data);
	$_SESSION['user_id']=$id;
 }


echo json_encode(array('result'=>$result));
} else if($_REQUEST['action']==2){
$array_data=array();
  $userId=sprintf("%d",$_SESSION['user_id']);
$array_data['return']=0;
   if($userId>0){
       $stmt = $conn->prepare(sprintf("SELECT name FROM user WHERE id='%d'",$userId)); 
	    $stmt->execute();
		$is_valid=$stmt->rowCount();
		$fetch_data = $stmt->fetch();
		extract($fetch_data);
		$array_data['return']=$userId;
		$array_data['name']=$name;
		$menu='<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">WebSiteName</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Home</a></li>
      <li><a href="#add_user">Add user</a></li>
      <li><a href="#">Page 2</a></li>
      <li><a href="#logout">Logout</a></li>
    </ul>
  </div>
</nav>';
$array_data['menu']=$menu;
		
   }
    echo json_encode($array_data);
}

?>