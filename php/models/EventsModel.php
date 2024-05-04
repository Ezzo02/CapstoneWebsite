<?php

class EventsModel
{
    private $db;

    public function __construct($dbConnection)
    {
        $this->db = $dbConnection;
    }
    public function addEvent($eventName, $eventDate, $eventCost, $eventStatus, $eventApproved)
    {
        try {
            $eventName = $this->db->quote($eventName);
            $eventDate = $this->db->quote($eventDate);
            $eventStatus = $this->db->quote($eventStatus);
            $sql = "INSERT INTO events (Event_Name, Date_of_Event, Cost_of_Event, Status_of_Event, Approval_of_Event) 
                        VALUES ($eventName, $eventDate, $eventCost, $eventStatus, $eventApproved)";
            $this->db->exec($sql);
            return true;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    public function getEvents()
{
    try {
        $sql = "SELECT * FROM events
        Order By Date_of_Event DESC
        ";
        
        $stmt = $this->db->query($sql);
        $events = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $events;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return [];
    }
}



    public function updateEvent($eventId, $eventName, $eventDate, $eventCost, $eventStatus, $eventApproved)
    {
        try {
            $stmt = $this->db->prepare("UPDATE events SET Event_Name = ?, Date_of_Event = ?, Cost_of_Event = ?, Status_of_Event = ?, Approval_of_Event = ? WHERE ID = ?");
            $success = $stmt->execute([$eventName, $eventDate, $eventCost, $eventStatus, $eventApproved, $eventId]);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }
}
