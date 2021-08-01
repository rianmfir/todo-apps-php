<?php 

    require_once('main.php');

    $aktifitas = $_POST['aktifitas'];
    $sql = "INSERT INTO todos (aktifitas) VALUES ('$aktifitas')";
    $eksekusi = query($sql);
    if ($eksekusi) {
        header('Location: ../index.php?pesan=Data berhasil di tambahkan');
    } else {
        header('Location: ../index.php?pesan=Data gagal di tambahkan');
    }

?>