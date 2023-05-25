<?php

include('config/db.php');
include('classes/DB.php');
include('classes/TipeTugas.php');
include('classes/Template.php');

$view = new Template('templates/skintabeledit.html');
$tipe = new TipeTugas($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);
$tipe->open();


if (isset($_GET['update'])) {
    $id = $_GET['update'];
    $tipe->getTipeById($id);
    while ($row = $tipe->getResult()) {
        $tipetugas = $row['tipe'];
    }
    $view->replace('ACTION_FORM', 'tipeaddit.php?updating=' . $id);
    $view->replace('NAME_FIELD', 'tipe');
    $view->replace('NAME', $tipetugas);
    $view->replace('PLACE_HOLD', 'Tipe Tugas');
    $view->write();
}

if (isset($_GET['add'])) {
    $view->replace('ACTION_FORM', 'tipeaddit.php?adding=1');
    $view->replace('NAME_FIELD', 'tipe');
    $view->replace('NAME', '');
    $view->replace('PLACE_HOLD', 'Tipe Tugas');
    $view->write();
}


if (isset($_POST)) {
    if (isset($_GET['updating'])) {
        $id = $_GET['updating'];
        if ($tipe->updateTipe($id, $_POST)) {
            echo "<script>
            alert('Data berhasil diubah!');
            document.location.href = 'tipetugas.php';
            </script>";
        } else {
            echo "<script>
            alert('Data gagal diubah!');
            document.location.href = 'tipeaddit.php?update='" . $id . ";
            </script>";
        }
    } else if (isset($_GET['adding'])) {
        if ($tipe->addTipe($_POST)) {
            echo "<script>
            alert('Data berhasil ditambahkan!');
            document.location.href = 'tipetugas.php';
            </script>";
        } else {
            echo "<script>
            alert('Data gagal ditambahkan!');
            document.location.href = 'tipeaddit.php?add=1';
            </script>";
        }
    }
}



$tipe->close();
