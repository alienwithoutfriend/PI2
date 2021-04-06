<?php
    include 'connection.php';

    class Model extends Connection{

        public function __construct(){
            $this->conn = $this->get_connection();
        }
        public function insertt($nim, $nama, $uts, $uas, $tugas){
            $na = $this->na($uts, $tugas, $uas);
            $status = $this->status($na);
            $sql = "INSERT INTO tbl_nilai (nim, nama, uts, uas, tugas, na, status) VALUES
            ('$nim', '$nama', '$uts', '$uas', '$tugas', '$na', '$status')";
            $this->conn->query($sql);
        }
        public function na($uts, $uas, $tugas){
            $na = (0.3 * $uts)+(0.3 * $uas)+(0.4 * $uas);
            return $na;
        }
        public function status($na){
            $status = "";
            if ($na >= 60 && $na <= 100) {
                $status = "LULUS";
            } else {
                $status = "TIDAK LULUS";
            }
            return $status;
        }
        public function insertmhs($nama, $smt, $alamat, $tlp, $email){
            $sql= "INSERT INTO tbl_mahasiswa (nama, semester, alamat, no_tlp, email) VALUES
            ('$nama', '$smt', '$alamat', '$tlp', '$email')";
            $this->conn->query($sql);
        }
        public function tampil_data(){
            $sql = "SELECT * FROM tbl_nilai";
            $bind = $this->conn->query($sql);
            while ($obj = $bind->fetch_object()) {
                $baris[] = $obj;
            }
            if (!empty($baris)) {
                return $baris;
            }   
        }
        public function tampil_mhs(){
            $sql = "SELECT * FROM tbl_mahasiswa";
            $bind = $this->conn->query($sql);
            while ($obj = $bind->fetch_object()) {
                $baris[] = $obj;
            }
            if (!empty($baris)) {
                return $baris;
            }   
        }
        public function tampil_absen(){
            $sql = "SELECT * FROM tbl_absen";
            $bind = $this->conn->query($sql);
            while ($obj = $bind->fetch_object()) {
                $baris[] = $obj;
            }
            if (!empty($baris)) {
                return $baris;
            }
        }
        public function edit($id){
            $sql = "SELECT * FROM tbl_nilai WHERE nim = '$id'";
            $bind = $this->conn->query($sql);
            while ($obj = $bind->fetch_object()) {
                $baris = $obj;
            }
            return $baris;
        }
        public function editmhs($id){
            $sql = "SELECT * FROM tbl_mahasiswa WHERE id = '$id'";
            $bind = $this->conn->query($sql);
            while ($obj = $bind->fetch_object()) {
                $baris = $obj;
            }
            return $baris;
        }
        public function update($nim, $nama, $uts, $uas, $tugas){
            $na = $this->na($uts, $uas, $tugas);
            $status = $this->status($na);
            $sql = "UPDATE tbl_nilai SET nama='$nama', uts='$uts', uas='$uas', tugas='$tugas',
            na='$na', status='$status' WHERE nim='$nim'";
            $this->conn->query($sql);
        }
        public function updatemhs($id, $nama, $smt, $alamat, $tlp, $email){
            $sql = "UPDATE tbl_mahasiswa SET nama='$nama', semester='$smt', alamat='$alamat', no_tlp='$tlp',
            email='$email' WHERE id='$id'";
            $this->conn->query($sql);
        }
        public function delete($nim){
            $sql = "DELETE FROM tbl_nilai WHERE nim='$nim'";
            $this->conn->query($sql);
        }
        public function deletemhs($id){ 
            $sql = "DELETE FROM tbl_mahasiswa WHERE id='$id'";
            $this->conn->query($sql);
        }
    }
?>