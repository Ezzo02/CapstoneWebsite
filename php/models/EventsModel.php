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
    public function getEventsofMember($userID)
    {
        try {
            $stmt = $this->db->prepare("SELECT E.Date_of_Event, E.Event_Name
            FROM events AS E
            JOIN members_belonging_to_events ON E.ID = members_belonging_to_events.`Event ID`
            WHERE members_belonging_to_events.`User ID` = :user_id;
        ");
            $stmt->bindParam(':user_id', $userID, PDO::PARAM_INT);
            $stmt->execute();
            $events = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $events;
        } catch (PDOException $e) {
            return [];
        }
    }

    public function getParticipationPercentage($userID)
    {
        $events = $this->getEventsofMember($userID);
        $eventsTotal = $this->getEvents();
        // Avoid division by zero error
        if (count($eventsTotal) == 0) {
            return 0;
        }

        $percent = count($events) / count($eventsTotal) * 100;

        return $percent;

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


    public function EventsVSMembersVSCosts()
    {


        try {
            $stmt = $this->db->prepare("WITH MonthlyMembers AS (
                SELECT
                    YEAR(`Joining Date`) AS Year,
                    MONTH(`Joining Date`) AS Month,
                    COUNT(DISTINCT ID) AS NewMembers
                FROM
                    users
                GROUP BY
                    YEAR(`Joining Date`), MONTH(`Joining Date`)
            ),
            CumulativeMembers AS (
                SELECT
                    m.Year,
                    m.Month,
                    SUM(m.NewMembers) OVER (ORDER BY m.Year, m.Month) AS CumulativeCount
                FROM
                    MonthlyMembers m
            )
            SELECT
                e.Year,
                e.Month,
                IFNULL(e.NumberOfEvents, 0) AS NumberOfEvents,
                IFNULL(e.Costs, 0) AS Costs,
                IFNULL(cm.CumulativeCount, 0) AS CumulativeMembers
            FROM
                (SELECT 
                    YEAR(Date_of_Event) AS Year,
                    MONTH(Date_of_Event) AS Month,
                    COUNT(*) AS NumberOfEvents,
                    SUM(Cost_of_Event) AS Costs
                 FROM 
                    events
                 GROUP BY 
                    YEAR(Date_of_Event), MONTH(Date_of_Event)
                ) e
            LEFT JOIN 
                CumulativeMembers cm ON e.Year = cm.Year AND e.Month = cm.Month
            ORDER BY
                e.Year ASC, e.Month ASC;
            ");

            $stmt->execute();
            $events_statistics = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $events_statistics;
        } catch (PDOException $e) {
            return [];
        }



    }
}
