<?php

include('config/db.php');
include('classes/DB.php');
include('classes/Todo.php');
include('classes/TipeTugas.php');
include('classes/MataKuliah.php');
include('classes/Template.php');


$matkul = new MataKuliah($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);
$data = new Todo($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);
$tipe = new TipeTugas($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);

if (isset($_GET['ubah'])) {
    $id = $_GET['ubah'];
    if ($id > 0) {
        $data->open();
        $data->getTodoById($id);
        while ($row = $data->getResult()) {
            $nama_tugas = $row['nama_tugas'];
            $tipe_id = $row['id_tipe'];
            $matkul_id = $row['id_matkul'];
            $deskripsi = $row['deskripsi'];
            $deadline = $row['deadline'];
        }
        $data->close();
        $tipe->open();
        $tipe->getTipe();
        while ($row = $tipe->getResult()) {
            if ($row['id'] == $tipe_id) {
                $opsi1 .= "<option value=" . $row['id'] . " selected>" . $row['tipe'] . "</option>";
            } else {
                $opsi1 .= "<option value=" . $row['id'] . ">" . $row['tipe'] . "</option>";
            }
        }
        $tipe->close();
        $matkul->open();
        $matkul->getMatkul();
        while ($row = $matkul->getResult()) {
            if ($row['id'] == $matkul_id) {
                $opsi2 .= "<option value=" . $row['id'] . " selected>" . $row['mata_kuliah'] . "</option>";
            } else {
                $opsi2 .= "<option value=" . $row['id'] . ">" . $row['mata_kuliah'] . "</option>";
            }
        }
        $matkul->close();
    }
}



$view = new Template('templates/skinindexedit.html');
$view->replace('ACTION_FORM', 'EditTodo_pro.php?id=' . $id);
$view->replace('NAMA_TUGAS', $nama_tugas);
$view->replace('OPTION_1', $opsi1);
$view->replace('OPTION_2', $opsi2);
$view->replace('DESKRIPSI', $deskripsi);
$view->replace('DEAD', $deadline);
$view->write();
