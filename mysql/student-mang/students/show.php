<?php

session_start();

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: ../auth/login.php");
    exit;
}

require_once("../config/db_connection.php");

$name = $father_name = $mobile = $date_of_birth = $email = $address =  $id = "";

if (!empty($_GET['id'])) {

    $id = $_GET['id'];
    $sql = "SELECT * FROM students WHERE id=$id";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {

        $row = mysqli_fetch_assoc($result);
        $name = $row['name'];
        $father_name = $row['father_name'];
        $mobile = $row['mobile'];
        $date_of_birth = date("m/d/Y", strtotime($row['date_of_birth']));
        $email = $row['email'];
        $address = $row['address'];
    } else {
        header("location: index.php");
        exit;
    }
} else {
    header("location: index.php");
    exit;
}

?>

<?php include_once("../layouts/top-html-start-head-tag.php") ?>
<?php include_once("../layouts/end-head-tag.php") ?>
<?php include_once("../layouts/header.php") ?>
<?php include_once("../layouts/sidebar.php") ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Students Details</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="index.php">Students List</a></li>
                        <li class="breadcrumb-item active">Students Details</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">

                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle"
                                    src="../adminlte/dist/img/user4-128x128.jpg" alt="User profile picture">
                            </div>

                            <h3 class="profile-username text-center">
                                <?php echo $row['name'] ?? '' ?></h3>

                            <p class="text-muted text-center"><?php echo $row['mobile'] ?? '' ?></p>

                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>Father Name</b> <a
                                        class="float-right"><?php echo $row['father_name'] ?? '' ?></a>
                                </li>
                                <li class="list-group-item">
                                    <b>Date of Birth</b> <a
                                        class="float-right"><?php echo $row['date_of_birth'] ? date("d M Y", strtotime($row['date_of_birth'])) : '' ?></a>
                                </li>
                                <li class="list-group-item">
                                    <b>Email</b> <a class="float-right"><?php echo $row['email'] ?? '' ?></a>
                                </li>
                                <li class="list-group-item">
                                    <b>Address</b> <a class="float-right"><?php echo $row['address'] ?? '' ?></a>
                                </li>
                            </ul>

                            <a href="index.php" class="btn btn-primary btn-block"><b>Back</b></a>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->

            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>

</div>

<?php include_once("../layouts/footer.php") ?>
<?php include_once("../layouts/end-html.php"); ?>
<?php mysqli_close($conn); ?>