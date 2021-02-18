<?php

namespace model;
// Import Model
use system\Model;
use \PDO;
Class Mahasiswa extends Model {

    public function getList() {
        $query = "SELECT * FROM mahasiswa";

        return $this
            ->db->query($query)
            ->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get(string $nrp) {
        $query = "SELECT * FROM mahasiswa WHERE nrp = :nrp";
        $stmt = $this->db->prepare($query);
        $stmt->execute(["nrp" => $nrp]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Insert Data
     * @param array $data 
     * @return string|false 
     * @throws PDOException 
     */
    public function insert(array $data) {
        $query  = "INSERT INTO mahasiswa VALUES(:nrp, :nama, :email, :alamat)";
        $stmt   = $this->db->prepare($query);
        $result = $stmt->execute($data);
        $id     = $this->db->lastInsertId();

        return ($result) ? $id : false;
    }

    public function update(string $nrp, array $data) {
        $query = "UPDATE mahasiswa SET 
                    nama = :nama, 
                    email = :email,
                    alamat = :alamat
                    WHERE nrp = :nrp";
        // Tambah NRP ke array
        $data["nrp"] = $nrp;
        $stmt      = $this->db->prepare($query);
        $result    = $stmt->execute($data);
        $rowChange = $stmt->rowCount();
        return ($result) ? $rowChange : false;
    }

    public function delete(string $nrp) : bool {
        $query  = "DELETE FROM mahasiswa WHERE nrp = :nrp";
        $stmt   = $this->db->prepare($query);
        $result = $stmt->execute(["nrp" => $nrp]);
        return $result;
    }
}