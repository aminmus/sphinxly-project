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
                throw new \Exception('Could not fetch result, an error occured.');
            }
        } catch (PDOException $exception) {
            return $exception->getMessage();
        }
    }
}
