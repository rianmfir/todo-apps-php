<?php 
    require_once("module/main.php"); 
    
    if (isset($_GET['pesan'])) {
        notifikasi($_GET['pesan']);
    }

?>

<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>

    <div class="container">
        <h2><a href="index.php">Aplikasi Todo List</a></h2>
        <p>kelola keseharianmu disini</p>

        <?php if(isset($_GET['aksi']) && $_GET['aksi'] == 'tambah') : ?>
        <form action="module/tambah.php" method="POST">
            <div class="row">   
                <div class="col-75">
                    <input type="text" id="aktifitas" name="aktifitas" placeholder="Mau melakukan apa hari ini?">
                </div>
                <div class="col-25">
                    <input type="submit" value="Submit">
                </div>
            </div>
        </form>
        <?php endif; ?>
        
        <?php if(isset($_GET['aksi']) && $_GET['aksi'] == 'ubah') : ?>
        <form action="module/ubah.php" method="POST">
            <div class="row"> 
                <input type="hidden" value="<?= $_GET['id']; ?>" name="id">  
                <div class="col-75">
                    <input value="<?= $_GET['aktifitas']; ?>" type="text" id="aktifitas" name="aktifitas" placeholder="Mau melakukan apa hari ini?">
                </div>
                <div class="col-25">
                    <input type="submit" value="ubah">
                </div>
            </div>
        </form>
        <?php endif; ?> 

        <br>
        <?php if (isset($_GET['aksi'])) : ?>
            <a href="index.php" class="badge badge-coklat">batal</a>
        <?php else: ?>
            <a href="index.php?aksi=tambah" class="badge badge-coklat">tambah</a>
        <?php endif; ?>
        <br>
        <br>
        <ul>
            <?php
                $sql = "SELECT * FROM todos"; 
                $result = query($sql);
                $todos = get_result($result);
            ?>

            <?php foreach($todos as $todo) : ?>
                <li class=" <?= $todo['selesai'] == 1 ? 'selesai' : ''; ?> "> <?= $todo['aktifitas']; ?>
                    <div class="action">
                        <?php if($todo['selesai'] == 0) : ?>
                            <a href="module/selesai.php?id=<?= $todo['id']; ?>" class="badge badge-biru">selesai</a>
                            <a href="index.php?aksi=ubah&id=<?= $todo['id']; ?>&aktifitas=<?= $todo['aktifitas']; ?>" class="badge badge-cream">ubah</a>
                        <?php endif; ?>
                        <a href="module/hapus.php?id=<?= $todo['id']; ?>" class="badge badge-merah">hapus</a>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
    </body>
</html>