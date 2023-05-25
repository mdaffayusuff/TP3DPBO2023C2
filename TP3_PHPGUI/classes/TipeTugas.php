<?php

class TipeTugas extends DB
{
    function getTipe()
    {
        $query = "SELECT * FROM tipe_tugas";
        return $this->execute($query);
    }

    function getTipeById($id)
    {
        $query = "SELECT * FROM tipe_tugas WHERE id=$id";
        return $this->execute($query);
    }

    function addTipe($data)
    {
        $tipe = $data['tipe'];
        $query = "INSERT INTO tipe_tugas VALUES('', '$tipe')";
        return $this->executeAffected($query);
    }
    
    function updateTipe($id, $data)
    {
        $tipe = $data['tipe'];
        $query = "UPDATE tipe_tugas SET tipe='$tipe' WHERE id=$id";
        return $this->executeAffected($query);
    }
    
    function deleteTipe($id)
    {
        $query = "DELETE FROM tipe_tugas WHERE id=$id";
        return $this->executeAffected($query);
    }
}
