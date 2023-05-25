<?php

include('config/db.php');
include('classes/DB.php');
include('classes/MataKuliah.php');
include('classes/Template.php');

$view = new Template('templates/skintabeledit.html');
$matkul = new MataKuliah($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);
$matkul->open();


if (isset($_GET['update'])) {
    $id = $_GET['update'];
    $matkul->getMatkulById($id);
    while ($row = $matkul->getResult()) {
        $matakuliah = $row['mata_kuliah'];
    }
    $view->replace('ACTION_FORM', 'matkuladdit.php?updating=' . $id);
    $view->replace('NAME_FIELD', 'mata_kuliah');
    $view->replace('NAME', $matakuliah);
    $view->replace('PLACE_HOLD', 'Mata Kuliah');
    $view->write();
}

if (isset($_GET['add'])) {
    $view->replace('ACTION_FORM', 'matkuladdit.php?adding=1');
    $view->replace('NAME_FIELD', 'mata_kuliah');
    $view->replace('NAME', '');
    $view->replace('PLACE_HOLD', 'Mata Kuliah');
    $view->write();
}


if (isset($_POST)) {
    if (isset($_GET['updating'])) {
        $id = $_GET['updating'];
        if ($matkul->updateMatkul($id, $_POST)) {
            echo "<script>
            alert('Data berhasil diubah!');
            document.location.href = 'matkul.php';
            </script>";
        } else {
            echo "<script>
            alert('Data gagal diubah!');
            document.location.href = 'matkuladdit.php?update='" . $id . ";
            </script>";
        }
    } else if (isset($_GET['adding'])) {
        if ($matkul->addMatkul($_POST)) {
            echo "<script>
            alert('Data berhasil ditambahkan!');
            document.location.href = 'matkul.php';
            </script>";
        } else {
            echo "<script>
            alert('Data gagal ditambahkan!');
            document.location.href = 'matkuladdit.php?add=1';
            </script>";
        }
    }
}



$matkul->close();
