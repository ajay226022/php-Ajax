<?php
include("header.php");

?>

<body>
    <div id="wrapper">
        <?php
        include("sidebar.php");
        include("edit_ajax.php");
        ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <?php include("navbar.php"); ?>
            <div class="container">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <div class="card-header py-3">
                            <p id="success"></p>
                            <div class="table-wrapper">
                                <div class="table-title">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <h2><b>Employee </b> Detaile</h2>
                                            <div id="deletmsg" class="bg-danger text-bold text-white"></div>
                                        </div>

                                        <div class="col-sm-6">
                                            <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons"></i> <span>Add Employee</span></a>
                                            <!-- <a href="JavaScript:void(0);" class="btn btn-danger" id="delete_multiple"><i class="material-icons"></i> <span>Delete</span></a> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                        <tr>
                                            <th>Emp Id</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Contact.</th>
                                            <th>Branch</th>
                                            <th>Qualification</th>
                                            <th>Role</th>
                                            <th>image</th>
                                            <th>Action</th>


                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sqli = "SELECT `id`, `image`, `name`, `email`, `contact`, `role`, `branch`, `qualification` FROM `emp_detaile` WHERE 1";
                                        $result = mysqli_query($conn, $sqli);
                                        if (mysqli_num_rows($result)) {
                                            while ($row = mysqli_fetch_assoc($result)) {
                                        ?>

                                                <tr id="<?php echo $row['id']; ?>">

                                                    <td data-target="id"><?php echo $row['id']; ?></td>
                                                    <td data-target="name"><?php echo $row['name']; ?></td>
                                                    <td data-target="email"><?php echo $row['email']; ?></td>
                                                    <td data-target="contact"><?php echo $row['contact']; ?></td>
                                                    <td data-target="branch"><?php echo $row['branch']; ?></td>
                                                    <td data-target="qualification"><?php echo $row['qualification']; ?></td>
                                                    <td data-target="role"><?php echo $row['role']; ?></td>

                                                    <! ------------------------------------image upload -------------------------------->

                                                        <td><img src="<?php echo $row['image'] ?>" width="100px" height="100px" alt=""></td>


                                                        <td>
                                                            <span data-id="<?php echo $row['id']; ?>" data-name="<?php echo $row['name']; ?>" data-email="<?php echo $row['email']; ?>" data-contact="<?php echo $row['contact']; ?>" data-branch="<?php echo $row['branch']; ?>" data-qualification="<?php echo $row['qualification']; ?>" data-role="<?php echo $row['role']; ?>" data-image="<?php echo $row['image']; ?>" id="editbtn" data-toggle="modal" data-target="#myModal"> <i class="fa fa-edit text-warning"></i></span>

                                                            <span data-id="<?php echo $row['id']; ?>" id="dtbtn"><i class="fas fa-trash-alt"></i></span>
                                                        </td>
                                                </tr>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <!-- Add Modal HTML -->

                        <div id="reload" class=""></div>
                    </div>
                    <div id="addEmployeeModal" class="modal fade">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form id="user_form" method="post" enctype="multipart/form-data">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Add User</h4>

                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                    </div>
                                    <div class="modal-body">
                                        <div id="alertms" class="bg-success"></div>
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label for="file">File:</label>
                                                <input type="file" class="form-control" id="img" name="img" required />
                                            </div>
                                            <input type="hidden" name="action" id="action" value="insert" />

                                        </div>
                                        <div class="form-group">
                                            <label>NAME</label>
                                            <input type="text" id="name" name="name" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label>EMAIL</label>
                                            <input type="email" id="email" name="email" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label>CONTACT</label>
                                            <input type="contact" id="contact" name="contact" class="form-control" required>
                                        </div>

                                        <div class="form-group ">
                                            <label>Role</label>
                                            <input type="Role" id="role" name="role" class="form-control" required>
                                        </div>

                                        <div class="form-group">
                                            <label>BRANCH</label>
                                            <select class="select style: width:100%" id="branch" name="branch" aria-label="select">
                                                <option selected>--Select--</option>
                                                <option value="1">Computer</option>
                                                <option value="2">Art</option>
                                                <option value="3">Medical</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Qualification</label>
                                        <input type="Qualification" id="qualification" name="qualification" class="form-control" required>
                                    </div>
                                    <div class="modal-footer">
                                        <input type="hidden" name="id" id="id" />
                                        <input type="hidden" value="1" name="type">
                                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                                        <input type="submit" name="submit" id="submit" class="btn btn-primary submitBtn" value="SUBMIT" />
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    </div>

</body>

<script>
    $(document).ready(function(e) {

        // Submit form data via Ajax
        $("#user_form").on('submit', function(e) {
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: 'img_add.php',
                data: new FormData(this),
                dataType: 'json',
                contentType: false,
                cache: false,
                processData: false,
                success: function(dataResult) {
                    $("#alertms").text("You are Submit data sucessfully!");
                    setTimeout(function() {
                        location.reload(true)
                    }, 1000);

                }
            });
        });

    });

    // <---------------------delete table data---------------------------------------->>>>

    $(document).on('click', '#dtbtn', function() {
        // e.preventDefault();
        var id = $(this).data("id");
        var element = this;
        // alert(id);
        swal({
                title: "Are you sure?",
                text: "You will not be able to recover this imaginary file!",
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "No, cancel plx!",
                closeOnConfirm: false,
                closeOnCancel: false
            },
            function(isConfirm) {
                if (isConfirm) {
                    $.ajax({
                        url: "delete_ajax.php",
                        method: "POST",
                        data: {
                            id: id
                        },
                        success: function(data) {

                            if (isConfirm) {
                                swal("Deleted!", "Your imaginary file has been deleted.", "success");
                                setTimeout(function() {
                                    location.reload(true)
                                }, 1000);
                            }
                        }
                    });
                } else {
                    swal("Cancelled", "Your imaginary file is safe :)", "error");
                }
            });


        // if (confirm("Are you sure you want to delete this?")) {
        //     $.ajax({
        //         url: "delete_ajax.php",
        //         method: "POST",
        //         data: {
        //             id: id
        //         },
        //         // dataType: "text",
        //         success: function(data) {
        //             $("#deletmsg").text("You Are deleted Successfully!");
        //             // setTimeout(function() {
        //             //     location.reload(true)
        //             // }, 1000);
        //             if (data == 1) {
        //                 $(element).closest("tr").fadeOut();


        //             } else {
        //                 $("#error-msg").html("con't delete msg.").slideDown();
        //                 $("#success-msg.").slideUp();

        //             }

        //         }
        //     });
        // }


    });
</script>

</html>
<!-- Trigger the modal with a button -->
<?php
include("footer.php");
?>