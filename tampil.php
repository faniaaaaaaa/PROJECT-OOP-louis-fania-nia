<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php

class DatabaseConnection {
    private $server;

    public function __construct($host, $username, $password, $database) {
        $this->server = mysqli_connect($host, $username, $password, $database);
    }

    public function getServer() {
        return $this->server;
    }
}

$databaseConnection = new DatabaseConnection("localhost", "root", "", "oper");
$server = $databaseConnection->getServer();

$sql = "SELECT * FROM `operator`";

$query = mysqli_query($server, $sql);
echo "<script>
alert ('Data berhasil dihapus!');
</script>";

?>

<table border="1" cellspacing="20" cellpadding="10">
    <tr>
        <th>Nis</th>
        <th>nilai1</th>
        <th>nilai2</th>
        <th>nilai3</th>
        <th>nilai4</th>
        <th>nilai5</th>
        <th>nilai6</th>
        <th>Rata rata</th>
        <th>Aksi</th>
    </tr>
<?php if(mysqli_num_rows($query) > 0) { ?>
    <?php while($rows = mysqli_fetch_assoc($query)){ ?>
        <tr>
            <td><?php echo $rows["nis"]?></td>
            <td><?php echo $rows["nilai1"]?></td>
            <td><?php echo $rows["nilai2"]?></td>
            <td><?php echo $rows["nilai3"]?></td>
            <td><?php echo $rows["nilai4"]?></td>
            <td><?php echo $rows["nilai5"]?></td>
            <td><?php echo $rows["nilai6"]?></td>
            <?php
            $nilai1 = $rows["nilai1"];
            $nilai2 = $rows["nilai2"];
            $nilai3 = $rows["nilai3"];
            $nilai4 = $rows["nilai4"];
            $nilai5 = $rows["nilai5"];
            $nilai6 = $rows["nilai6"];
            $rata2 = ($nilai1 + $nilai2 + $nilai3 + $nilai4 + $nilai5 + $nilai6) / 6;
            ?>
            <td><?= $rata2; ?></td>
            <td><a href="hapus.php?nis=<?php echo $rows['nis'] ?>" class="btn-">Hapus</a></td>
        </tr>
    <?php } ?>
<?php } ?>    
</table>
<br>
<a href="coba.php">Masukan Nilai lagi...</a>
</body>
</html>