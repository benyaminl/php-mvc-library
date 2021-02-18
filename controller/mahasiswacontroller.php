<?php

namespace controller;

use model\Mahasiswa;
use PDO;

class MahasiswaController {
    protected $mhs; 

    protected $db;

    public function __construct() {
        // DB Create
        $host = $_ENV["db_host"]; $db = $_ENV["db_name"]; 
        $charset = "utf8mb4"; $user = $_ENV["db_user"]; $pass = $_ENV["db_pass"];
        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];
        try {
            $db = new PDO($dsn, $user, $pass, $options);
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        } 

        $this->db = $db;
        $this->mhs = new Mahasiswa($this->db);
    }

    public function list() {
        $data = $this->mhs->getList();
        include_once(\GLOBALDIR."/view/mahasiswa.php");
    }
}