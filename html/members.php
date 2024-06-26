<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Boxicons -->
    <link
      href="https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css"
      rel="stylesheet"
    />
    <!-- My CSS -->
    <link rel="stylesheet" href="../css/dashboard.css" />

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
          <a href="dashboard.html">
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
        <li class="active">
          <a href="#">
            <i class="bx bxs-group"></i>
            <span class="text">Members</span>
          </a>
        </li>
        <li>
          <a href="events.html">
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
          <a href="../index.html" class="logout">
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
          <button
            id="addMemberButton"
            class="btn-download"
            style="cursor: pointer"
          >
            <i class="bx bxs-cloud-download"></i>
            <span class="text">Add New Member</span>
          </button>
        </div>

        <!-- MODAL -->
        <div id="addMemberModal" class="modal">
          <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Add New Member</h2>
            <form id="addMemberForm">
              <label for="memberName">Member Username:</label>
              <input type="text" id="memberName" name="memberName" required />
              <label for="idNumber">ID Number:</label>
              <input type="text" id="idNumber" name="idNumber" />
              <label for="password">Password:</label>
              <input type="password" id="password" name="password" />
              <label for="joiningdate">Joining Date:</label>
              <input type="date" id="joiningdate" name="joiningdate" />
              <label for="club">Club:</label>
              <select id="club" name="club">
                <option value="LAU">LAU</option>
                <option value="AUB">AUB</option>
                <option value="BAU">BAU</option>
                <option value="Beirut">Beirut</option>
              </select>
              <button type="submit" class="add-member-btn">Add Member</button>
            </form>
          </div>
        </div>
        <!-- END MODAL -->

        <!-- TABLE DATA -->
        <div class="table-data">
          <div class="order">
            <div class="head">
              <h3>New Members</h3>
              <i class="bx bx-search"></i>
              <i class="bx bx-filter"></i>
            </div>
            <table>
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
                <tr>
                  <td>Mohammad Mohammad</td>
                  <td>City, Country</td>
                  <td>123456789</td>
                  <td>LAU</td>
                  <td>123-456-7890</td>
                  <td>example@example.com</td>
                  <td>01-10-1990</td>
                  <td>O+</td>
                  <td>(555) 555-5555</td>
                </tr>
                <!-- Add more rows for additional members -->
              </tbody>
            </table>
          </div>
        </div>
      </main>

      <div id="editEventModal" class="modal">
        <div class="modal-content">
          <span class="close">&times;</span>
          <form
            id="update-event-form"
            action="/CapstoneWebsite/events"
            method="post"
          >
            <h2 id="modalTitle">Edit Event</h2>
            <div class="event__field">
              <label for="edit-event-name">Event Name:</label>
              <input
                type="text"
                id="edit-event-name"
                name="event-name"
                required
              />
            </div>
            <div class="event__field">
              <label for="edit-event-date">Date of Event:</label>
              <input
                type="date"
                id="edit-event-date"
                name="event-date"
                required
              />
            </div>
            <div class="event__field">
              <label for="edit-event-cost">Cost of Event:</label>
              <input
                type="number"
                id="edit-event-cost"
                name="event-cost"
                required
              />
            </div>
            <div class="event__field center">
              <label for="edit-event-approved">Approved:</label>
              <input
                type="checkbox"
                id="edit-event-approved"
                name="event-approved"
              />
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
                  <label style="display: inline" for="edit-event-approved"
                    ><?php echo $user['Username']; ?></label
                  >
                  <input
                    type="checkbox"
                    name="users[]"
                    value="<?php echo $user['ID']; ?>"
                  />
                </div>
                <?php endforeach; ?>
              </div>
            </div>
            <input type="hidden" id="event-id" name="event-id" value="" />
            <button
              type="submit"
              class="event__submit"
              name="update-event-submit"
              id="modalSubmitButton"
            >
              Update Event
            </button>
          </form>
        </div>
      </div>
      <!-- MAIN -->
    </section>
    <!-- CONTENT -->

    <script src="../javascript/dashboard.js"></script>
    <script>
      document.addEventListener("DOMContentLoaded", function () {
        // Get the modal
        const modal = document.getElementById("addMemberModal");

        // Get the button that opens the modal
        const addMemberButton = document.getElementById("addMemberButton");

        // Get the <span> element that closes the modal
        const closeBtn = document.querySelector(".close");

        // When the user clicks the button, open the modal
        addMemberButton.onclick = function () {
          modal.style.display = "block";
        };

        // When the user clicks on <span> (x), close the modal
        closeBtn.onclick = function () {
          modal.style.display = "none";
        };

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function (event) {
          if (event.target == modal) {
            modal.style.display = "none";
          }
        };

        // Handle form submission
        const addMemberForm = document.getElementById("addMemberForm");
        addMemberForm.addEventListener("submit", function (event) {
          event.preventDefault();
          const memberName = document.getElementById("memberName").value;
          const joinDate = document.getElementById("joinDate").value;

          // You can perform any further processing like adding the member to your database here

          // For now, let's just close the modal
          modal.style.display = "none";
          addMemberForm.reset(); // Reset the form fields
        });
      });
    </script>
  </body>
</html>
