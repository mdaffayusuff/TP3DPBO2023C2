<?php

include('config/db.php');
include('classes/DB.php');
include('classes/Todo.php');
include('classes/Template.php');

$data = new Todo($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);
$data->open();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if ($id > 0) {
        $data->getTodoById($id);
        while ($row = $data->getResult()) {
            $nama_tugas = $row['nama_tugas'];
            $tipe = $row['tipe'];
            $matkul = $row['mata_kuliah'];
            $deskripsi = $row['deskripsi'];
            $deadline = $row['deadline'];
        }
    }
}

if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    if ($id > 0) {
        if ($data->deleteTodo($id) > 0) {
            echo "<script>
            alert('Data berhasil dihapus!');
            document.location.href = 'index.php';
            </script>";
        } else {
            echo "<script>
            alert('Data gagal dihapus!');
            document.location.href = 'detail.php?id='" . $id . ";
            </script>";
        }
    }
}



$detail = new Template('templates/skindetail.html');
$detail->replace('TUGAS', $nama_tugas);
$detail->replace('TIPE', $tipe);
$detail->replace('MATKUL', $matkul);
$detail->replace('DESKRIP', $deskripsi);
$detail->replace('DEAD', $deadline);
$detail->replace('ID', $id);
$detail->write();
