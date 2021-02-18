<?php
namespace system;

class Model {
    /**
     * DB Object
     * @var \PDO
     */
    protected $db = null;

    public function __construct(\PDO $db) {
        $this->db = $db;
    }
}