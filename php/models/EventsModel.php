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

    public function searchEventByName($eventName)
    {
        try {
            $sql = "SELECT * FROM events WHERE Event_Name = :eventName";

            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':eventName', $eventName, PDO::PARAM_STR);
            $stmt->execute();
            $event = $stmt->fetch(PDO::FETCH_ASSOC);
            return $event;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return [];
        }
    }

    public function addMembersToEvent($eventID, $members)
    {
        $eventID = (int) $eventID;
        $this->db->beginTransaction();
        try {
            $deleteStmt = $this->db->prepare("DELETE FROM members_belonging_to_events WHERE `Event ID` = ?");
            $deleteStmt->execute([$eventID]);

            if (!empty($members)) {
                $insertStmt = $this->db->prepare("INSERT INTO members_belonging_to_events (`User ID`, `Event ID`) VALUES (?, ?)");

                foreach ($members as $memberID) {
                    $memberID = (int) $memberID;
                    $insertStmt->execute([$memberID, $eventID]);
                }
            }
            $this->db->commit();
            return true;
        } catch (PDOException $e) {
            $this->db->rollBack();
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

    public function getEventswithMembers()
    {
        $events = $this->getEvents();

        foreach ($events as &$event) {
            $event['members'] = $this->getMembersofEvent($event['ID']);
        }

        return $events;

    }
    public function getMembersofEvent($eventID)
    {
        try {
            $stmt = $this->db->prepare("SELECT `User ID` FROM members_belonging_to_events WHERE `Event ID` = ?");
            $stmt->bindParam(1, $eventID, PDO::PARAM_INT);
            $stmt->execute();
            $memberIDs = $stmt->fetchAll(PDO::FETCH_COLUMN);

            return $memberIDs;
        } catch (PDOException $e) {
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
