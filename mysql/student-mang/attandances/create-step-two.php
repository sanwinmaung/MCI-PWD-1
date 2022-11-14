<?php

session_start();

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: ../auth/login.php");
    exit;
}

require_once("../config/db_connection.php");

$student_id = $date = $status = "";

$student_id_error = $status_error = $date_error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $class = $_POST["class_id"];

    if (empty(trim($_POST["student_id"]))) {
        $student_id_error = "Please select student.";
    } else {
        $student_id = trim($_POST["student_id"]);
    }

    if (empty(trim($_POST["date"]))) {
        $date_error = "Please select attandance date.";
    } else {
        $date = trim($_POST["date"]);
    }

    if (empty(trim($_POST["status"]))) {
        $status_error = "Please select status.";
    } else {
        $status = trim($_POST["status"]);
    }

    if (empty($student_id_error) && empty($date_error) && empty($status_error)) {

        $sql = "INSERT INTO attandances (student_id, class_id, date, status) VALUES (?, ?, ?, ?)";

        if ($stmt = mysqli_prepare($conn, $sql)) {
            mysqli_stmt_bind_param($stmt, "ssss", $param_student_id, $param_class_id, $param_date, $param_status);

            $param_student_id = $student_id;
            $param_class_id = $class;
            $param_date = date("Y-m-d", strtotime($date));
            $param_status = $status;

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
                    <h1>Create Attandance Form</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="index.php">Attandances List</a></li>
                        <li class="breadcrumb-item"><a href="create-step-one.php">Step One</a></li>
                        <li class="breadcrumb-item active">Step Two</li>
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
                            <h3 class="card-title">Fill Informations:</h3>
                        </div>
                        <div class="card-body">

                            <p class="danger-color">All star(*) fields are required!</p>

                            <form action="<?php $_PHP_SELF ?>" method="POST">

                                <input type="hidden" name="class_id" value="<?php echo $_GET['class_id'] ?>">

                                <div class="form-group">
                                    <label for="student_id">Student <span class="danger-color">*</span> :</label>
                                    <select
                                        class="form-control <?php echo (!empty($student_id_error)) ? 'is-invalid' : '' ?>"
                                        id="student_id" name="student_id" required>
                                        <option value="" selected disabled>Choose Student</option>

                                        <?php
                                        $class_id = $_GET['class_id'];
                                        $sql = "SELECT id, name, father_name FROM students WHERE class_id=$class_id";
                                        $result = mysqli_query($conn, $sql);
                                        if (mysqli_num_rows($result) > 0) {
                                            $index_number = 1;
                                            while ($row = mysqli_fetch_assoc($result)) {
                                        ?>
                                        <option value="<?php echo $row['id'] ?>">
                                            <?php echo $row['name'] . '(' . $row['father_name'] . ')' ?></option>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </select>

                                    <span class="invalid-feedback"><?php echo $student_id_error ?></span>
                                </div>

                                <div class="form-group">
                                    <label for="date">Attandance Date <span class="danger-color">*</span>:</label>
                                    <div class="input-group date " id="date" data-target-input="nearest">
                                        <input type="text"
                                            class="form-control  <?php echo (!empty($date_error)) ? 'is-invalid' : '' ?> datetimepicker-input"
                                            data-target="#date" id="date" name="date" />
                                        <div class="input-group-append" data-target="#date"
                                            data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>

                                        <span class="invalid-feedback"><?php echo $date_error ?></span>

                                    </div>

                                </div>

                                <div class="form-group">
                                    <label for="status">Status <span class="danger-color">*</span> :</label>
                                    <select
                                        class="form-control <?php echo (!empty($status_error)) ? 'is-invalid' : '' ?>"
                                        id="status" name="status" required>

                                        <option value="" selected disabled>Choose Status</option>
                                        <option value="present">Present</option>
                                        <option value="absent">Absent</option>
                                        <option value="leave">Leave</option>
                                    </select>

                                    <span class="invalid-feedback"><?php echo $status_error ?></span>
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
    $('#date').datetimepicker({
        format: 'L'
    });
});
</script>
<?php include_once("../layouts/end-html.php"); ?>
<?php mysqli_close($conn); ?>