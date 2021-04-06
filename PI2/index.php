<?php
    include 'model.php';
    $model = new Model();
    $index = 1;
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Data Mahasiswa</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css"
        rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6"
        crossorigin="anonymous">
    </head>
<body>
        <?php
            include 'navbar.php';
        ?>
    <div class="container-fluid">
        <h1>DATA NILAI MAHASISWA</h1>
        <a href="create.php"> Tambah Data</a><br>
        <a href="print.php" target="_blank">Cetak Data</a><br>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>NIM</th>
                    <th>NAMA</th>
                    <th>UAS</th>
                    <th>UTS</th>
                    <th>TUGAS</th>
                    <th>NA</th>
                    <th>STATUS</th>
                    <th>AKSI</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $result = $model->tampil_data();
                    if (!empty($result)) {
                        foreach ($result as $data) : ?>
                <tr>
                    <td><?= $index++ ?></td>
                    <td><?= $data->nim ?></td>
                    <td><?= $data->nama ?></td>
                    <td><?= $data->uts ?></td>
                    <td><?= $data->uas ?></td>
                    <td><?= $data->tugas ?></td>
                    <td><?= $data->na ?></td>
                    <td><?= $data->status ?></td>
                    <td>
                        <a name="edit" id="edit" href="edit.php?nim=<?=$data->nim?>">Edit</a>
                        <a name="delete" id="delete" href="proces.php?nim=<?=$data->nim?>">Delete</a>
                    </td>
                </tr>
                <?php endforeach;
                    }else { ?>
                <tr>
                    <td colspan="9">Belum Ada Data Pada Tabel Nilai Mahasiswa</td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf"
    crossorigin="anonymous"></script>
</body>
</html>