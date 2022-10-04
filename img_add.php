
<?php
include("connection.php");

// include("connection.php");
// // if (isset($_POST['submit'])) {

$name = $_POST['name'];
$email = $_POST['email'];
$contact = $_POST['contact'];
$role = $_POST['role'];
$branch = $_POST['branch'];
$qualification = $_POST['qualification'];
// echo "hello";
// print_r($_POST);
// exit;

if($_FILES['img']['name']){
 
    move_uploaded_file($_FILES['img']['tmp_name'], "Upload-image/".$_FILES['img']['name']);
 
    $img = "Upload-image/".$_FILES['img']['name'];
 
    }


$sql = "INSERT INTO `emp_detaile`( `image`, `name`, `email`, `contact`, `role`, `branch`, `qualification`) VALUES ('$img','$name', '$email', '$contact', '$role', '$branch', '$qualification')";

if (mysqli_query($conn, $sql)) {
    echo json_encode(array("statusCode"=>200));
   
} else {
    echo "Error: " . $sql . "" . mysqli_error($conn);
}
// }
mysqli_close($conn);
?>


