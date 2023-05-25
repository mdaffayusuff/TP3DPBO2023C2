<?php

include('config/db.php');
include('classes/DB.php');
include('classes/Todo.php');
include('classes/Template.php');

$home = new Template('templates/skinmain.html');

$list = new Todo($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);


$list->open();

$list->getTodoJoin();

if (isset($_POST['deadsort'])) {
    $flagsort = $flagsort == false ? true : false;
}

if (isset($_POST['btn-cari'])) {

    $list->searchTodo($_POST['cari']);
    $home->replace('reset', 'deadsort');
} else if ($flagsort == true) {
    $list->sortTodo();
    $home->replace('Sort by the nearest Deadline', 'Sorted by the nearest Deadline');
    $home->replace('deadsort', 'reset');
} else {
    $list->getTodoJoin();
    $home->replace('reset', 'deadsort');
}


$data = null;


while ($row = $list->getResult()) {
    $data .= '<div class="col-sm-6 col-lg-3 mb-3 mb-sm-0">' .
        '<div class="card text-bg-dark mb-3" style="border-color: #07beb8;">
        <div class="card-body">
        <h5 class="card-title">' . $row['nama_tugas'] . '</h5>' .
        '<p class="card-text">' . $row['tipe'] . '</p>' .
        '<p class="card-text">' . $row['mata_kuliah'] . '</p>' .
        '<p class="card-text">Deadline: ' . $row['deadline'] . '</p>' .
        '<a href="detail.php?id=' . $row['id_todo'] . '" class="btn btn-dark" style="border-color: #07beb8;">Detail</a>
        </div>
        </div>
        </div>';
}

// tutup koneksi
$list->close();

// buat instance template

// simpan data ke template
$home->replace('DATA_TODO', $data);
$home->write();
