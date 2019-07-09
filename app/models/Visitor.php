<?php
namespace App\Models;

class Visitor extends \App\Libraries\Model
{
    const TABLENAME = 'visitors';

    public function get($name)
    {
        try {
            $query = 'SELECT * FROM visitors WHERE name = :name';
            $this->db->query($query);

            $this->db->bind(':name', name);
            
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
