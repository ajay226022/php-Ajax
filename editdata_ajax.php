<?php
	include 'connection.php';

    $id=$_POST['id'];
	// $image=$_POST['img'];
	$name=$_POST['name'];
	$email=$_POST['email'];
	$contact=$_POST['contact'];
	$role=$_POST['role'];
	$branch=$_POST['branch'];
	$qualification=$_POST['qualification'];

	
    
	$sql = "UPDATE `emp_detaile` SET `name`='$name',`email`='$email',`contact`='$contact',`role`='$role',`branch`='$branch',`qualification`='$qualification' WHERE id=$id";
	if (mysqli_query($conn, $sql)) {
		echo json_encode(array("statusCode"=>200));
	} 
	else {
		echo json_encode(array("statusCode"=>201));
	}
	mysqli_close($conn);
?>