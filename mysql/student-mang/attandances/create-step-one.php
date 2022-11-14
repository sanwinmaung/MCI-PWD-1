<?php

session_start();

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: ../auth/login.php");
    exit;
}

require_once("../config/db_connection.php");

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
                        <li class="breadcrumb-item active">Step one</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card card-info">
            <div class="card-header">
                Choose class
            </div>
            <div class="card-body pb-0">
                <div class="row">
                    <?php
                    $sql = "SELECT * FROM classes";
                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                        <div class="card bg-light d-flex flex-fill">
                            <div class="card-body pt-0">
                                <div class="row">
                                    <div class="col-12">
                                        <h3 class="mt-2" style="text-align: center;">
                                            <b><?php echo $row['title'] ?></b>
                                        </h3>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="text-center">
                                    <a href="create-step-two.php?class_id=<?php echo $row['id'] ?>"
                                        class="btn btn-sm btn-primary">
                                        Select
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
        <!-- /.card -->

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