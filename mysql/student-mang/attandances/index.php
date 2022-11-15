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
<!-- DataTables -->
<link rel="stylesheet" href="../adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="../adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="../adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
<link rel="stylesheet" href="../adminlte/plugins/daterangepicker/daterangepicker.css">

<?php include_once("../layouts/end-head-tag.php") ?>
<?php include_once("../layouts/header.php") ?>
<?php include_once("../layouts/sidebar.php") ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Attandances List</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Attandances List</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header" style="display: inline;">
                            <h3 class="card-title">Attandances management area</h3>
                            <a href="create-step-one.php" class="btn btn-primary" style="float: right;">Add New
                                Attandance</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="table1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Date</th>
                                        <th>Student Name</th>
                                        <th>Father Name</th>
                                        <th>Class</th>
                                        <th>Status</th>
                                        <th>Created At</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql = "SELECT 
                                                a.id,
                                                a.date,
                                                a.status,
                                                a.student_id,
                                                a.class_id,
                                                a.created_at,
                                                s.name,
                                                s.father_name,
                                                c.title class_title
                                            FROM
                                                attandances a
                                            LEFT JOIN students s ON s.id = a.student_id
                                            LEFT JOIN classes c ON c.id = a.class_id
                                            ORDER BY created_at DESC
                                        ";

                                    $result = mysqli_query($conn, $sql);
                                    if (mysqli_num_rows($result) > 0) {
                                        $index_number = 1;
                                        while ($row = mysqli_fetch_assoc($result)) {
                                    ?>
                                    <tr>
                                        <td><?php echo $index_number ?></td>
                                        <td><?php echo date("d/m/Y", strtotime($row['date'])) ?></td>
                                        <td><a
                                                href="../students/show.php?id=<?php echo $row['student_id'] ?>"><?php echo $row['name'] ?></a>
                                        </td>
                                        <td><a
                                                href="../students/show.php?id=<?php echo $row['student_id'] ?>"><?php echo $row['father_name'] ?></a>
                                        </td>
                                        <td><?php echo $row['class_title'] ?></td>
                                        <?php
                                                if ($row['status'] == 'present') {
                                                    $status_color = 'success';
                                                } elseif ($row['status'] == 'leave') {
                                                    $status_color = 'warning';
                                                } else {
                                                    $status_color = 'danger';
                                                }
                                                ?>
                                        <td>
                                            <span class="badge badge-<?php echo $status_color ?>">
                                                <?php echo ucfirst($row['status']) ?>
                                            </span>
                                        </td>
                                        <td><?php echo $row['created_at'] ?></td>
                                        <td>
                                            <!-- <a href="show.php?id=<?php echo $row['id'] ?>"
                                                class="btn btn-success btn-sm"><i class="fas fa-eye"></i></a> -->
                                            <a href="edit.php?id=<?php echo $row['id'] ?>&class_id=<?php echo $row['class_id'] ?>"
                                                class="btn btn-info btn-sm"><i class="fas fa-edit"></i></a>

                                            <form action="delete.php" method="POST" class="delete-form"
                                                style="display: inline;">
                                                <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                                                <button type="submit" class="btn btn-danger btn-sm"><i
                                                        class="fas fa-trash"></i></button>
                                            </form>

                                        </td>
                                    </tr>
                                    <?php
                                            $index_number++;
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

<?php include_once("../layouts/footer.php") ?>

<!-- DataTables  & Plugins -->
<script src="../adminlte/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../adminlte/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../adminlte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../adminlte/plugins/jszip/jszip.min.js"></script>
<script src="../adminlte/plugins/pdfmake/pdfmake.min.js"></script>
<script src="../adminlte/plugins/pdfmake/vfs_fonts.js"></script>
<script src="../adminlte/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../adminlte/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../adminlte/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="../adminlte/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../adminlte/dist/js/demo.js"></script>

<!-- Page specific script -->
<script>
$(function() {
    $("#table1").DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
        "order": [
            [6, 'desc']
        ]
    }).buttons().container().appendTo('#table1_wrapper .col-md-6:eq(0)');
});

$(".delete-form").on("submit", function() {
    return confirm("Are you sure to delete?");
});
</script>
<?php include_once("../layouts/end-html.php"); ?>
<?php mysqli_close($conn); ?>