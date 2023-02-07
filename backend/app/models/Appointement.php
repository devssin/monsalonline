<?php 
class Appointement{
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAppointements($ref)
    {
        $this->db->query("SELECT bookings.* from bookings  JOIN clients on bookings.client_id = clients.id where clients.ref = :ref");
        $this->db->bind(':ref', $ref);
        $this->db->execute();
        return $this->db->resultSet();
    }

    public function addAppointement($appointement)
    {
        $this->db->query("INSERT INTO bookings(client_id, start_time, end_time, booking_date) 
                            VALUES (:id, :start_time, :end_time, :booking_date)");
        
        $this->db->bind("id", $appointement['client_id']);
        $this->db->bind("start_time", $appointement['start_time']);
        $this->db->bind("end_time", $appointement['end_time']);
        $this->db->bind("booking_date",$appointement['date']);

        if( $this->db->execute()){
            return true;
        }
        return false;

    }

}