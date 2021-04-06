<?php
    include 'model.php';
    
    if (isset($_POST['submit_simpan'])) {
        $nim = $_POST['nim'];
        $nama = $_POST['nama'];
        $uts = $_POST['uts'];
        $uas = $_POST['uas'];
        $tugas = $_POST['tugas'];

        $model = new Model();
        $model->insertt($nim, $nama, $uts, $uas, $tugas);
        header('location:index.php');
    }
    if (isset($_POST['submit_insert'])) {
        $nama = $_POST['nama'];
        $smt = $_POST['semester'];
        $alamat = $_POST['alamat'];
        $tlp = $_POST['telp'];
        $email = $_POST['email'];

        $model = new Model();
        $model->insertmhs($nama, $smt, $alamat, $tlp, $email);
        header('location:mahasiswa.php');
    }
    if (isset($_POST['submit_edit'])) {
        $nim = $_POST['nim'];
        $nama = $_POST['nama'];
        $uts = $_POST['uts'];
        $uas = $_POST['uas'];
        $tugas = $_POST['tugas'];

        $model = new Model();
        $model->update($nim, $nama, $uts, $uas, $tugas);
        header('location:index.php');
    }
    if (isset($_POST['edit_mhs'])) {
        $id = $_POST['id'];
        $nama = $_POST['nama'];
        $smt = $_POST['semester'];
        $alamat = $_POST['alamat'];
        $tlp = $_POST['telp'];
        $email = $_POST['email'];

        $model = new Model();
        $model->updatemhs($id, $nama, $smt, $alamat, $tlp, $email);
        header('location:mahasiswa.php');
    }
    if (isset($_GET['nim'])) {
        $id = $_GET['nim'];
        $model = new Model();
        $model->delete($id);
        header('location:index.php');
    }
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $model = new Model();
        $model->deletemhs($id);
        header('location:mahasiswa.php');
    }
?>