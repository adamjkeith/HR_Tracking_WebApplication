<?php
    $cookies = $_COOKIE;
             foreach ($cookies as $cookie_name => $cookie_value) {
               setCookie($cookie_name, '', time() - 3600);
              }	
          if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["login"])) {
            $servername = "localhost";
            $username = "root";
            $password = "Password";
            $dbname = "webapp";
            $conn = new mysqli($servername, $username, $password, $dbname);
            if ($conn->connect_error) {
              die("Connection failed: " . $conn->connect_error);
            }
            $username = $_POST['username'];
            $password = $_POST['password'];
            $stmt = $conn->prepare("SELECT * FROM logins WHERE username=? AND password=?");
            $stmt->bind_param("ss", $username, $password);
            $stmt->execute();
            $result = $stmt->get_result();
            if ($result->num_rows === 1) {
              $row = $result->fetch_assoc();
              $name = $username;
              $notification = $row['notification'];	
              $userID = $row['userID'];
              $admin = $row['admin'];
              if ($admin == 0) {
                setCookie('admin', 'bGdqMjQ1Jm5qa2w2OA', time() + 86400, '/');
              }
              else{
                setCookie('admin', $admin, time() + 86400, '/');
              }
              setCookie('userID', $userID, time() + 86400, '/');
              setCookie('name', $name, time() + 86400, '/');
              echo "<script>
              sessionStorage.setItem('formSubmitted', 'true');
              setTimeout(function() {window.location.href = '../en/loadingTrackers/loading_screen.html';}, 500); // Delay in milliseconds (0.5 seconds in this case)
            </script>";
            } else {
              echo "<script>alert('Invalid username or password.')</script>";
            }
            $stmt->close();
            $conn->close();
          }
          ?>

<!DOCTYPE html>
<html lang="en">
<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0">
<head>
  <title>Login</title>
  <link rel="icon" href="logo.ico" type="image/x-icon">
  <style>
    .underline{
     text-decoration:underline;
    }

    .cookie-banner {
      position: fixed;
      bottom: 0;
      left: 0;
      width: 100%;
      padding: 10px;
      background-color: #f2f2f2;
      text-align: center;
      font-size: 14px;
    }

    .cookie-banner button {
      background-color: red;
      color: white;
      border: none;
      padding: 5px 15px;
      border-radius: 3px;
      cursor: pointer;
    }

    html, body {
      height: 100%;
      margin: 0;
      padding: 0;
    }
    
    body {
      display: flex;
      align-items: center;
      justify-content: center;
      background-color: white;
      font-family: Arial, sans-serif;
    }
    
    .container {
      max-width: 450px;
      width: 90%;
      padding: 20px;
      background-color: white;
      border-radius: 5px;
      box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);
      text-align: center;
      position: relative;
    }
    
    .close-box {
      position: fixed;
      top: 10px;
      right: 10px;
      padding: 10px;
      background-color: #f2f2f2;
      border-radius: 5px;
    }
    
    .close-button {
      width: 20px;
      height: 20px;
      cursor: pointer;
      position: relative;
    }
    .close-button:before,
    .close-button:after {
      content: '';
      position: absolute;
      top: 50%;
      left: 0;
      width: 100%;
      height: 2px;
      background-color: #000;
    }

    .close-button:before {
      transform: rotate(45deg);
    }

    .close-button:after {
      transform: rotate(-45deg);
    }
    
    h2 {
      margin-top: 0;
      color: red;
      font-size: 24px;
    }
    
    label {
      display: block;
      margin-bottom: 10px;
      color: black;
      font-size: 16px;
    }
    
    input[type="text"],
    input[type="password"] {
      width: 100%;
      padding: 8px;
      border: 1px solid lightgray;
      border-radius: 3px;
      font-size: 16px;
    }
    
    input[type="submit"] {
      width: 100%;
      padding: 10px;
      margin-top: 10px;
      background-color: red;
      color: white;
      border: none;
      border-radius: 3px;
      cursor: pointer;
      font-size: 16px;
    }
    
    .error-message {
      margin-top: 10px;
      color: red;
      font-size: 14px;
    }
    
    .logo {
      margin-bottom: 20px;
    }
    
    .logo img {
      max-width: 100%;
      height: auto;
    }
    
    @media (max-width: 600px) {
      .container {
        max-width: 100%;
      }
      
      h2 {
        font-size: 20px;
      }
      
      label {
        font-size: 14px;
      }
      
      input[type="text"],
      input[type="password"] {
        font-size: 14px;
      }
      
      input[type="submit"] {
        font-size: 14px;
      }
      
      .error-message {
        font-size: 12px;
      }
    }

    @keyframes cogSpin {
      0% {
        transform: rotate(0deg);
      }
      100% {
        transform: rotate(360deg);
      }
    }

    .spin{
      animation: cogSpin 5s infinite;
    }
  </style>
</head>
<body class="body" id="body">

  <div class="container">
    <div class="logo">
      <img src="logo.png" alt="Logo">
    </div>
    <h2>Login</h2>
    <form method="post" >
      <label for="username">Username:</label>
      <input type="text" id="username" name="username" required>
      <br>
      <br>
      <label for="password">Password:</label>
      <input type="password" id="password" name="password" required>

      <input type="submit" value="Login" name="login">

      <div class="error-message" id="error-message">
      <div>
      <p class="error-message"><c onclick=easteregg()>Version:</c> 2023.0.8.7c</p>
      
      </div>

      </div>
    </form>
    <p class="error-message">Before using please read the: <a class="underline" href="terms-conditions.html">Terms and Conditions</a></p>
  </div>

  <div class="cookie-banner">
    Please ensure cookie blockers are disabled as we use first-party cookies.
    <button onclick="closeCookieBanner()">Got it!</button>
  </div>

  <script>
    function closeCookieBanner() {
      var cookieBanner = document.querySelector('.cookie-banner');
      cookieBanner.style.display = 'none';

      document.cookie = 'cookieBannerDismissed=true; expires=Fri, 31 Dec 9999 23:59:59 GMT; path=/';
    }
    function checkCookieBannerDismissed() {
      return document.cookie.indexOf('cookieBannerDismissed=true') !== -1;
    }
    var cookieBanner = document.querySelector('.cookie-banner');
    if (checkCookieBannerDismissed()) {
      cookieBanner.style.display = 'none';
    } else {
      cookieBanner.style.display = 'block';
    }
  </script>


<script>
  function setCookie(name, value, days) {
    var expires = "";
    if (days) {
      var date = new Date();
      date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
      expires = "; expires=" + date.toUTCString();
    }
    document.cookie = name + "=" + (value || "") + expires + "; path=/";
  }
</script>

<script>
  function setCookie(name, value, days) {
    var expires = "";
    if (days) {
      var date = new Date();
      date.setTime(date.getTime() + days * 24 * 60 * 60 * 1000);
      expires = "; expires=" + date.toUTCString();
    }
    document.cookie = name + "=" + (value || "") + expires + "; path=/";
  }
  function deleteCookie(name) {
    document.cookie = name + "=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
  }
  if (document.cookie.indexOf("userID") === -1) {
    setCookie("userID", "0", 365);
  }
  function deleteNonEssentialCookies() {
    var cookies = document.cookie.split("; ");
    cookies.forEach(function (cookie) {
      var cookieParts = cookie.split("=");
      var cookieName = cookieParts[0];
      if (cookieName !== "cookieBannerDismissed") {
        deleteCookie(cookieName);
      }
    });
  }
  function checkCookieBannerDismissed() {
    return document.cookie.indexOf("cookieBannerDismissed=true") !== -1;
  }
  var cookieBanner = document.querySelector(".cookie-banner");
  if (checkCookieBannerDismissed()) {
    cookieBanner.style.display = "none";
  } else {
    cookieBanner.style.display = "block";
  }

</script>

<script>
  function setCookie(name, value, days) {
    var expires = "";
    if (days) {
      var date = new Date();
      date.setTime(date.getTime() + days * 24 * 60 * 60 * 1000);
      expires = "; expires=" + date.toUTCString();
    }
    document.cookie = name + "=" + (value || "") + expires + "; path=/";
  }
  function deleteCookie(name) {
    document.cookie = name + "=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
  }
  if (document.cookie.indexOf("userID") === -1) {
    setCookie("userID", "0", 365);
  }

  function deleteNonEssentialCookies() {
    if (sessionStorage.getItem('formSubmitted')) {
      sessionStorage.removeItem('formSubmitted');
    } else {
      var cookies = document.cookie.split("; ");
      cookies.forEach(function (cookie) {
        var cookieParts = cookie.split("=");
        var cookieName = cookieParts[0];
        if (cookieName !== "cookieBannerDismissed") {
          deleteCookie(cookieName);
        }
      });
    }
  }
  function checkCookieBannerDismissed() {
    return document.cookie.indexOf("cookieBannerDismissed=true") !== -1;
  }
  var cookieBanner = document.querySelector(".cookie-banner");
  if (checkCookieBannerDismissed()) {
    cookieBanner.style.display = "none";
  } else {
    cookieBanner.style.display = "block";
  }
  deleteNonEssentialCookies();
  var counter = 0;

function easteregg() {
  counter++;
  if (counter === 14) {
    var cog = document.getElementById('body');
    cog.classList.add('spin');
    document.addEventListener('keydown', handleKeydown);
  }
}

function handleKeydown(event) {
  var key = event.key.toLowerCase();
  if (key === 'a') {
    var sequence = key;
    document.addEventListener('keydown', function continueSequence(e) {
      sequence += e.key.toLowerCase();
      console.log(sequence);
      if (sequence === 'aj') {
        document.addEventListener('keydown', function continueSequence(e) {
      sequence += e.key.toLowerCase();
      if (sequence === 'ajk') {
        window.location.href = '/login/egg/egg.html';
      }
      document.removeEventListener('keydown', continueSequence);
    });
      }
      document.removeEventListener('keydown', continueSequence);
    });
  }
}

</script>


<!--Start of Tawk.to Script-->
<script type="text/javascript">
// Put tawk script here

</script>

<!--End of Tawk.to Script-->
</body>
</html>
