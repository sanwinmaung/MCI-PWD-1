<?php

session_start();

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: ../auth/login.php");
    exit;
}

require_once("../config/db_connection.php");

$name = $father_name = $mobile = $date_of_birth = $email = $address = "";

$name_error = $father_name_error = $mobile_error = $email_error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty(trim($_POST["name"]))) {
        $name_error = "Please enter a name.";
    } else {
        $name = trim($_POST["name"]);
    }

    if (empty(trim($_POST["father_name"]))) {
        $father_name_error = "Please enter a father name.";
    } else {
        $father_name = trim($_POST["father_name"]);
    }

    if (empty(trim($_POST["mobile"]))) {
        $mobile_error = "Please enter a mobile number.";
    } elseif (!preg_match('/[0-9]/', trim($_POST["mobile"]))) {
        $mobile_error = "Please enter number only.";
    } else {
        $mobile = trim($_POST["mobile"]);
    }

    if (!empty(trim($_POST["date_of_birth"]))) {
        $date_of_birth = trim($_POST["date_of_birth"]);
    }

    if (!empty(trim($_POST["email"]))) {

        $sql = "SELECT email FROM students WHERE email = ?";

        if ($stmt = mysqli_prepare($conn, $sql)) {

            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_email);

            // Set parameters
            $param_email = trim($_POST["email"]);

            if (mysqli_stmt_execute($stmt)) {
                // store result
                mysqli_stmt_store_result($stmt);

                if (mysqli_stmt_num_rows($stmt) == 1) {
                    $email_error = "This email is already taken.";
                } else {
                    $email = trim($_POST["email"]);
                }

                // Close statement
                mysqli_stmt_close($stmt);
            }
        }
    }

    if (!empty(trim($_POST["address"]))) {
        $address = trim($_POST["address"]);
    }

    if (empty($name_error) && empty($father_name_error) && empty($mobile_error)) {

        $sql = "INSERT INTO students (name, father_name, mobile, date_of_birth, email, address) VALUES (?, ?, ?, ?, ?, ?)";

        if ($stmt = mysqli_prepare($conn, $sql)) {

            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssssss", $param_name, $param_father_name, $param_mobile, $param_date_of_birth, $param_email, $param_address);

            // Set parameters
            $param_name = $name;
            $param_father_name = $father_name;
            $param_mobile = $mobile;
            $param_date_of_birth = date("Y-m-d", strtotime($date_of_birth));
            $param_email = $email;
            $param_address = $address;

            if (mysqli_stmt_execute($stmt)) {
                // Redirect to students list page
                header("location: index.php");
            } else {
                echo "Oops! Something wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
}

?>
<?php include_once("../layouts/top-html-start-head-tag.php") ?>

<!-- Page Css -->
<!-- daterange picker -->
<link rel="stylesheet" href="../adminlte/plugins/daterangepicker/daterangepicker.css">
<!-- iCheck for checkboxes and radio inputs -->
<link rel="stylesheet" href="../adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
<!-- Bootstrap Color Picker -->
<link rel="stylesheet" href="../adminlte/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
<!-- Tempusdominus Bootstrap 4 -->
<link rel="stylesheet" href="../adminlte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
<!-- Select2 -->
<link rel="stylesheet" href="../adminlte/plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="../adminlte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
<!-- Bootstrap4 Duallistbox -->
<link rel="stylesheet" href="../adminlte/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
<!-- BS Stepper -->
<link rel="stylesheet" href="../adminlte/plugins/bs-stepper/css/bs-stepper.min.css">
<!-- dropzonejs -->
<link rel="stylesheet" href="../adminlte/plugins/dropzone/min/dropzone.min.css">

<?php include_once("../layouts/end-head-tag.php") ?>
<?php include_once("../layouts/header.php") ?>
<?php include_once("../layouts/sidebar.php") ?>


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Create Student Form</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="index.php">Students List</a></li>
                        <li class="breadcrumb-item active">Create</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Fill Student Informations:</h3>
                        </div>
                        <div class="card-body">

                            <p class="danger-color">All star(*) fields are required!</p>

                            <form action="<?php $_PHP_SELF ?>" method="POST">

                                <div class="form-group">
                                    <label for="name">Name <span class="danger-color">*</span> :</label>
                                    <input type="text"
                                        class="form-control <?php echo (!empty($name_error)) ? 'is-invalid' : '' ?>"
                                        id="name" name="name" value="<?php echo $name ?>" autofocus required>

                                    <span class="invalid-feedback"><?php echo $name_error ?></span>
                                </div>

                                <div class="form-group">
                                    <label for="father_name">Father Name <span class="danger-color">*</span> :</label>
                                    <input type="text"
                                        class="form-control <?php echo (!empty($father_name_error)) ? 'is-invalid' : '' ?>"
                                        id="father_name" name="father_name" value="<?php echo $father_name ?>" required>

                                    <span class="invalid-feedback"><?php echo $father_name_error ?></span>
                                </div>

                                <div class="form-group">
                                    <label for="mobile">Mobile <span class="danger-color">*</span> :</label>
                                    <input type="number"
                                        class="form-control <?php echo (!empty($mobile_error)) ? 'is-invalid' : '' ?>"
                                        id="mobile" name="mobile" value="<?php echo $mobile ?>" required>

                                    <span class="invalid-feedback"><?php echo $mobile_error ?></span>
                                </div>

                                <!-- Date -->
                                <div class="form-group">
                                    <label for="date_of_birth">Date of Birth:</label>
                                    <div class="input-group date" id="date_of_birth" data-target-input="nearest">
                                        <input type="text" class="form-control datetimepicker-input"
                                            data-target="#date_of_birth" id="date_of_birth" name="date_of_birth" />
                                        <div class="input-group-append" data-target="#date_of_birth"
                                            data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="email">Email:</label>
                                    <input type="email"
                                        class="form-control <?php echo (!empty($email_error)) ? 'is-invalid' : '' ?>"
                                        id="email" name="email" value="<?php echo $email ?>">

                                    <span class="invalid-feedback"><?php echo $email_error ?></span>
                                </div>

                                <div class="form-group">
                                    <label for="address">Address:</label>
                                    <input type="text" class="form-control" id="address" name="address"
                                        value="<?php echo $address ?>">
                                </div>

                                <div class="form-group" style="display: flex;justify-content: space-between;">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <a href="index.php" class="btn btn-secondary">Cancel</a>
                                </div>
                            </form>

                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

<?php include_once("../layouts/footer.php") ?>

<!-- Select2 -->
<script src="../adminlte/plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="../adminlte/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- InputMask -->
<script src="../adminlte/plugins/moment/moment.min.js"></script>
<script src="../adminlte/plugins/inputmask/jquery.inputmask.min.js"></script>
<!-- date-range-picker -->
<script src="../adminlte/plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap color picker -->
<script src="../adminlte/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="../adminlte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Bootstrap Switch -->
<script src="../adminlte/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!-- BS-Stepper -->
<script src="../adminlte/plugins/bs-stepper/js/bs-stepper.min.js"></script>
<!-- dropzonejs -->
<script src="../adminlte/plugins/dropzone/min/dropzone.min.js"></script>

<script>
$(function() {
    $('#date_of_birth').datetimepicker({
        format: 'L'
    });
});
</script>
<?php include_once("../layouts/end-html.php"); ?>
<?php mysqli_close($conn); ?>