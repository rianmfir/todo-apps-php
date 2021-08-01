<?php 

    require_once('main.php');

    $id = $_GET['id'];
    $sql = "DELETE FROM todos WHERE id = $id";
    $eksekusi = query($sql);
    if ($eksekusi) {
        header('Location: ../index.php?pesan=Data berhasil di hapus');
    } else {
        header('Location: ../index.php?pesan=Data gagal di hapus');
    }

?>