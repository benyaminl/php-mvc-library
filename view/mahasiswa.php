<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mahasiswa View</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
</head>
<body class="container">
    <h1 class="mt-5">Data Mahasiswa</h1><br/><br/>
    <table id="tabel" class="table table-stripped mt-4" style="width:100%">
        <thead>
            <tr>
                <th>NRP</th>
                <th>NAMA</th>
                <th>Email</th>
                <th>Telp</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $d) : ?>
            <tr>
                <td><?php echo $d["nrp"] ?></td>
                <td><?php echo $d["nama"] ?></td>
                <td style='background-color: yellow;'><?php echo $d["email"] ?></td>
                <td><?php echo $d["telp"] ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
    <script>
    // @see https://datatables.net/examples/styling/bootstrap4.html
    // @see https://datatables.net/examples/advanced_init/length_menu.html
    // @see https://datatables.net/examples/basic_init/multi_col_sort.html
    
    $("#tabel").DataTable({
        pageLength: 5,
        "lengthMenu": [[ 5,10, 25, 50, -1], [ 5,10, 25, 50, "All"]],
        'columnDefs': [ { 
            // @see https://datatables.net/reference/option/columnDefs
            'targets': [2], /* table column index */
            'orderable': false, /* true or false */
        }]
    });
    </script>
    <br><br>
    <h4>Urutan Panggil nya (Angka besar ke kecil)</h4>
    <pre><?php debug_print_backtrace(); ?></pre>
</body>
</html>