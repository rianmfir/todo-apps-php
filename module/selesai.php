<?php 

    require_once('main.php');

    $id = $_GET['id'];
    $sql = "UPDATE todos SET selesai = 1 WHERE id = $id";
    $eksekusi = query($sql);
    if ($eksekusi) {
        header('Location: ../index.php?pesan=Aktifitas berhasil diselesaikan');
    } else {
        header('Location: ../index.php?pesan=Aktifitas gagal diselesaikan');
    }

?>