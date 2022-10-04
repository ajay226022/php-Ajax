<!DOCTYPE html>
<html lang="en">
<?php
include("connection.php");
include('header.php');
$success = "";
$first_nameErr = $last_nameErr = $email_addressErr = $phoneErr = $passwordErr = $RepeatPasswordErr = "";
$first_name = $last_name = $email_address = $phone = $password = $RepeatPassword = "";
if (isset($_POST['submit'])) {
    if (empty($_POST["first_name"])) {
        $first_nameErr = "*first_name is required?";
    } else {
        $first_name = $_POST["first_name"];
    }

    if (empty($_POST["last_name"])) {
        $last_nameErr = "*last_name is required?";
    } else {
        $last_name = $_POST["last_name"];
    }

    if (empty($_POST["email_address"])) {
        $email_addressErr = "email_address is required?";
    } else {
        $email_address = $_POST["email_address"];
    }

    if (empty($_POST["phone"])) {
        $phoneErr = "Mobile Number is required?";
    } else {
        $phone = $_POST["phone"];
    }

    if (empty($_POST["password"])) {
        $passwordErr = "*passwords is required?";
    } else {
        $password = $_POST["password"];
    }

    if (empty($_POST["RepeatPassword"])) {
        $RepeatPasswordErr = "*RepeatPassword is required?";
    } else {
        $RepeatPassword = $_POST["RepeatPassword"];
    }



    if ($first_name && $last_name && $email_address && $password && $RepeatPassword != "") {

        $email_query = "SELECT * FROM `register_form`WHERE `email_address`= '$email_address'";
        $run_query = mysqli_query($conn, $email_query);
        $emailcount = mysqli_num_rows($run_query);
        if ($emailcount > 0) {

            $email_addressErr = "Email already exists.";
        } else {

            $insert_query = "INSERT INTO `register_form`( `first_name`, `last_name`, `email_address`,`phone`,`password`) VALUES ('$first_name','$last_name','$email_address','$phone',$password)";
            $run_query = mysqli_query($conn, $insert_query);
            if ($run_query) {
                $success = "success.";
            }
        }
    }
}
?>

<body class="bg-gradient-primary">

    <div class="container">
        <span><?php echo "success"; ?></span>
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>
                            <form class="user" method="post">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" name="first_name" class="form-control form-control-user" id="exampleFirstNa" placeholder="First Name">
                                        <span class="errorcl"><?php echo $first_nameErr; ?> </span>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" name="last_name" class="form-control form-control-user" id="exampleLastName" placeholder="Last Name">
                                        <span class="errorcl"><?php echo $last_nameErr; ?> </span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email_address" class="form-control form-control-user" id="exampleInputEmail" placeholder="Email Address">
                                    <span class="errorcl"><?php echo $email_addressErr; ?> </span>
                                </div>

                                <div class="form-group">
                                    <input type="number" name="phone" class="form-control form-control-user" id="exampleInputPhone" placeholder="Mobile Number">
                                    <span class="errorcl"><?php echo $phoneErr; ?> </span>
                                </div>


                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" name="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
                                        <span class="errorcl"><?php echo $passwordErr; ?> </span>

                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" name="RepeatPassword" class="form-control form-control-user" id="exampleRepeatPassword" placeholder="Repeat Password">
                                        <span class="errorcl"><?php echo $RepeatPasswordErr; ?> </span>

                                    </div>
                                </div>


                                <input type="submit" class="btn btn-primary" name="submit" value="Submit">
                                <hr>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="forgot-password.php">Forgot Password?</a>
                            </div>
                        </div>
                        <div class="text-center">
                            <a class="small" href="login.php">Already have an account? Login!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>

</body>

</html>
<?php
include('footer.php');
?>