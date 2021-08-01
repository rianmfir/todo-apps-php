<?php

function koneksi()
{
    $conn = mysqli_connect("localhost", "root", "", "db_todo_apps");
    if (!$conn) {
        die("Koneksi Gagal");
    } else {
        return $conn;
    }
}

function query($query)
{
    $koneksi = koneksi();
    $result = mysqli_query($koneksi, $query);
    return $result;
}

function get_result($result)
{
    $data = [];
    while($row = mysqli_fetch_assoc($result)) 
    {
        $data[] = $row;
    };

    return $data;
}

function notifikasi($pesan)
{
    echo "<script>alert('$pesan')</script>";
}

?>  