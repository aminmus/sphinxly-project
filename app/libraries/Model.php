<?php
namespace App\Libraries;

abstract class Model
{
    protected $db;

    public function __construct()
    {
        $this->db = new \App\Libraries\Database;
    }

    // Select specific item from model class that inherits this abstract class
    public function findOne($id)
    {
        try {
            $query = 'SELECT * FROM :TABLENAME WHERE id = :id';
            $this->db->query($query);

            $this->db->bind(':TABLENAME', static::TABLENAME);
            $this->db->bind(':id', $id);
            
            $result = $this->db->result();

            if (!empty($result)) {
                return $result;
            } else {
                return false;
            }
        } catch (PDOException $exception) {
            return $exception->getMessage();
        }
    }

    // Select everything from a model class that inherits this abstract model
    public function findAll()
    {
        try {
            $query = "SELECT * FROM " . static::TABLENAME . " ORDER BY id DESC";
            $this->db->query($query);
            $results = $this->db->resultSet();

            if (!empty($results)) {
                return $results;
            } else {
                return false;
            }
        } catch (PDOException $err) {
            return $err->getMessage();
        }
    }
}
