<?php

include('config/db.php');
include('classes/DB.php');
include('classes/TipeTugas.php');
include('classes/MataKuliah.php');
include('classes/Template.php');


$matkul = new MataKuliah($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);

$tipe = new TipeTugas($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);
$tipe->open();
$tipe->getTipe();


while ($row = $tipe->getResult()) {
    $opsi1 .= "<option value=" . $row['id'] . ">" . $row['tipe'] . "</option>";
}
$tipe->close();

$matkul->open();
$matkul->getMatkul();

while ($row = $matkul->getResult()) {
    $opsi2 .= "<option value=" . $row['id'] . ">" . $row['mata_kuliah'] . "</option>";
}
$matkul->close();


$view = new Template('templates/skinindexedit.html');
$view->replace('ACTION_FORM', 'AddTodo_pro.php');
$view->replace('NAMA_TUGAS', "");
$view->replace('OPTION_1', $opsi1);
$view->replace('OPTION_2', $opsi2);
$view->replace('DESKRIPSI', "");
$view->replace('DEAD', "");
$view->write();
