<?php
class DeleteData {
    private $server;

    public function __construct($server) {
        $this->server = $server;
    }

    public function deleteData($nis) {
        $sql = "DELETE FROM operator WHERE nis = '$nis'";
        $query = mysqli_query($this->server, $sql);
        
        if ($query) {
            echo "Data berhasil dihapus!";
            echo "<a href='tampil.php'> Tampilkan Data</a>";
        } else {
            echo "Penghapusan gagal : <br>" . mysqli_error($this->server);
        }
    }
}

$server = new mysqli("localhost", "root", "", "oper");
$deleteData = new DeleteData($server);
$nis = $_GET['nis'];
$deleteData->deleteData($nis);
?>