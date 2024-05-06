<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <!-- My CSS -->
    <link rel="stylesheet" href="css/dashboard.css">
    <!-- chart -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        .chart-container {
            width: 100%;
            /* height: 80vh; */
            /* float: right; */
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
            <li>
                <a href="/CapstoneWebsite/dashboard">
                    <i class='bx bxs-dashboard'></i>
                    <span class="text">Dashboard</span>
                </a>
            </li>
            <li class="active">
                <a href="/CapstoneWebsite/analytics">
                    <i class='bx bxs-doughnut-chart'></i>
                    <span class="text">Analytics</span>
                </a>
            </li>
            <li>
                <a href="/CapstoneWebsite/members">
                    <i class='bx bxs-group'></i>
                    <span class="text">Members</span>
                </a>
            </li>
            <li>
                <a href="/CapstoneWebsite/events">
                    <i class='bx bxs-calendar'></i>
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
            <!-- content -->
            <div class="chart-container">
                <canvas id="myMultiChart"></canvas>
            </div>
        </main>
        <!-- MAIN -->
    </section>
    <!-- CONTENT -->





    <script>
        var eventsData = <?php echo json_encode($events_statistics); ?>;
        console.log(eventsData)

        const monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
        const labels = eventsData.map(item => monthNames[item.Month - 1] + '-' + item.Year);

        const numberOfEvents = eventsData.map(item => item.NumberOfEvents);
        const costs = eventsData.map(item => item.Costs);
        const cumulativeMembers = eventsData.map(item => item.CumulativeMembers);

        const ctx = document.getElementById('myMultiChart').getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Number of Events',
                    data: numberOfEvents,
                    backgroundColor: 'rgba(255, 206, 86, 0.2)',
                    borderColor: 'rgba(255, 206, 86, 1)',
                    yAxisID: 'y',
                }, {
                    label: 'Costs',
                    data: costs,
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    yAxisID: 'y1',
                }, {
                    label: 'Cumulative Members',
                    data: cumulativeMembers,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    yAxisID: 'y2',
                }]
            },
            options: {
                scales: {
                    y: {
                        type: 'linear',
                        display: true,
                        position: 'left',
                    },
                    y1: {
                        type: 'linear',
                        display: true,
                        position: 'right',
                        grid: {
                            drawOnChartArea: false,
                        },
                    },
                    y2: {
                        type: 'linear',
                        display: true,
                        position: 'right',
                        grid: {
                            drawOnChartArea: false,
                        },
                    }
                }
            }
        });

    </script>
    <script src="javascript/dashboard.js"></script>
</body>

</html>