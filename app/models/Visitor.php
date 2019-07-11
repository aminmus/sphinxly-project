<?php
namespace App\Models;

class Visitor extends \App\Libraries\Model
{
    const TABLENAME = 'visitors';   // Used by the abstract class Model

    // Get a visitor by name, returns null if none found
    public function getVisitor($visitorName)
    {
        try {
            $query = 'SELECT * FROM visitors WHERE name = :visitorName';
            $this->db->query($query);

            $this->db->bind(':visitorName', $visitorName);
            
            $result = $this->db->result();

            if (!empty($result)) {
                return $result;
            } else {
                return null;
            }
        } catch (PDOException $exception) {
            return $exception->getMessage();
        }
    }

    // Create a new visitor by name
    public function createVisitor($visitorName)
    {
        try {
            $query = 'INSERT INTO visitors (name) VALUES (:visitorName)';
            $this->db->query($query);

            $this->db->bind(':visitorName', $visitorName);

            return $success = $this->db->execute(); // Either true or false
        } catch (PDOException $exception) {
            return $exception->getMessage();
        }
    }

    // TODO: Delete visitor method
}
