<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <!-- My CSS -->
    <link rel="stylesheet" href="css/dashboard.css">

    <!-- styling -->

    <style>
        .table-data .order table {
            width: 100%;
        }

        .table-data .order table th:first-child,
        .table-data .order table td:first-child {
            width: 50%;
        }

        .table-data .order table th:not(:first-child),
        .table-data .order table td:not(:first-child) {
            width: 25%;
        }
    </style>
    <title>AdminHub</title>
</head>

<body>


    <!-- SIDEBAR -->
    <section id="sidebar">
        <a href="#" class="brand">
            <i class='bx bxs-smile'></i>
            <span class="text">Admin Dashboard</span>
        </a>
        <ul class="side-menu top">
            <li class="active">
                <a href="#">
                    <i class='bx bxs-dashboard'></i>
                    <span class="text">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="analytics.html">
                    <i class='bx bxs-doughnut-chart'></i>
                    <span class="text">Analytics</span>
                </a>
            </li>
            <li>
                <a href="messages.html">
                    <i class='bx bxs-message-dots'></i>
                    <span class="text">Messages</span>
                </a>
            </li>
            <li>
                <a href="members.html">
                    <i class='bx bxs-group'></i>
                    <span class="text">Members</span>
                </a>
            </li>
            <li>
                <a href="/CapstoneWebsite/events">
                    <i class='bx bxs-group'></i>
                    <span class="text">Events</span>
                </a>
            </li>

        </ul>
        <ul class="side-menu">
            <li>
                <a href="#">
                    <i class='bx bxs-cog'></i>
                    <span class="text">Settings</span>
                </a>
            </li>
            <li>
                <a href="/CapstoneWebsite/logout" class="logout">
                    <i class='bx bxs-log-out-circle'></i>
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
            <i class='bx bx-menu'></i>
            <a href="#" class="nav-link">Categories</a>
            <form action="#">
                <div class="form-input">
                    <input type="search" placeholder="Search...">
                    <button type="submit" class="search-btn"><i class='bx bx-search'></i></button>
                </div>
            </form>
            <input type="checkbox" id="switch-mode" hidden>
            <label for="switch-mode" class="switch-mode"></label>
            <a href="#" class="notification">
                <i class='bx bxs-bell'></i>
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
                    <h1>Dashboard</h1>
                    <ul class="breadcrumb">
                        <li>
                            <a href="#">Dashboard</a>
                        </li>
                        <li><i class='bx bx-chevron-right'></i></li>
                        <li>
                            <a class="active" href="#">Home</a>
                        </li>
                    </ul>
                </div>
                <a href="#" class="btn-download">
                    <i class='bx bxs-cloud-download'></i>
                    <span class="text">Download PDF</span>
                </a>
            </div>

            <ul class="box-info">
                <li>
                    <i class='bx bxs-calendar-check'></i>
                    <span class="text">
                        <h3><?php echo count($events) ?></h3>
                        <p>New Events</p>
                    </span>
                </li>
                <li>
                    <i class='bx bxs-group'></i>
                    <span class="text">
                        <h3><?php
                            $totalMembers = 0;

                            foreach ($users as $user) {
                                if($user['Position']==='member'){
                                    $totalMembers +=1;
                                }
                            }
                            echo "$totalMembers";
                            ?></h3>
                        <p>Members</p>
                    </span>
                </li>
                <li>
                    <i class='bx bxs-dollar-circle'></i>
                    <span class="text">
                        <h3>
                            <?php
                            $totalCost = 0;

                            foreach ($events as $event) {
                                $totalCost += $event['Cost_of_Event'];
                            }
                            echo "$totalCost";
                            ?>$
                        </h3>
                        <p>Costs</p>
                    </span>
                </li>
            </ul>


            <div class="table-data">
                <div class="order prime">
                    <div class="head">
                        <h3>Recent Events</h3>
                        <!-- <i class='bx bx-search'></i> -->
                        <!-- <i class='bx bx-filter'></i> -->
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th>Event</th>
                                <th>Date of Event</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 0;
                            foreach ($events as $event):
                                if ($i >= 5)
                                    break; 
                                $i++;
                                ?>
                                <tr>
                                    <td>
                                        <p><?php echo $event['Event_Name']; ?></p>
                                    </td>
                                    <td><?php echo date('F j, Y', strtotime($event['Date_of_Event'])); ?></td>
                                    <td>
                                        <span
                                            class="status <?php echo $event['Status_of_Event'] === 'in-progress' ? 'process' : $event['Status_of_Event']; ?>">
                                            <?php echo $event['Status_of_Event'] === 'in-progress' ? 'In Progress' : $event['Status_of_Event']; ?>
                                        </span>
                                    </td>
                                </tr>
                            <?php endforeach; ?>

                        </tbody>
                    </table>
                </div>
                <!--div class="To Approve">
                    <div class="head">
                        <h3>Todos</h3>
                        <i class='bx bx-plus' ></i>
                        <i class='bx bx-filter' ></i>
                    </div>
                    <ul class="todo-list">
                        <li class="completed">
                            <p>Todo List</p>
                            <i class='bx bx-dots-vertical-rounded' ></i>
                        </li>
                        <li class="completed">
                            <p>Todo List</p>
                            <i class='bx bx-dots-vertical-rounded' ></i>
                        </li>
                        <li class="not-completed">
                            <p>Todo List</p>
                            <i class='bx bx-dots-vertical-rounded' ></i>
                        </li>
                        <li class="completed">
                            <p>Todo List</p>
                            <i class='bx bx-dots-vertical-rounded' ></i>
                        </li>
                        <li class="not-completed">
                            <p>Todo List</p>
                            <i class='bx bx-dots-vertical-rounded' ></i>
                        </li>
                    </ul>
                </-div-->
            </div>
        </main>
        <!-- MAIN -->
    </section>
    <!-- CONTENT -->


    <script src="javascript/dashboard.js"></script>
</body>

</html>