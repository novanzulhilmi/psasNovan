<?php
if (isset($_POST['simpan'])) {
    include_once('config.php');
    $mapel = $_POST['mapel'];
    $jam = $_POST['jam'];

    $sql = "INSERT INTO mapel SET mapel='$mapel', jam='$jam'";
    $result = mysqli_query($con, $sql);
    if ($result) {
        header('location: index.php?m=mapel&s=view');
    } else {
        include "index.php?m=mapel&s=view";
        echo '<script language="JavaScript">';
            echo 'alert("Data Gagal Ditambahkan.")';
        echo '</script>';
    }
}