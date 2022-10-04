<?php
include("connection.php");
$id = $_GET['id'];
$sql = "DELETE FROM `add_student` WHERE `id`='$id'";
$result = mysqli_query($conn, $sql);
if ($result) {

    echo "<script>
        alert('record deleted successfully')
    </script>";

} else {

    echo "<script>
        alert('record is not deleted ')
    </script>";

}
header('Location:tables.php');
?>