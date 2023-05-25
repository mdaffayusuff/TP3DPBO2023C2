<?php

include('config/db.php');
include('classes/DB.php');
include('classes/TipeTugas.php');
include('classes/Template.php');

$view = new Template('templates/skintabeldark.html');
$tipe = new TipeTugas($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);
$tipe->open();
$tipe->getTipe();

if (!isset($_GET['id'])) {
    if (isset($_POST['submit'])) {
        if ($tipe->addTipe($_POST) > 0) {
            echo "<script>
                alert('Data berhasil ditambah!');
                document.location.href = 'tipetugas.php';
            </script>";
        } else {
            echo "<script>
                alert('Data gagal ditambah!');
                document.location.href = 'tipetugas.php';
            </script>";
        }
    }

    $btn = 'Tambah';
    $title = 'Tambah';
}

$pageTitle = 'Daftar Tipe Tugas';
$mainTitle = 'Tipe Tugas';
$header = '<tr>
<th scope="row">No.</th>
<th scope="row">Nama Tipe Tugas</th>
<th scope="row">Action</th>
</tr>';
$data = null;
$no = 1;

while ($row = $tipe->getResult()) {
    $data .= '<tr>
    <th scope="row">' . $no . '</th>
    <td>' . $row['tipe'] . '</td>
    <td style="font-size: 22px;">
    <a href="tipeaddit.php?update=' . $row['id'] . '" title="Edit Data"><i class="bi bi-pen-fill text-warning m-2"></i></a>&nbsp;<a href="tipetugas.php?hapus=' . $row['id'] . '" title="Delete Data"><i class="bi bi-x-circle-fill text-danger m-2"></i></a>
    </td>
    </tr>';
    $no++;
}

if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    if ($id > 0) {
        if ($tipe->deleteTipe($id) > 0) {
            echo "<script>
            alert('Data berhasil dihapus!');
            document.location.href = 'tipetugas.php';
            </script>";
        } else {
            echo "<script>
            alert('Data gagal dihapus!');
            document.location.href = 'tipe.php';
            </script>";
        }
    }
}

$tipe->close();

$view->replace('NAMA', $pageTitle);
$view->replace('TIPE_NAVBAR', 'active');
$view->replace('MATKUL_NAVBAR', '');
$view->replace('DATA_MAIN_TITLE', $mainTitle);
$view->replace('ADD_ACTION', 'tipeaddit.php?add=1');
$view->replace('DATA_TABEL_HEADER', $header);
$view->replace('DATA_TITLE', $title);
$view->replace('DATA_BUTTON', $btn);
$view->replace('DATA_FORM_LABEL', $formLabel);
$view->replace('DATA_TABEL', $data);
$view->write();
