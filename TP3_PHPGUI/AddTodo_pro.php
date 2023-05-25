<?php

include('config/db.php');
include('classes/DB.php');
include('classes/Todo.php');

$data = new Todo($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);
$data->open();

if (isset($_POST)) {
    if ($data->addTodo($_POST) > 0) {
        echo "<script>
                alert('Data berhasil ditambahkan!');
                document.location.href = 'index.php';
                </script>";
    } else {
        echo "<script>
                alert('Data gagal ditambahkan!');
                document.location.href = 'AddTodo.php';
                </script>";
    }
}

$data->close();
