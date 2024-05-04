<?php

class EventsController
{
    private $eventsModel;

    public function __construct(EventsModel $eventsModel)
    {
        $this->eventsModel = $eventsModel;
    }

    public function Events_Add_Update(){
        $events = $this->eventsModel->getEvents();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $eventName = $_POST['event-name'];
            $eventDate = $_POST['event-date'];
            $eventCost = $_POST['event-cost'];
            $eventStatus = $_POST['event-status'];
            $eventApproved = isset($_POST['event-approved']) ? 1 : 0;
            
            if (isset($_POST['add-event-submit'])) {
                
                $result = $this->eventsModel->addEvent($eventName, $eventDate, $eventCost, $eventStatus, $eventApproved);
                    
                if ($result) {
                } 
                else {
                    // header('Location: error_page.php'); // Redirect on error
                }
                header('Location: /CapstoneWebsite/events'); // Redirect on success
            } elseif (isset($_POST['update-event-submit'])) {
                $eventId = $_POST['event-id'];
                $result = $this->eventsModel->updateEvent($eventId, $eventName, $eventDate, $eventCost, $eventStatus, $eventApproved);
                if ($result) {
                    // header('Location: success_page.php'); // Redirect on success
                } else {
                    // header('Location: error_page.php'); // Redirect on error
                }
                header('Location: /CapstoneWebsite/events'); // Redirect on success
            
            }
        }
        else{
            include_once("php/views/events.php");
        }
    }
}

