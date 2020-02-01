<?php
header('Content-Type: application/json');
$method = $_SERVER['REQUEST_METHOD'];

switch($method){
	case 'GET':
	getdata();
	break;
	
	case 'POST':
	$data = json_decode(file_get_contents('php://input'),true);
	postdata($data);
	break;
	case 'PUT':
	$data = json_decode(file_get_contents('php://input'),true);
	putdata($data);
	break;
	case 'DELETE':
	$data = json_decode(file_get_contents('php://input'),true);
	deletedata($data);
	break;
	Default:
	echo'{"Dat":"Your data is not available"}';
	break;
}

function getdata(){
	include"db1.php";
	$sql = "SELECT * FROM user_info";
	$result = mysqli_query($conn, $sql);
	if(mysqli_num_rows($result)>0){
		$row = array();
		while($r=mysqli_fetch_assoc($result)){
			$rows["result"][]=$r;
		}
		echo json_encode($rows);
	}
	else{
		echo'{"result": "No Data found"}';
	} 
	
	
	}
	
	function postdata($data){
		include"db1.php";
		
		$Name  = $data["name"];
		$Email = $data["email"];
		
		$ql = "INSERT INTO user_info(name,email) VALUES('$Name','$Email' )";
		
		if(mysqli_query($conn,$ql)){
		echo '{"result": "success"}';
	} else {
		'echo {"result": "error"}';
		
		}
	}
		
		function putdata($data){
		include"db1.php";
		
		$id = $data["id"];
		$Name = $data["name"];
		$Email = $data["email"];
		
		$ql = "UPDATE user_info SET name ='$Name', email ='$Email' WHERE id= '$id'";
		
		if(mysqli_query($conn,$ql)){
		echo '{"result": "success"}';
	} 
	else {
		'echo {"result": "error"}';
		
	}	
}
	function deletedata($data){
		include"db1.php";
		
		$id = $data["id"];
		
		$ql = "DELETE FROM user_info WHERE id= $id";
		
		if(mysqli_query($conn,$ql)){
		echo '{"result": "success"}';
	} 
	else {
		'echo {"result": "error"}';
		
	}	
}

?>
