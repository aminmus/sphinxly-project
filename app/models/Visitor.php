<?php
namespace App\Models;

class Visitor extends \App\Libraries\Model
{
    const TABLENAME = 'visitors';

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

    //TODO: Add create visitor method
}
