<?php

include('config/db.php');
include('classes/DB.php');
include('classes/Todo.php');

$data = new Todo($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);
$data->open();

if (isset($_POST)) {
    if ($data->updateTodo($_GET['id'], $_POST) > 0) {
        echo "<script>
                alert('Data berhasil diubah!');
                document.location.href = 'index.php';
                </script>";
    } else {
        echo "<script>
                alert('Data gagal diubah!');
                document.location.href = 'EditTodo.php?ubah=" . $_GET['id'] . "';
                </script>";
    }
}

$data->close();
