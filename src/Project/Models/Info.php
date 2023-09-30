<?php

namespace Project\Models;
use Project\Services\Connect;

class Info
{
    public $db;

    public function __construct()
    {
        $this -> db = new Connect();
    }

    public function show()
    {
        $query = $this->db->query('SELECT * FROM `info`');
    }
}