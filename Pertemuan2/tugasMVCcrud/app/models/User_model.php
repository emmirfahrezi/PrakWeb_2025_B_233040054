<?php

class User_model
{
    private $db;
    private $table = 'users';
    private $nama = 'mirrrr';

    // public function __construct($database)
    // {
    //     $this->db = $database;
    // }

    // public function getAllUsers()
    // {
    //     $this->db->prepare("SELECT * FROM " . $this->table);
    //     return $this->db->resultSet();
    // }

    // public function getUserById($id)
    // {
    //     $this->db->prepare("SELECT * FROM " . $this->table . " WHERE id = :id");
    //     $this->db->bind(':id', $id);
    //     return $this->db->single();

    // }

    public function getUser()
    {
        // Misalnya mengembalikan nama user statis
        return $this->nama;
    }

}
