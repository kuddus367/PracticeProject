<?php
    session_start();
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "user_db";

    //$conn = mysqli_connect($host,$user,$pass,$db);
      //mysql_connect($host,$user,$pass) or die(mysql_error());
    // $conn = mysql_connect($host,$user,$pass);
    // if(!$conn){
    // 	die('Could not connect: ' .mysql_error());
    // }
	
  	$conn = new mysqli($host, $user, $pass,$db);
		
  	//if ( $conn) {
  		//echo"Successfully Connected";
  	//}else{
		//echo " Connection failed";
	//}
    mysqli_select_db($conn, 'user_db');
?>