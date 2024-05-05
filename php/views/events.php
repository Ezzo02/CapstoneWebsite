<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Boxicons -->
    <link href="https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css" rel="stylesheet" />
    <!-- My CSS -->
    <link rel="stylesheet" href="css/dashboard.css" />

    <!-- stylings -->

    <style>
        .table-data .head-events {
            text-align: center;
        }

        .event__form {
            max-width: 400px;
            margin: auto;
            padding: 30px;
            border-radius: 5px;
        }

        .event__field {
            margin-bottom: 15px;
        }

        .event__field label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .event__field input,
        .event__field select {
            width: 100%;
            padding: 8px;
            border: 1px solid #e1242b;
            border-radius: 3px;
            box-sizing: border-box;
        }

        .event__field input:focus,
        .event__field select:focus {
            outline: none;
        }

        .event__field input[type="checkbox"] {
            border: 1px solid #e1242b !important;
            border-radius: 3px;
            width: 18px;
            height: 18px;
            vertical-align: middle;
            -webkit-appearance: none;
            /* Remove default checkbox appearance for Chrome */
            -moz-appearance: none;
            /* Remove default checkbox appearance for Firefox */
            appearance: none;
            /* Remove default checkbox appearance for other browsers */
        }

        .event__field input[type="checkbox"]:checked {
            background-color: #e1242b !important;
        }

        .event__field.center {
            display: flex;
            gap: 10px;
            align-items: center;
        }

        .event__field.center label {
            margin-bottom: 0px;
        }

        .addEventParent {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .addEventParent .event__submit {
            background-color: #e1242b;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            width: 300px;
            transition: all 0.3s ease;
        }

        .event__submit {
            background-color: #e1242b;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .event__submit:hover {
            background-color: #e1242b;
            transform: scale(1.01);
        }

        /* events table */

        .table-data .order table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            text-align: center !important;
        }

        .table-data .order table th,
        .table-data .order table td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: center !important;
            transition: all 0.5s ease;
        }

        .table-data .order table th {
            background-color: #e1242b;
            color: white;
        }

        .table-data .order table tbody tr:nth-child(odd) {
            background-color: #f9f9f9;
        }

        .table-data .order table tbody tr:hover {
            cursor: pointer;
            background-color: #e1242b !important;
            color: white;
        }

        .edit-icon {
            color: black;
            font-size: 20px;
            cursor: pointer;
            text-decoration: none;
        }

        .edit-icon:hover {
            color: white;
        }

        /* events form  modal  */

        .modal {
            display: none;
            position: fixed;
            z-index: 100000;
            top: 5vh;
            left: 35vw;

            min-width: 400px;
            width: 500px;
            /* height: 100%; */
            overflow: auto;
            /* background-color: rgb(0, 0, 0); */
            /* background-color: rgba(0, 0, 0, 0.4); */
        }

        .modal-content {
            background-color: #fefefe;
            margin: auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
        }

        .close {
            color: black;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: #e1242b;
            text-decoration: none;
            cursor: pointer;
        }

        .users-div {
            overflow-x: auto;
            max-height: 100px;
            padding: 10px 0px;
        }

        .users-div .user-parent {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .users-div .user-parent input {
            margin-right: 40px;
        }
    </style>

    <title>AdminHub</title>
</head>

<body>
    <!-- SIDEBAR -->
    <section id="sidebar">
        <a href="#" class="brand">
            <i class="bx bxs-smile"></i>
            <span class="text">Admin Dashboard</span>
        </a>
        <ul class="side-menu top">
            <li>
                <a href="/CapstoneWebsite/dashboard">
                    <i class="bx bxs-dashboard"></i>
                    <span class="text">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="analytics.html">
                    <i class="bx bxs-doughnut-chart"></i>
                    <span class="text">Analytics</span>
                </a>
            </li>

            <li>
                <a href="/CapstoneWebsite/members">
                    <i class="bx bxs-group"></i>
                    <span class="text">Members</span>
                </a>
            </li>
            <li class="active">
                <a href="/CapstoneWebsite/members">
                <i class="bx bxs-calendar"></i>
                    <span class="text">Events</span>
                </a>
            </li>
        </ul>
        <ul class="side-menu">
            <li>
                <a href="#">
                    <i class="bx bxs-cog"></i>
                    <span class="text">Settings</span>
                </a>
            </li>
            <li>
                <a href="/CapstoneWebsite/logout" class="logout">
                    <i class="bx bxs-log-out-circle"></i>
                    <span class="text">Logout</span>
                </a>
            </li>
        </ul>
    </section>
    <!-- SIDEBAR -->

    <!-- CONTENT -->
    <section id="content">
        <!-- NAVBAR -->
        <nav>
            <i class="bx bx-menu"></i>
            <a href="#" class="nav-link">Categories</a>
            <form action="#">
                <div class="form-input">
                    <input type="search" placeholder="Search..." />
                    <button type="submit" class="search-btn">
                        <i class="bx bx-search"></i>
                    </button>
                </div>
            </form>
            <input type="checkbox" id="switch-mode" hidden />
            <label for="switch-mode" class="switch-mode"></label>
            <a href="#" class="notification">
                <i class="bx bxs-bell"></i>
                <span class="num">8</span>
            </a>
            <!--a href="#" class="profile">
                <img src="img/people.png">
            </!--a>-->
        </nav>
        <!-- NAVBAR -->

        <!-- MAIN -->
        <main>
            <div class="table-data">
                <div class="order">
                    <div class="head-events">
                        <h3>Manage Events Page</h3>
                    </div>
                    <!-- events table -->
                    <div class="table-data">
                        <div class="order">
                            <div class="head">
                                <h3>Current Events</h3>
                            </div>
                            <table>
                                <thead>
                                    <tr>
                                        <th>Event Name</th>
                                        <th>Date of Event</th>
                                        <th>Cost of Event</th>
                                        <th>Status</th>
                                        <th>Approved</th>
                                        <th>Edit</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($events as $event): ?>
                                        <tr>
                                            <td><?php echo $event['Event_Name']; ?></td>
                                            <td><?php echo date('F j, Y', strtotime($event['Date_of_Event'])); ?></td>
                                            <td><?php echo $event['Cost_of_Event']; ?>$</td>
                                            <td><?php echo $event['Status_of_Event']; ?></td>
                                            <td><?php echo $event['Approval_of_Event'] === 1 ? 'Yes' : 'No'; ?></td>
                                            <td>
                                                <div class="edit-icon"
                                                    data-event-details='<?php echo json_encode($event); ?>'>
                                                    <i class="bx bx-edit"></i>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>

                            </table>
                        </div>
                    </div>
                    <!-- update event form modal .... -->

                    <div id="editEventModal" class="modal">
                        <div class="modal-content">
                            <span class="close">&times;</span>
                            <form id="update-event-form" action="/CapstoneWebsite/events" method="post">
                                <h2 id="modalTitle">Edit Event</h2>
                                <div class="event__field">
                                    <label for="edit-event-name">Event Name:</label>
                                    <input type="text" id="edit-event-name" name="event-name" required />
                                </div>
                                <div class="event__field">
                                    <label for="edit-event-date">Date of Event:</label>
                                    <input type="date" id="edit-event-date" name="event-date" required />
                                </div>
                                <div class="event__field">
                                    <label for="edit-event-cost">Cost of Event:</label>
                                    <input type="number" id="edit-event-cost" name="event-cost" required />
                                </div>
                                <div class="event__field center">
                                    <label for="edit-event-approved">Approved:</label>
                                    <input type="checkbox" id="edit-event-approved" name="event-approved" />
                                </div>
                                <div class="event__field">
                                    <label for="edit-event-status">Status of Event:</label>
                                    <select id="edit-event-status" name="event-status" required>
                                        <option value="pending">Pending</option>
                                        <option value="completed">Completed</option>
                                        <option value="in-progress">In Progress</option>
                                    </select>
                                </div>
                                <div class="event__field">
                                    <label>Select Members:</label>
                                    <div class="users-div">
                                        <?php foreach ($users as $user): ?>
                                            <div class="user-parent">
                                                <label style="display:inline"
                                                    for="edit-event-approved"><?php echo $user['Username']; ?></label>
                                                <input type="checkbox" name="users[]" value="<?php echo $user['ID']; ?>" />
                                            </div>
                                        <?php endforeach; ?>


                                    </div>
                                </div>
                                <input type="hidden" id="event-id" name="event-id" value="" />
                                <button type="submit" class="event__submit" name="update-event-submit"
                                    id="modalSubmitButton">
                                    Update Event
                                </button>
                            </form>
                        </div>
                    </div>

                    <!-- add events button-->
                    <!-- Button to open modal for adding new events -->
                    <div class="addEventParent">
                        <button id="addEventButton" class="event__submit">
                            Add New Event
                        </button>
                    </div>
                </div>
            </div>
        </main>
        <!-- MAIN -->
    </section>
    <!-- CONTENT -->

    <script src="javascript/dashboard.js"></script>
    <script>
        var modal = document.getElementById("editEventModal");
        var editButtons = document.querySelectorAll(".edit-icon");
        var addButton = document.getElementById("addEventButton");
        var span = document.getElementsByClassName("close")[0];
        var submitButton = document.getElementById("modalSubmitButton");
        var modalTitle = document.getElementById("modalTitle");
        // Open modal for editing
        function openEditModal(eventDetails) {
            modal.style.display = "block";
            document.body.style.overflow = "hidden";
            submitButton.innerHTML = "Update Event";
            submitButton.name = "update-event-submit";
            modalTitle.innerText = "Update Event";

            document.getElementById("event-id").value = eventDetails.ID;
            document.getElementById("edit-event-name").value = eventDetails.Event_Name;
            document.getElementById("edit-event-date").value = eventDetails.Date_of_Event;
            document.getElementById("edit-event-cost").value = eventDetails.Cost_of_Event;
            document.getElementById("edit-event-approved").checked = eventDetails.Approval_of_Event == 1;
            document.getElementById("edit-event-status").value = eventDetails.Status_of_Event;

            var users = <?php echo json_encode($users); ?>;
            var checkboxes = document.getElementsByName("users[]");
            checkboxes.forEach((checkbox) => {
                var userID = parseInt(checkbox.value);
                if (eventDetails.members.includes(userID)) {
                    checkbox.checked = true;
                } else {
                    checkbox.checked = false;
                }
            });
            console.log(eventDetails);
        }

        // Function to handle opening the modal for adding a new event
        function openAddModal() {
            modal.style.display = "block";
            document.body.style.overflow = "hidden";
            document.getElementById("update-event-form").reset();
            submitButton.innerHTML = "Add Event";
            submitButton.name = "add-event-submit";
            modalTitle.innerText = "Add New Event";
            document.getElementById("event-id").value = "";

            var checkboxes = document.getElementsByName("users[]");
            checkboxes.forEach((checkbox) => {
                checkbox.checked = false;
            });
        }

        // Open modal for editing when clicking on edit icon
        var editButtons = document.querySelectorAll(".edit-icon");
        editButtons.forEach((button) => {
            button.onclick = function () {
                var eventDetails = JSON.parse(this.getAttribute("data-event-details"));
                openEditModal(eventDetails);
            };
        });

        // Open modal for adding new event when clicking on add event button
        addButton.onclick = function () {
            openAddModal();
        };

        // Close modal
        span.onclick = function () {
            modal.style.display = "none";
            document.body.style.overflow = "auto";
        };

        // Close modal when clicking outside of it
        window.onclick = function (event) {
            if (event.target == modal) {
                modal.style.display = "none";
                document.body.style.overflow = "auto";
            }
        };
    </script>
</body>

</html>