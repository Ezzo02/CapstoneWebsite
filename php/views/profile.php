<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Page</title>

    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap" rel="stylesheet">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css'>
    <link rel="stylesheet" href="css/member.css">
    <!-- <link rel="stylesheet" href="css/dashboard.css"> -->
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
        .event__field select,
        .event__field textarea {
            width: 100%;
            padding: 3px;
            border: 1px solid #e1242b;
            border-radius: 3px;
            box-sizing: border-box;
        }

        .event__field input:focus,
        .event__field select:focus,
        .event__field textarea:focus {
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


        /* events form  modal  */

        .modal {
            display: none;
            position: fixed;
            z-index: 100000;
            top: 2vh;
            left: 35vw;

            min-width: 400px;
            width: 400px;
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
            width: 100%;
        }

        .modal .closed {
            display: block;
            color: black;
            text-align: right;
            font-size: 28px;
            font-weight: bold;
        }

        .modal .closed:hover,
        .modal .closed:focus {
            color: #e1242b;
            text-decoration: none;
            cursor: pointer;
        }
    </style>

</head>

<body>

    <section>
        <a href="/CapstoneWebsite/logout">
            <i class='bx bxs-log-out'
                style="position: absolute;top: px;right: 6.5rem;font-size: 50px;color: #e1242b;cursor:pointer;">
            </i>
        </a>
        <div class="profile py-4">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <div style="height: 70px"></div>
                        <div class="card shadow-sm">
                            <div class="card-header bg-transparent text-center">
                                <img class="profile_img" src="<?php echo $user['Profile Picture'] ?>">
                                <h5><?php echo $user['Username'] ?></h5>
                                <h7>Volunteer</h7>
                            </div>
                            <div class="card-body">
                                <p class="mb-0"><strong class="pr-1">Member's ID:
                                    </strong><?php echo $user["Member's ID"] ?></p>
                                <p class="mb-0"><strong class="pr-1">Club:</strong><?php echo $user['Club'] ?></p>
                                <p class="mb-0"><strong class="pr-1">Joining Date:</strong>
                                    <?php echo empty($user['Joining Date']) ? '' : date('F j, Y', strtotime($user['Joining Date'])) ?>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-8">
                        <div style="height: 70px"></div>
                        <div class="card shadow-sm">
                            <div class="card-header bg-transparent border-0">
                                <h3 class="mb-0"><i class="fa fa-user"></i> Personal Information</h3><br>
                            </div>
                            <div class="card-body pt-0">
                                <table class="table table-bordered">
                                    <tr>
                                        <th width="30%">Adress :</th>
                                        <td width="50%"><?php echo empty($user['Address']) ? '' : $user['Address'] ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th width="30%">Phone No. :</th>
                                        <td width="50%">
                                            <?php echo empty($user['Phone Number']) ? '' : $user['Phone Number'] ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th width="30%">Email :</th>
                                        <td width="50%"><?php echo empty($user['Email']) ? '' : $user['Email'] ?></td>
                                    </tr>
                                    <tr>
                                        <th width="30%">Birthday :</th>
                                        <td width="50%">
                                            <?php echo empty($user['Birthday']) ? '' : date('F j, Y', strtotime($user['Birthday'])) ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th width="30%">Emergency Contact :</th>
                                        <td width="50%">
                                            <?php echo empty($user['Emergancy Contact']) ? '' : $user['Emergancy Contact'] ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th width="30%">Blood Type :</th>
                                        <td width="50%">
                                            <?php echo empty($user['Blood Type']) ? '' : $user['Blood Type'] ?>
                                        </td>
                                    </tr>
                                </table>

                                <div class="card shadow-sm">
                                    <div class="card-header bg-transparent border-0">
                                        <h3 class="mb-0"><i class="fa fa-bars"></i> About Me</h3>
                                    </div>
                                    <div class="card-body pt-0">
                                        <p> <?php echo empty($user['About']) ? '' : $user['About'] ?>

                                        </p>
                                    </div>
                                </div>
                                <!-- Button to modify data -->
                                <button class="btn btn-primary btn-block mt-3 red-button">Modify Data</button>
                            </div>
                        </div>
                    </div>
                    <!-- Member Events Section -->
                    <div class="col-lg-12 mt-4">
                        <div class="card shadow-sm">
                            <div class="card-header bg-transparent border-0">
                                <h3 class="mb-0"><i class="fa fa-calendar"></i> Member Events</h3>
                            </div>
                            <div class="card-body">
                                <!-- List of member events -->
                                <ul>
                                    <?php $i = 0 ?>
                                    <?php foreach ($events as $event): ?>
                                        <?php $i++ ?>
                                        <li>Event <?php echo $i ?>: <?php echo $event['Event_Name'] ?>,
                                            <?php echo $event['Date_of_Event'] ?>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                                <!-- Participation percentage -->
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="60"
                                        aria-valuemin="0" aria-valuemax="100"><?php echo $percentParticipation ?>%
                                        Participation
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Member Events Section -->
                </div>
            </div>
        </div>


        <!-- modal for updating user info -->
        <div id="profileModal" class="modal">
            <div class="modal-content">
                <span class="closed">&times;</span>
                <form id="update-profile-form" action="/CapstoneWebsite/update_profile" method="post">
                    <h2 id="modalTitle">Update Profile</h2>
                    <div class="event__field">
                        <label for="edit-profile-email">Email:</label>
                        <input type="email" id="edit-profile-email" name="profile-email" />
                    </div>
                    <div class="event__field">
                        <label for="edit-profile-address">Address:</label>
                        <input type="text" id="edit-profile-address" name="profile-address" />
                    </div>
                    <div class="event__field">
                        <label for="edit-profile-phone">Phone Number:</label>
                        <input type="tel" id="edit-profile-phone" name="profile-phone" />
                    </div>
                    <div class="event__field">
                        <label for="edit-profile-birthday">Birthday:</label>
                        <input type="date" id="edit-profile-birthday" name="profile-birthday" />
                    </div>
                    <div class="event__field">
                        <label for="edit-profile-emergency">Emergency Contact:</label>
                        <input type="tel" id="edit-profile-emergency" name="profile-emergency" />
                    </div>
                    <div class="event__field">
                        <label for="edit-profile-blood">Blood Type:</label>
                        <input type="text" id="edit-profile-blood" name="profile-blood" />
                    </div>
                    <div class="event__field">
                        <label for="edit-profile-about">About:</label>
                        <textarea type="text" id="edit-profile-about" name="profile-about">
                        </textarea>
                    </div>
                    <button type="submit" class="event__submit" name="update-profile-submit" id="modalSubmitButton">
                        Update Profile
                    </button>
                </form>
            </div>
        </div>

        </div>


    </section>
    <script>
        window.onload = function () {
            fillFormData();
            setupIntersectionObserver();
        };

        // Function to open the modal
        function openModal() {
            var modal = document.getElementById('profileModal');
            modal.style.display = "block";
        }

        // Function to close the modal
        function closeModal() {
            var modal = document.getElementById('profileModal');
            modal.style.display = "none";
        }

        // Event listener to close the modal when clicking on the close button
        var closeButtons = document.querySelectorAll('.closed');
        closeButtons.forEach(function (button) {
            button.addEventListener('click', function () {
                closeModal();
            });
        });

        // Event listener to close the modal when clicking outside of it
        window.addEventListener('click', function (event) {
            var modal = document.getElementById('profileModal');
            if (event.target == modal) {
                closeModal();
            }
        });

        // Event listener to open the modal when clicking the "Modify Data" button
        var modifyButton = document.querySelector('.red-button');
        modifyButton.addEventListener('click', function () {
            openModal();
        });

        // Function to fill the form inputs with user data
        function fillFormData() {
            var emailInput = document.getElementById('edit-profile-email');
            var addressInput = document.getElementById('edit-profile-address');
            var phoneInput = document.getElementById('edit-profile-phone');
            var birthdayInput = document.getElementById('edit-profile-birthday');
            var emergencyInput = document.getElementById('edit-profile-emergency');
            var bloodInput = document.getElementById('edit-profile-blood');
            var aboutInput = document.getElementById('edit-profile-about');

            emailInput.value = "<?php echo empty($user['Email']) ? '' : $user['Email']; ?>";
            addressInput.value = "<?php echo empty($user['Address']) ? '' : $user['Address']; ?>";
            phoneInput.value = "<?php echo empty($user['Phone Number']) ? '' : $user['Phone Number']; ?>";
            birthdayInput.value = "<?php echo empty($user['Birthday']) ? '' : $user['Birthday']; ?>";
            emergencyInput.value = "<?php echo empty($user['Emergency Contact']) ? '' : $user['Emergency Contact']; ?>";
            bloodInput.value = "<?php echo empty($user['Blood Type']) ? '' : $user['Blood Type']; ?>";
            aboutInput.value = "<?php echo empty($user['About']) ? '' : $user['About']; ?>";
        }

        // Function to setup IntersectionObserver for progress bar
        function setupIntersectionObserver() {
            var progressBar = document.querySelector('.progress-bar');
            var percentage = '<?php echo $percentParticipation ?>'
            var observer = new IntersectionObserver(function (entries) {
                if (entries[0].isIntersecting) {
                    progressBar.style.width = percentage + '%';
                    progressBar.setAttribute('aria-valuenow', percentage);
                    observer.disconnect();
                }
            });

            observer.observe(progressBar);
        }
    </script>

</body>

</html>