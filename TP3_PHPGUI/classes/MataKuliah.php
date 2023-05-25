<?php

class MataKuliah extends DB
{
    function getMatkul()
    {
        $query = "SELECT * FROM mata_kuliah";
        return $this->execute($query);
    }

    function getMatkulById($id)
    {
        $query = "SELECT * FROM mata_kuliah WHERE id=$id";
        return $this->execute($query);
    }

    function addMatkul($data)
    {
        $matkul = $data['mata_kuliah'];
        $query = "INSERT INTO mata_kuliah VALUES('', '$matkul')";
        return $this->executeAffected($query);
    }

    function updateMatkul($id, $data)
    {
        $matkul = $data['mata_kuliah'];
        $query = "UPDATE mata_kuliah SET mata_kuliah='$matkul' WHERE id=$id";
        return $this->executeAffected($query);
    }

    function deleteMatkul($id)
    {
        $query = "DELETE FROM mata_kuliah WHERE id=$id";
        return $this->executeAffected($query);
    }
}
