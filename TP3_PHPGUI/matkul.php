<?php

include('config/db.php');
include('classes/DB.php');
include('classes/MataKuliah.php');
include('classes/Template.php');

$view = new Template('templates/skintabeldark.html');
$matkul = new MataKuliah($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);
$matkul->open();
$matkul->getMatkul();



$pageTitle = 'Daftar Mata Kuliah';
$mainTitle = 'Mata Kuliah';
$header = '<tr>
<th scope="row">No.</th>
<th scope="row">Nama Mata Kuliah</th>
<th scope="row">Action</th>
</tr>';
$data = null;
$no = 1;

while ($row = $matkul->getResult()) {
    $data .= '<tr>
    <th scope="row">' . $no . '</th>
    <td>' . $row['mata_kuliah'] . '</td>
    <td style="font-size: 22px;">
    <a href="matkuladdit.php?update=' . $row['id'] . '" title="Edit Data"><i class="bi bi-pen-fill text-warning m-2"></i></a>&nbsp;<a href="matkul.php?hapus=' . $row['id'] . '" title="Delete Data"><i class="bi bi-x-circle-fill text-danger m-2"></i></a>
    </td>
    </tr>';
    $no++;
}



if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    if ($id > 0) {
        if ($matkul->deleteMatkul($id) > 0) {
            echo "<script>
            alert('Data berhasil dihapus!');
            document.location.href = 'matkul.php';
            </script>";
        } else {
            echo "<script>
            alert('Data gagal dihapus!');
            document.location.href = 'matkul.php';
            </script>";
        }
    }
}

$matkul->close();

$view->replace('NAMA', $pageTitle);
$view->replace('TIPE_NAVBAR', '');
$view->replace('MATKUL_NAVBAR', 'active');
$view->replace('DATA_MAIN_TITLE', $mainTitle);
$view->replace('ADD_ACTION', 'matkuladdit.php?add=1');
$view->replace('DATA_TABEL_HEADER', $header);
$view->replace('DATA_TITLE', $title);
$view->replace('DATA_TABEL', $data);
$view->write();
