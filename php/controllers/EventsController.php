<?php

class EventsController
{
    private $eventsModel;
    private $usersModel;
    public function __construct(EventsModel $eventsModel, UserModel $userModel)
    {
        $this->eventsModel = $eventsModel;
        $this->usersModel = $userModel;
    }

    public function Events_Add_Update()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $eventName = $_POST['event-name'];
            $eventDate = $_POST['event-date'];
            $eventCost = $_POST['event-cost'];
            $eventStatus = $_POST['event-status'];
            $eventApproved = isset($_POST['event-approved']) ? 1 : 0;
            
            if (isset($_POST['add-event-submit'])) {
                
                $result = $this->eventsModel->addEvent($eventName, $eventDate, $eventCost, $eventStatus, $eventApproved);
                if ($result) {
                    $eventID = $this->eventsModel->searchEventByName($eventName)['ID'];
                    $users = isset($_POST['users']) ? $_POST['users'] : [];
                    $this->eventsModel->addMembersToEvent($eventID, $users);

                } else {
                    // header('Location: error_page.php'); // Redirect on error
                }
                header('Location: /CapstoneWebsite/events'); // Redirect on success
            } elseif (isset($_POST['update-event-submit'])) {
                $eventId = $_POST['event-id'];
                $result = $this->eventsModel->updateEvent($eventId, $eventName, $eventDate, $eventCost, $eventStatus, $eventApproved);
                if ($result) {
                    $users = isset($_POST['users']) ? $_POST['users'] : [];
                    $this->eventsModel->addMembersToEvent($eventId, $users);
                    
                    // header('Location: success_page.php'); // Redirect on success
                } else {
                    // header('Location: error_page.php'); // Redirect on error
                }
                header('Location: /CapstoneWebsite/events'); // Redirect on success
                
            }
        } else {
            $events = $this->eventsModel->getEventswithMembers();
            $users = $this->usersModel->getUsers();
            include_once ("php/views/events.php");
        }
    }
}

