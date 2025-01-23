<?php

if (isset($_POST['hitung'])) {
    $invest = $_POST['invest'];
    $rate = $_POST['rate'];
    $year = $_POST['year'];
    $discount = $_POST['discount'];
} else {
    header('Location: form.php');
}

isset($invest) ? $invest : $invest = 0;
isset($rate) ? $rate : $rate = 0;
isset($year) ? $year : $year = 0;
isset($discount) ? $discount : $discount = 0;

$npv = 0;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil NPV</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        body {
            font-family: 'Source Sans Pro', sans-serif;
            background-color: #f8f9fa;
        }

        .card-header {
            background-color: #343a40;
            color: white;
        }

        .card-title {
            font-weight: bold;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        td {
            text-align: center;
            padding: 10px;
        }

        tr:nth-child(even) {
            background-color: #e9ecef;
        }

        tr:hover {
            background-color: #dee2e6;
        }

        .table-bordered {
            border: 1px solid #6c757d;
        }

        .table-bordered th,
        .table-bordered td {
            border: 1px solid #6c757d;
        }
    </style>
</head>

<body>
    <div class="vh-100">
        <div class="card-header">
            <h3 class="card-title">Hasil NPV</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr class="bg-primary text-white">
                        <th>Tahun</th>
                        <th>Discount <?= $discount ?>%</th>
                        <th>Net saving</th>
                        <th>Present</th>
                    </tr>
                </thead>
                <tbody>
                    <?php for ($i = 0; $i <= $year; $i++) : ?>
                        <tr>
                            <td><?= $i ?></td>
                            <td><?= $dis = 1 / pow((1 + $discount / 100), $i);  ?></td>
                            <td>
                                <?php
                                if ($i == 0) {
                                    $net = -$invest;
                                    echo 'Rp. ' . number_format($net, 0, " ", ".");
                                } else {
                                    $net = $rate;
                                    echo 'Rp. ' . number_format($net, 0, " ", ".");
                                }
                                ?>
                            </td>
                            <td>
                                <?php $presents[] = $dis * $net; ?>
                                Rp. <?= number_format($presents[$i], 0, " ", "."); ?>
                            </td>
                        </tr>
                    <?php endfor; ?>
                    <tr class="bg-primary text-white">
                        <td align="center">NPV</td>
                        <td></td>
                        <td></td>
                        <td>Rp. <?= number_format(array_sum($presents), 0, " ", "."); ?></td>
                    </tr>
                </tbody>
                <tfoot>

                </tfoot>
            </table>
            <a class="btn btn-primary" href="form.php">Kembali</a>

        </div>
        <!-- /.card-body -->
    </div>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables  & Plugins -->
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.5/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.bootstrap4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.colVis.min.js"></script>
    <!-- Page specific script -->
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
                "searching": false,
                "paging": false,
                "info": false
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
</body>

</html>