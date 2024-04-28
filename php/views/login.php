<!DOCTYPE html>
   <html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">

      <!--=============== REMIXICONS ===============-->
      <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">

      <!--=============== CSS ===============-->
      <link rel="stylesheet" href="css/indexstyle.css">

      <title>Red Cross Youth Sector</title>
   </head>
   <body>
      <div class="login">
         <img src="images/index_background.jpeg" alt="login image" class="login__img">

         <form action="/CapstoneWebsite/login" method="post" class="login__form">
            <h1 class="login__title">Login</h1>

            <div class="login__content">
               <div class="login__box">
                  <i class="ri-user-3-line login__icon"></i>

                  <div class="login__box-input">
                     <input type="text" name="username" required class="login__input" id="login-username" placeholder=" ">
                     <label for="login-username" class="login__label">Username</label>
                  </div>
               </div>

               <div class="login__box">
                  <i class="ri-lock-2-line login__icon"></i>

                  <div class="login__box-input">
                     <input type="password" name="password" required class="login__input" id="login-pass" placeholder=" ">
                     <label for="login-pass" class="login__label">Password</label>
                     <i class="ri-eye-off-line login__eye" id="login-eye"></i>
                  </div>
               </div>
            </div>

            <div class="login__check">
               <div class="login__check-group">
                  <input type="checkbox" class="login__check-input" id="login-check">
                  <label for="login-check" class="login__check-label">Remember me</label>
               </div>

               <a href="#" class="login__forgot">Forgot Password?</a>
            </div>

            <button type="submit" name="login-submit" class="login__button">Login</button>

         </form>
      </div>
      
      <!--=============== MAIN JS ===============-->
      <script src="javascript/main.js"></script>

      <script>
         function login() {
            var username = document.getElementById("login-username").value;
            var password = document.getElementById("login-pass").value;
   
            if (username === "admin" && password === "1234") {
               window.location.href = "dashboard.html";
            } else {
               alert("Incorrect username or password. Please try again.");
            }
         }

         function login() {
            var username = document.getElementById("login-username").value;
            var password = document.getElementById("login-pass").value;
   
            if (username === "sara" && password === "1234") {
               window.location.href = "profile.html";
            } else {
               alert("Incorrect username or password. Please try again.");
            }
         }
      </script>
   </body>
</html>