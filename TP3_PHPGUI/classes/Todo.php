<?php

class Todo extends DB
{
    function getTodoJoin()
    {
        $query = "SELECT * FROM todo_list JOIN tipe_tugas ON todo_list.id_tipe=tipe_tugas.id JOIN mata_kuliah ON todo_list.id_matkul=mata_kuliah.id ORDER BY todo_list.id_todo DESC";

        return $this->execute($query);
    }

    function sortTodo()
    {
        $query = "SELECT * FROM todo_list JOIN tipe_tugas ON todo_list.id_tipe=tipe_tugas.id JOIN mata_kuliah ON todo_list.id_matkul=mata_kuliah.id ORDER BY todo_list.deadline ASC";

        return $this->execute($query);
    }

    function getTodo()
    {
        $query = "SELECT * FROM todo_list";
        return $this->execute($query);
    }

    function getTodoById($id)
    {
        $query = "SELECT * FROM todo_list JOIN tipe_tugas ON todo_list.id_tipe=tipe_tugas.id JOIN mata_kuliah ON todo_list.id_matkul=mata_kuliah.id WHERE id_todo=$id";
        return $this->execute($query);
    }

    function searchTodo($keyword)
    {
        $query = "SELECT * FROM todo_list JOIN tipe_tugas ON todo_list.id_tipe=tipe_tugas.id JOIN mata_kuliah ON todo_list.id_matkul=mata_kuliah.id WHERE nama_tugas LIKE '%" . $keyword . "%'";
        return $this->execute($query);
    }

    function addTodo($data)
    {

        $nama_tugas = $data['nama_tugas'];
        $deskripsi = $data['deskripsi'];
        $deadline = $data['deadline'];
        $id_tipe = $data['id_tipe'];
        $id_matkul = $data['id_matkul'];
        $query = "INSERT INTO todo_list VALUES('','$nama_tugas', '$deskripsi', '$deadline', '$id_tipe', '$id_matkul')";
        return $this->executeAffected($query);
    }

    function updateTodo($id, $data)
    {
        $nama_tugas = $data['nama_tugas'];
        $deskripsi = $data['deskripsi'];
        $deadline = $data['deadline'];
        $id_tipe = $data['id_tipe'];
        $id_matkul = $data['id_matkul'];
        $query = "UPDATE todo_list SET nama_tugas='$nama_tugas', deskripsi='$deskripsi', deadline='$deadline', id_tipe='$id_tipe', id_matkul='$id_matkul' WHERE id_todo='$id'";
        return $this->executeAffected($query);
    }

    function deleteTodo($id)
    {
        $query = "DELETE FROM todo_list WHERE id_todo = $id";
        return $this->executeAffected($query);
    }
}
