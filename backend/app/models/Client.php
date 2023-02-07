<?php 
class Client{
    private $db;

    public function __construct()
    {
        $this->db = new Database;

    }

    // Register new user
    public function register($data)
    {
        $this->db->query("INSERT INTO clients(first_name, last_name, phone, ref) VALUES(:first_name, :last_name, :phone,:ref)");
        $this->db->bind('first_name', $data['name']);
        $this->db->bind('last_name', $data['lastName']);
        $this->db->bind('phone', intval($data['phone']));
        $this->db->bind('ref', $data['ref']);
        if( $this->db->execute()){
            return true;
        }
        return false;

    }

    public function login($ref)
    {
        $this->db->query("SELECT * FROM clients WHERE ref = :ref");
        $this->db->bind('ref', $ref);

        $this->db->execute();
        $row = $this->db->single();
        if($row){
            return $row;
        }
        return false;

    }

    // Check if user email is already taken 
    public function findByRef($ref)
    {

        $this->db->query('SELECT id FROM clients WHERE ref = :ref');
        $this->db->bind('ref', $ref);

        $row = $this->db->single();
        //Check row
        if($this->db->rowCount() > 0){
            return $row;
        }
        return false;
    }
}