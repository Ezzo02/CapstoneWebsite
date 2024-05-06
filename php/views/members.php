<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Boxicons -->
    <link href="https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css" rel="stylesheet" />
    <!-- My CSS -->
    <link rel="stylesheet" href="css/dashboard.css" />
    <style>

        /* head styles for search bar */
        .head {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        #searchInput {
            border: 1px solid gray !important;
            height: 50px !important;
            padding: 20px;
            border-radius: 10px;
            margin-right: 2rem;
            font-size: 15px;
            width: 300px;
        }

        #searchInput:focus {
            /* border: 1px solid #e1242b; */
            outline: 2px solid #e1242b;
        }

        /*  */
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

        /* .table-data .order table tbody tr:nth-child(odd) {
            background-color: #f9f9f9;
        } */

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
            top: 20vh;
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
                <a href="/CapstoneWebsite/analytics">
                    <i class="bx bxs-doughnut-chart"></i>
                    <span class="text">Analytics</span>
                </a>
            </li>
            <li class="active">
                <a href="/CapstoneWebsite/members">
                    <i class="bx bxs-group"></i>
                    <span class="text">Members</span>
                </a>
            </li>
            <li>
                <a href="/CapstoneWebsite/events">
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
            <div class="head-title">
                <div class="left">
                    <h1>Members</h1>
                    <ul class="breadcrumb">
                        <li>
                            <a href="#">Members</a>
                        </li>
                        <li><i class="bx bx-chevron-right"></i></li>
                        <li>
                            <a class="active" href="#">Home</a>
                        </li>
                    </ul>
                </div>
                <button id="addMemberButton" class="btn-download red-button" style="cursor: pointer">
                    <i class="bx bxs-cloud-download"></i>
                    <span class="text">Add New Member</span>
                </button>
            </div>

            <!-- TABLE DATA -->
            <div class="table-data">
                <div class="order">
                    <div class="head" style="display: flex; justify-content: space-between; align-items: center;">
                        <h3>Current Members</h3>
                        <input type="text" id="searchInput" placeholder="Search Members...">
                    </div>
                    <table id="membersTable">
                        <thead>
                            <tr>
                                <th>Username</th>
                                <th>Address</th>
                                <th>ID Number</th>
                                <th>Club</th>
                                <th>Phone Number</th>
                                <th>Email</th>
                                <th>Birthday</th>
                                <th>Blood Type</th>
                                <th>Emergency Contact</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($users as $user): ?>
                                <?php if ($user['Position'] === 'member'): ?>
                                    <tr>
                                        <td><?php echo $user['Username'] ?></td>
                                        <td><?php echo isset($user['Address']) ? $user['Address'] : '' ?></td>
                                        <td><?php echo isset($user["Member's ID"]) ? $user["Member's ID"] : '' ?></td>
                                        <td><?php echo isset($user["Club"]) ? $user["Club"] : '' ?></td>
                                        <td><?php echo isset($user["Phone Number"]) ? $user["Phone Number"] : '' ?></td>
                                        <td><?php echo isset($user["Email"]) ? $user["Email"] : '' ?></td>
                                        <td><?php echo empty($user['Birthday']) ? '' : date('F j, Y', strtotime($user['Birthday'])) ?>
                                        </td>
                                        <td><?php echo isset($user["Blood type"]) ? $user["Blood Type"] : '' ?></td>
                                        <td><?php echo isset($user["Emergency Contact"]) ? $user["Emergency Contact"] : '' ?>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>


        <!-- MODAL -->
        <div id="addMemberModal" class="modal">
            <div class="modal-content">
                <span class="close">&times;</span>
                <h2>Add New Member</h2>
                <form id="update-event-form" action="/CapstoneWebsite/addMember" method="post">
                    <div class="event__field">
                        <label for="memberName" style="margin-top:10px;">Member Username:</label>
                        <input type="text" id="memberName" name="memberName" required />
                    </div>
                    <div class="event__field">
                        <label for="idNumber">ID Number:</label>
                        <input type="text" id="idNumber" name="idNumber" />

                    </div>
                    <div class="event__field">
                        <label for="password">Password:</label>
                        <input type="password" id="password" name="password" />
                    </div>
                    <div class="event__field">
                        <label for="joiningdate">Joining Date:</label>
                        <input type="date" id="joiningdate" name="joiningdate" />
                    </div>
                    <div class="event__field">
                        <label for="club">Club:</label>
                        <select id="club" name="club">
                            <option value="LAU">LAU</option>
                            <option value="AUB">AUB</option>
                            <option value="BAU">BAU</option>
                            <option value="Beirut">Beirut</option>
                        </select>
                    </div>


                    <button type="submit" class="event__submit" name="add-member-submit" id="addMemberButton">
                        Add Member
                    </button>
                </form>
            </div>
        </div>
        <!-- END MODAL -->

        <!-- MAIN -->
    </section>
    <!-- CONTENT -->

    <script src="javascript/dashboard.js"></script>
    <script>
        // Function to open the modal
        function openModal() {
            var modal = document.getElementById('addMemberModal');
            modal.style.display = "block";
        }

        // Function to close the modal
        function closeModal() {
            var modal = document.getElementById('addMemberModal');
            modal.style.display = "none";
        }

        // Event listener to close the modal when clicking on the close button
        var closeButtons = document.querySelectorAll('.close');
        closeButtons.forEach(function (button) {
            button.addEventListener('click', function () {
                closeModal();
            });
        });

        // Event listener to close the modal when clicking outside of it
        window.addEventListener('click', function (event) {
            var modal = document.getElementById('addMemberModal');
            if (event.target == modal) {
                closeModal();
            }
        });

        var modifyButton = document.querySelector('.red-button');
        modifyButton.addEventListener('click', function () {
            openModal();
        });


                // functionality of search bar

                document.getElementById('searchInput').addEventListener('keyup', function () {
            var searchValue = this.value.toLowerCase();
            var table = document.getElementById('membersTable'); // Ensure your table has this ID
            var tr = table.getElementsByTagName('tr');

            for (var i = 0; i < tr.length; i++) {
                var td = tr[i].getElementsByTagName('td')[0]; // Assuming event names are in the first column
                if (td) {
                    var txtValue = td.textContent || td.innerText;
                    if (txtValue.toLowerCase().indexOf(searchValue) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        });

    </script>
</body>

</html>