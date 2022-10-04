<script>
    // $(document).ready(function(e) {
    //     // Submit form data via Ajax
    //     $(document).on("click" ,function(e) {
    //         e.preventDefault();
    //         alert(id);
    //         var deleteData = function(id) {
                
    //             $.ajax({
    //                 type: "POST",
    //                 url: "add_emp.php",
    //                 // data: {
    //                 //     deleteId: id
    //                 // },
    //                 dataType: "html",
    //                 success: function(data) {
    //                     $('#msg').html(data);
    //                     $('#table-container').load('fetch-data.php');

    //                 }
    //             });
    //         };
    //     });
    // });

</script>

<?php

$id = $_POST['id'];
include("connection.php");

$sql = "DELETE FROM  `emp_detaile` WHERE id='$id'";
;
if (mysqli_query($conn, $sql)) {
    echo 1;
    

    // echo "<script>
    //     alert('record deleted successfully')
    // </script>";

} else {
    echo 0;

    // echo "<script>
    //     alert('record is not deleted ')
    // </script>";

}
// header('Location:add_emp.php');
?>
