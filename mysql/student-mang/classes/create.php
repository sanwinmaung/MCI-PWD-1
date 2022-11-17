<?php

session_start();

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: ../auth/login.php");
    exit;
}

require_once("../config/db_connection.php");

$title = "";

$title_error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (!empty(trim($_POST["title"]))) {

        $class_title = trim($_POST["title"]);
        $sql = "SELECT * FROM classes WHERE title='$class_title'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) == 1) {
            $title_error = "This class is already taken.";
        } else {
            $title = $class_title;
        }
    }

    if (empty($title_error)) {

        $sql = "INSERT INTO classes (title) VALUES (?)";

        if ($stmt = mysqli_prepare($conn, $sql)) {
            mysqli_stmt_bind_param($stmt, "s", $param_title);
            $param_title = $title;
            if (mysqli_stmt_execute($stmt)) {
                header("location: index.php");
            } else {
                echo "Oops! Something wrong. Please try again later.";
            }
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
                    <h1>Create Class Form</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="index.php">Classes List</a></li>
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
                            <h3 class="card-title">Fill Class Informations:</h3>
                        </div>
                        <div class="card-body">

                            <p class="danger-color">All star(*) fields are required!</p>

                            <form action="<?php $_PHP_SELF ?>" method="POST">

                                <div class="form-group">
                                    <label for="title">Title <span class="danger-color">*</span> :</label>
                                    <input type="text"
                                        class="form-control <?php echo (!empty($title_error)) ? 'is-invalid' : '' ?>"
                                        id="title" name="title" value="<?php echo $title ?>" autofocus required>

                                    <span class="invalid-feedback"><?php echo $title_error ?></span>
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
<?php include_once("../layouts/end-html.php"); ?>
<?php mysqli_close($conn); ?>