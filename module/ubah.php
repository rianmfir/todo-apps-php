<?php 

    require_once('main.php');
    
    $id = $_POST['id'];
    $aktifitas = $_POST['aktifitas'];

    $sql = "UPDATE todos SET aktifitas = '$aktifitas' WHERE id = $id";
    $eksekusi = query($sql);
    if ($eksekusi) {
        header('Location: ../index.php?pesan=Aktifitas berhasil diubah');
    } else {
        header('Location: ../index.php?pesan=Aktifitas gagal diubah');
    }

?>