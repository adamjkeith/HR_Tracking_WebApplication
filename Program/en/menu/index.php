<!DOCTYPE html>
<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<html lang="en-UK">
<head>
  <title>Main Menu</title>
  <link rel="icon" href="logo.ico" type="image/x-icon">
  <style>
    /* Your existing CSS styling here */
    body {
      background-color: white;
      color: black;
      font-family: Arial, sans-serif;
      font-size: 18px;
      display: -ms-flexbox;
      display: flex;
      -ms-flex-direction: column;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      height: 100vh;
      margin: 0;
      padding: 0;
      opacity: 0;
      transition: opacity 0.5s;
      zoom: 1;
    }
    
    h1 {
      color: red;
      margin-bottom: 30px;
      position: relative;
      z-index: 1;
      font-size: 24px;
    }
    
    .menu {
      background-color: lightgray;
      padding: 15px;
      border-radius: 5px;
      margin-bottom: 30px;
      display: -ms-flexbox;
      display: flex;
      -ms-flex-direction: column;
      flex-direction: column;
      align-items: center;
    }
    
    .button {
      background-color: red;
      color: white;
      padding: 15px 30px;
      border: none;
      border-radius: 5px;
      text-decoration: none;
      font-weight: bold;
      transition: background-color 0.3s ease, cursor 0.3s ease;
      cursor: pointer;
      margin-bottom: 20px;
      display: flex;
      align-items: center;
      font-size: 18px;
    }

    .buttonn{
      display:none;
    }
    
    .button:hover {
      background-color: darkred;
    }
    
    .logout-button {
      background-color: black;
      color: white;
      padding: 15px 30px;
      border: none;
      border-radius: 5px;
      text-decoration: none;
      font-weight: bold;
      margin-top: 30px;
      transition: background-color 0.3s ease, cursor 0.3s ease;
      cursor: pointer;
      font-size: 18px;
    }
    
    .logout-button:hover {
      background-color: darkgray;
    }
    
    .fade-in {
      opacity: 1;
    }
    
    .fade-out {
      opacity: 0;
    }
    
    .logo {
      position: relative;
      top: 10px;
      left: 10px;
      max-width: 30%;
      height: auto;
      z-index: 1;
    }

    .flag {
      position: absolute;
      padding-left: 20px;
      width: 40px; /* Adjust the width as needed */
      z-index: 1;
    }

    .flag:hover {
      animation: pulse 3s infinite;
      cursor: pointer;
    }

    @media only screen and (max-width: 600px) {
      body {
        padding: 15px;
      }
      
      .logo {
        top: -50px;
        max-width: 80%;
      }
    }
    
    .pulse-animation {
      animation: pulse 1s infinite;
    }
    
    .button img {
      width: 24px;
      height: 24px;
      margin-left: 10px;
    }
    
    .shake-animation {
      animation: shake 0.5s infinite;
    }
    
    @keyframes pulse {
      0% {
        transform: scale(1);
      }
      50% {
        transform: scale(1.1);
      }
      100% {
        transform: scale(1);
      }
    }
    
    @keyframes shake {
      0% {
        transform: translateX(0);
      }
      25% {
        transform: translateX(-4px) rotate(-5deg);
      }
      50% {
        transform: translateX(4px) rotate(5deg);
      }
      75% {
        transform: translateX(-4px) rotate(-5deg);
      }
      100% {
        transform: translateX(0);
      }
    }

    /* Additional CSS rules for specific flags, adjust as needed */
    .belarussianFlag {
      background-image: url("belarussian.png"));
    }


    .englishFlag {
      content: url("english.png");
    }

    .russianFlag {
      content: url("russian.png");
    }


    .testbutton {
      position: absolute;
      top: 10px;
      right: 10px;
      z-index: 1;
    }

    .cog {
      position: absolute;
      top: 20px;
      left: 30px;
      z-index: 1;
      width: 60px; /* Adjust the width as needed */
      height: auto; /* Maintains the aspect ratio of the flag images */
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

    .cog:hover {
      animation: pulse 3s infinite;
      cursor: pointer;

    }

    .s-pop-up {
      display: none;
      position: fixed;
      z-index: 1;
      padding-top: 100px;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      overflow: auto;
      background-color: rgb(0,0,0);
      background-color: rgba(0,0,0,0.4);
      text-align: center;
    }

    .s-pop-up-content {
      background-color: #fefefe;
      margin: auto;
      padding: 20px;
      border: 1px solid #888;
      width: 80%;
    }

    .s-pop-up-header {
      padding: 2px 16px;
      background-color: red;
      color: white;
      text-align: center;
    }

    .s-pop-up-body {
      padding: 2px 16px;
      background-color: white;
      color: black;
      text-align: center;
      align-items: center;
    }

    .s-pop-up-footer {
      padding: 2px 16px;
      background-color: red;
      color: white;
      text-align: center;
    }

    .s-close-button {
      color: Black;
      font-size: 28px;
      font-weight: bold;
      margin-top: 12px;
    }

    .s-close-button:hover,
    .s-close-button:focus {
      color: #000;
      text-decoration: none;
      cursor: pointer;
    }

    .s-pop-up-header h2 {
      margin: 0;
    }

    .s-pop-up-footer h3 {
      margin: 0;
    }

    .s-pop-up-body p {
      margin: 0 auto;
      font-size: 35px;
      align-items: center;
      text-align: center;
      margin-right: 40px;
      margin-top: 20px;
    }

    .s-pop-up-body button {
      align-items: center;
      text-align: center;
    }

    @media screen and (max-width: 700px){
      .s-pop-up-content {
        width: 100%;
      }
    }
    


    .fHidden {
      display: none;
    }

    .fShown {
      display: auto;
    }

    .pButton{
      background-color: red;
      color: white;
      padding: 15px 30px;
      border: none;
      border-radius: 5px;
      text-decoration: none;
      font-weight: bold;
      transition: background-color 0.3s ease, cursor 0.3s ease;
      cursor: pointer;
      display: flex;
      align-items: center;
      font-size: 24px;
      position: relative;
      margin: 0 auto;
      margin-top: 20px;
      margin-bottom: 20px;
    }
    .aButton{
      background-color: red;
      color: white;
      padding: 15px 30px;
      border: none;
      border-radius: 5px;
      text-decoration: none;
      font-weight: bold;
      transition: background-color 0.3s ease, cursor 0.3s ease;
      cursor: pointer;
      display: flex;
      align-items: center;
      font-size: 24px;
      position: relative;
      margin: 0 auto;
      margin-top: 20px;
      margin-bottom: 20px;  
    }

    .pButton:hover {
      background-color: darkred;
    }
    .aButton:hover {
      background-color: darkred;
    }

    .bButtons{
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .cButton{
      background-color: red;
      color: white;
      padding: 15px 30px;
      border: none;
      border-radius: 5px;
      text-decoration: none;
      font-weight: bold;
      transition: background-color 0.3s ease, cursor 0.3s ease;
      cursor: pointer;
      display: flex;
      align-items: center;
      font-size: 12px;
      position: relative;
      margin: 0 auto;
      margin-top: 20px;
      margin-bottom: 20px;
    }

    .apButton{
      background-color: red;
      color: white;
      padding: 15px 30px;
      border: none;
      border-radius: 5px;
      text-decoration: none;
      font-weight: bold;
      transition: background-color 0.3s ease, cursor 0.3s ease;
      cursor: pointer;
      display: flex;
      align-items: center;
      font-size: 12px;
      position: relative;
      margin: 0 auto;
      margin-top: 32px;
      margin-bottom: 20px;
    }

    .cButton:hover {
      background-color: darkred;
    }

    .apButton:hover {
      background-color: darkred;
    }

    .bButtons button{
      margin-left: 20px;
      margin-right: 20px;
    }

    .bButtons button:hover {
      background-color: darkred;
    }

    #overlay {
  display: none;
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.5); /* Semi-transparent black overlay */
  z-index: 9998; /* Set a z-index lower than the logout warning */

  /* Standard backdrop-filter for supported browsers */


  /* Vendor-prefixed backdrop-filter for Safari 9+ and Safari on iOS 9+ */
  -webkit-backdrop-filter: blur(5px);
  backdrop-filter: blur(5px);
}

#overlay2 {
  display: none;
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.5); /* Semi-transparent black overlay */
  z-index: 9998; /* Set a z-index lower than the logout warning */

  /* Standard backdrop-filter for supported browsers */

  /* Vendor-prefixed backdrop-filter for Safari 9+ and Safari on iOS 9+ */
  -webkit-backdrop-filter: blur(5px);
  backdrop-filter: blur(5px);
}

#overlay3 {
  display: none;
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.5); /* Semi-transparent black overlay */
  z-index: 9998; /* Set a z-index lower than the logout warning */

  /* Standard backdrop-filter for supported browsers */

  /* Vendor-prefixed backdrop-filter for Safari 9+ and Safari on iOS 9+ */
  -webkit-backdrop-filter: blur(5px);
  backdrop-filter: blur(5px);
}


    /* Styles for the warning screen */
    #logout-warning {
      display: none;
      position: fixed;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      padding: 20px;
      border: 4px solid black;
      background-color: #f7f7f7;
      z-index: 9999;
    }

    /* Customize the appearance of the cancel button */
    #cancel-button {
      background-color: #ff0000;
      color: #fff;
      border: none;
      padding: 10px 20px;
      cursor: pointer;
    }

    #canel-button:hover {
      background-color: #cc0000;
    }

    /* Styles for the countdown timer */ 
    #countdown {
      font-size: 24px;
      font-weight: bold;
    }

    #logout-warning button:hover {
      background-color: #cc0000;

    }
    .popup {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  background-color: #fff;
  padding: 20px;
  border-radius: 5px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
  max-width: 80%;
  text-align: center;
}

.popup h2 {
  margin-top: 0;
}

.popup p {
  margin-bottom: 20px;
}
  .popup button{
    background-color: red;
    color: white;
    padding: 15px 30px;
    border: none;
    border-radius: 5px;
    text-decoration: none;
    font-weight: bold;
    transition: background-color 0.3s ease, cursor 0.3s ease;
    cursor: pointer;
    display: flex;
    align-items: center;
    font-size: 18px;
    position: relative;
    margin: 0 auto;
    margin-top: 20px;
    margin-bottom: 20px;
  }


  .popup button:hover {
    background-color: darkred;
  }
    
  </style>
  <script>
    window.addEventListener('DOMContentLoaded', function() {
      setTimeout(function() {
        document.body.classList.add('fade-in');
      }, 100);

    });
    
    function fadeOutScreen(url) {
      document.body.classList.add('fade-out');
      setTimeout(function() {
        window.location.href = url;
      }, 500);
    }

    function addNotificationAnimation() {
      var notificationsButton = document.getElementById('notificationsButton');
      notificationsButton.classList.add('pulse-animation');
      
      var bellImg = document.getElementById('bellImg');
      bellImg.classList.add('shake-animation');
    }

    function removeNotificationAnimation() {
      var notificationsButton = document.getElementById('notificationsButton');
      notificationsButton.classList.remove('pulse-animation');
      
      var bellImg = document.getElementById('bellImg');
      bellImg.classList.remove('shake-animation');
    }

    function triggerNotificationAnimation() {
      addNotificationAnimation();
    }
    function stopNotificationAnimation() {
      removeNotificationAnimation();
    }

    window.addEventListener('message', function(event) {
      if (event.data === 'ding') {
        triggerNotificationAnimation();
      }
      if (event.data === 'noding') {
        removeNotificationAnimation();
      }
    });

    function openSettings() {
      var cog = document.getElementsByClassName('cog')[0];
      cog.classList.add('spin');
      setTimeout(function() {
        cog.classList.remove('spin');
      }, 50000000);

      var modal = document.getElementsByClassName("s-pop-up")[0];
      var span = document.getElementsByClassName("s-close-button")[0];
      var closeButton = document.getElementsByClassName("clButton")[0];
      var canButton = document.getElementsByClassName("caButton")[0];

      modal.style.display = "block";
      span.onclick = function() {
        modal.style.display = "none";
        cog.classList.remove('spin');
      }
      window.onclick = function(event) {
        if (event.target == modal) {
          modal.style.display = "none";
          cog.classList.remove('spin');
        }
      }
      closeButton.onclick = function() {
        modal.style.display = "none";
        cog.classList.remove('spin');
      }
      canButton.onclick = function() {
        modal.style.display = "none";
        cog.classList.remove('spin');
      }
    }

    function changeLang() {
      var flag = document.getElementsByClassName('flag')[0];
      var englishFlag = "english-flag";
      var belarussianFlag = "belarussian-flag";
      var russianFlag = "russian-flag";
      if (flag.classList.contains(englishFlag)) {
        flag.classList.remove(englishFlag);
        flag.classList.add(belarussianFlag);
      } 
      else if (flag.classList.contains(belarussianFlag)) {
        flag.classList.remove(belarussianFlag);
        flag.classList.add(russianFlag);
      }
      else if (flag.classList.contains(russianFlag)) {
        flag.classList.remove(russianFlag);
        flag.classList.add(englishFlag);
      }

      var englishFlag = document.getElementsByClassName('englishFlag')[0];
      var belarussianFlag = document.getElementsByClassName('belarussianFlag')[0];
      var russianFlag = document.getElementsByClassName('russianFlag')[0];

      if (englishFlag.classList.contains('fShown')) {
        englishFlag.classList.remove('fShown');
        englishFlag.classList.add('fHidden');
        belarussianFlag.classList.remove('fHidden');
        belarussianFlag.classList.add('fShown');
      }
      else if (belarussianFlag.classList.contains('fShown')) {
        belarussianFlag.classList.remove('fShown');
        belarussianFlag.classList.add('fHidden');
        russianFlag.classList.remove('fHidden');
        russianFlag.classList.add('fShown');
      }
      else if (russianFlag.classList.contains('fShown')) {
        russianFlag.classList.remove('fShown');
        russianFlag.classList.add('fHidden');
        englishFlag.classList.remove('fHidden');
        englishFlag.classList.add('fShown');
      }  
    }

    function flagAlert(){
      flagName="";
      
      var englishFlag = document.getElementsByClassName('englishFlag')[0];
      var belarussianFlag = document.getElementsByClassName('belarussianFlag')[0];
      var russianFlag = document.getElementsByClassName('russianFlag')[0];

      if (englishFlag.classList.contains('fShown')) {
        flagName = "English";
      }
      else if (belarussianFlag.classList.contains('fShown')) {
        flagName = "Belarussian";
      }
      else if (russianFlag.classList.contains('fShown')) {
        flagName = "Russian";
      }


      if (flagName == "English") {
        flagName = "GB";
        AjaxRequestCL(userIDValue, flagName);
        fadeOutScreen('../../en/loadingTrackers/loading_screen.html');
      }
      else if (flagName == "Belarussian") {
        flagName = "BR";
        AjaxRequestCL(userIDValue, flagName);
        fadeOutScreen('../../en/loadingTrackers/loading_screen.html');
      }
      else if (flagName == "Russian") {
        flagName = "RU";
        AjaxRequestCL(userIDValue, flagName);
        fadeOutScreen('../../en/loadingTrackers/loading_screen.html');
      }
    }



        // Function to read the value of a specific cookie
        function getCookie(name) {
            var value = "; " + document.cookie;
            var parts = value.split("; " + name + "=");
            if (parts.length === 2) return parts.pop().split(";").shift();
        }

        // Function to send postMessage
        function sendMessage(value) {
            // Check if the value is 1 and send the postMessage
            if (value === "1") {
                window.postMessage('ding','*');
            }
            if (value === "0") {
                window.postMessage('noding','*');
            }
        }

        function sendLang(value) {
            // Check if the value is 1 and send the postMessage
            if (value === "GB") {
              
            }
            else if(value === "BR"){

            }
            else{

            }
        }

        // Get the value of the "notification" cookie
        var notificationValue = getCookie("notification");
	      var userIDValue = getCookie("userID");
        if (userIDValue == undefined) {
          window.location.href = 'Login Page';
        }
        // Check the value and send the postMessage if needed
        window.addEventListener('load', function() {
            // Check the value and send the postMessage if needed
        });


  </script>
</head>
<body class="body ">
  <img src="cog.png" class="cog" onclick="openSettings()" alt="settings-cog">

  <img src="logo.png" alt="Logo" class="logo">
  <h1>MENU</h1>
  
  <div class="menu">
    <button class="button" onclick="fadeOutScreen('../loadingHolidays/loading_screen.html')">
      Rosters
    </button>
    <br>
    <button class="button" onclick="fadeOutScreen('../loadingFlights/loading_screen.html')">
      Flights
    </button>
    <br>
    <button class="button" onclick="fadeOutScreen('../hr/index.html')">
      HR Dashboard (Coming Soon)
    </button>
    <br>
    <button class="buttonn" id="notificationsButton" onclick="fadeOutScreen('../loadingNotifications/loading_screen.html')">
      Notifications (IN DEVELOPMENT)
      <img src="bell.png" alt="Bell" id="bellImg">
    </button>
  </div>
  
  <a href="#" class="logout-button" id="logout" onclick="fadeOutScreen('../../login/login.php')">LOGOUT</a>


  <div class="s-pop-up">
    <div class="s-pop-up-content">
      <div class="s-pop-up-header">
        <h2>Settings (IN DEVELOPMENT)</h2>
      </div>
      <div class="s-pop-up-body">
        <p>PREFERRED LANGUAGE: (in development)<img src="belarussian.png" alt="Belarussian Flag" class="flag belarussianFlag fHidden" onclick="changeLang()"> <img src="english.png" alt="English Flag" class="flag englishFlag fShown" onclick="changeLang()"> <img src="russian.png" alt="Russian Flag" class="flag russianFlag fHidden" onclick="changeLang()"> </p>
        <button class="button pButton" onclick="passChangeReq()">Change Password</button>
        <button class="button aButton" name="adminbut" onclick="adminPanelReq()">Admin Panel</button>
        <div class = "bButtons">
          <span class="s-close-button"><button class="cButton caButton" >CANCEL</button></span>
          <button class="apButton" onclick="flagAlert()">APPLY</button>
        </div>
        <br>
        <span class="s-close-button"></span>
      </div>
      <div class="s-pop-up-footer">
        <h3>TO CHANGE LANGUAGE CLICK APPLY</h3>
      </div>
      <span><button class="s-close-button clButton">CLOSE</button></span>  
    </div>
  </div>

  <div id="overlay2">
  <div class="popup">
    <h2>The Terms and Conditions have been updated,</h2>
    <h2>please read them carefully.</h2>
    <p>
      Before continuing, you must read and agree to the
      <a href="terms-conditions.html" target="_blank">Terms and Conditions</a>.
    </p>
    <button id="agreeButton">I Agree</button>
    <button id="disagreeButton">I Do Not Agree</button>
  </div>
</div>

<div id="overlay3">
  <div class="popup">
    <h2>Password Change Required</h2>
    <p>
      Before continuing, you must change your password.
    </p>
    <button id="changeButton">Change Password</button>
  </div>
</div>

<script type="text/javascript">

</script>



<!--End of Tawk.to Script-->

</body>
<!-- Logout Warning Screen -->
<div id="logout-warning">
  <h3>Logout Warning!</h3>
  <p>You will be logged out in <span id="countdown">60</span> seconds.</p>
  <button id="cancel-button">Cancel</button>
</div>


  <!-- Blur Overlay -->
  <div id="overlay"></div>

  <script>
    checkAndRedirect();
    makeAjaxRequestTC2();
    // Timer variables
    let warningTimer;
    let countdownValue = 60;
    const countdownElement = document.getElementById('countdown');

    // Show the logout warning after 5 minutes (300,000 ms) of page load
    setTimeout(showLogoutWarning, 300000);
    // Function to show the logout warning
    function showLogoutWarning() {
      document.getElementById('logout-warning').style.display = 'block';
      document.getElementById('overlay').style.display = 'block'; // Show the blur overlay
      countdownElement.textContent = countdownValue;

      // Start the countdown
      warningTimer = setInterval(updateCountdown, 1000);
    }

    // Function to update the countdown value and redirect if it reaches 0
    function updateCountdown() {
      countdownValue--;
      countdownElement.textContent = countdownValue;

      if (countdownValue <= 0) {
        clearInterval(warningTimer);
        window.location.href = 'login page';
      }
    }

    // Function to reset the timer when the cancel button is clicked
    document.getElementById('cancel-button').addEventListener('click', function () {
      clearInterval(warningTimer);
      countdownValue = 60;
      countdownElement.textContent = countdownValue;
      document.getElementById('logout-warning').style.display = 'none';
      document.getElementById('overlay').style.display = 'none'; // Hide the blur overlay

      // Restart the 5-minute timer
      setTimeout(showLogoutWarning, 300000);
    });

    function deleteCookie(name) {
    document.cookie = name + "=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
  }

  // Check if the 'userID' cookie is not already set
  // Set the 'userID' cookie to the value of 0 and make it expire in 365 days


  function deleteNonEssentialCookies() {
    // Check if the form has been submitted and set a flag in session storage
    if (sessionStorage.getItem('formSubmitted')) {
      sessionStorage.removeItem('formSubmitted');
    } else {
      // Delete cookies if the flag is not set
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


  // Check if the cookie banner has been dismissed before
  function checkCookieBannerDismissed() {
    return document.cookie.indexOf("cookieBannerDismissed=true") !== -1;
  }

  // Show or hide the cookie banner based on whether it has been dismissed before


  // Call deleteNonEssentialCookies() only on page load


  function passChangeReq(){
    fadeOutScreen('../menu/passChange/index.html');
  }

  function adminPanelReq(){
    fadeOutScreen('../menu/adminPanel/index.html');
  }
        
        // Your JavaScript code goes here

        function makeAjaxRequestN() {
            // Assuming you have the userIDValue set in JavaScript


            // AJAX request to send userIDValue to the PHP script in a different file
            var xhr = new XMLHttpRequest();
            var url = 'getNot.php'; // Replace with the actual PHP script file name
            var data = 'userIDValue=' + userIDValue;
            
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    // Handle the response from the PHP script
                    var notification = xhr.responseText;
                    sendMessage(notification); // Display the notification value in an alert
                }
            };
            
            xhr.open('POST', url, true);
            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            xhr.send(data);
        }

        function makeAjaxRequestL() {
            // Assuming you have the userIDValue set in JavaScript


            // AJAX request to send userIDValue to the PHP script in a different file
            var xhr = new XMLHttpRequest();
            var url = 'getLang.php'; // Replace with the actual PHP script file name
            var data = 'userIDValue=' + userIDValue;
            
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    // Handle the response from the PHP script
                    var lang = xhr.responseText;
                    sendLang(lang); // Display the notification value in an alert
                }
            };
            
            xhr.open('POST', url, true);
            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            xhr.send(data);
        }
        function AjaxRequestCL(userIDValue, flagName) {
          // Data to be sent to the server

          var dataToSend = {
            userID: userIDValue,
            flag: flagName
          };
    

          // AJAX request
          $.ajax({
            type: "POST", // You can also use GET if you prefer
            url: "getLang.php",
            data: dataToSend,
            success: function (response) {
  
            },
            error: function (xhr, status, error) {
              // This function will be executed if the request fails
              alert("Error sending data:", error);
            }
          });
        }



        // Call the function initially
        makeAjaxRequestN();
        makeAjaxRequestL();
        // Repeat the AJAX request every 5 seconds
        setInterval(makeAjaxRequestN, 5000); // 5000 milliseconds = 5 seconds
        setInterval(makeAjaxRequestL, 5000); // 5000 milliseconds = 5 seconds


    function callBoth(){
      setcookie(userID,0,365);
      fadeOutScreen('../../login/login.php');
    }

    function setCookie(name, value, days) {
    var expires = "";
    if (days) {
      var date = new Date();
      date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
      expires = "; expires=" + date.toUTCString();
    }
    document.cookie = name + "=" + (value || "") + expires + "; path=/";
  }

  function changebutton() {
  // Retrieve the value of the "admin" cookie
  var isAdmin = getCookie("admin");

  // Get the element with the name "adminbut"
  var adminButton = document.getElementsByName("adminbut")[0];

  // Check if the "admin" cookie is set to 1
  if (isAdmin == "1") {
    // If the user is an admin, show the "adminbut" button
    adminButton.style.display = "block";
  } else {
    // If the user is not an admin, hide the "adminbut" button
    adminButton.style.display = "none";
  }
}



  // Function to check the cookie value and redirect if necessary
  function checkAndRedirect() {
    // Retrieve the value of the "TC" cookie
    makeAjaxRequestAD();
    var TC = getCookie("TC");
    makeAjaxRequestTC();

    if (TC === undefined) {

    } else if (TC === "0") {
      // Get the overlay and buttons
      const overlay = document.getElementById('overlay2');
      const pOverlay = document.getElementById('overlay3');
      const agreeButton = document.getElementById('agreeButton');
      const disagreeButton = document.getElementById('disagreeButton');

      // Show the popup when the page loads
      overlay.style.display = 'block';
      pOverlay.style.display = 'none';

      agreeButton.addEventListener('click', function() {
    // User agrees, you can handle this accordingly (e.g., storing their agreement in a cookie or database)
    // For this example, I'll simply close the popup.
    overlay.style.display = 'none';
    userIDValue = getCookie("userID");
    setCookie("TC", "1", 365);
    updateUserAcceptedTerms(userIDValue);
    makeAjaxRequestTC2();
    
  });

  disagreeButton.addEventListener('click', function() {
    // User disagrees, you can handle this accordingly (e.g., redirect them to another page or show a warning message)
    // For this example, I'll simply close the popup.
    overlay.style.display = 'none';
    window.location.href = 'login page';
  });
    }
  }

  // Call the function initially to check and redirect on page load
  checkAndRedirect();

  // Now, set an interval to call the function every 2 seconds
  setInterval(checkAndRedirect, 5000); // 2000 milliseconds = 2 seconds
  setInterval(makeAjaxRequestPC, 5000); // 2000 milliseconds = 2 seconds
  // Handle button clicks

  // Assuming you have the userIDValue already defined.

  function updateUserAcceptedTerms(userID) {
    // Create a new XMLHttpRequest object
    const xhr = new XMLHttpRequest();

    // Configure the request
    const url = 'setTC.php';
    const params = 'userID=' + encodeURIComponent(userID);
    xhr.open('POST', url, true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

    // Set up a callback function to handle the server response
    xhr.onreadystatechange = function() {
      if (xhr.readyState === XMLHttpRequest.DONE) {
        if (xhr.status === 200) {
          // Request was successful, handle the response if needed
        } else {
          // Request failed, handle the error if needed
          console.error('Error updating acceptedTerms:', xhr.statusText);
        }
      }
    };

    // Send the request with the encoded parameters
    xhr.send(params);
  }


  function makeAjaxRequestTC() {
    TC = getCookie("TC");
    if (TC === 1) {
      makeAjaxRequestTC2();
    }
    else{
      userIDValue = getCookie("userID");
      var xhr = new XMLHttpRequest();
      var url = 'getTC.php';
      var data = 'userIDValue=' + userIDValue; // Send the userIDValue in the POST data

      xhr.onreadystatechange = function () {
          if (xhr.readyState === 4 && xhr.status === 200) {
              // Handle the response from the PHP script
              var TC = xhr.responseText;
              if (TC == 1) {
                overlayTC = document.getElementById('overlay2');
                overlayTC.style.display = 'none';
              }
      
              setCookie("TC", TC, 365);
              setTimeout(() => {
              makeAjaxRequestTC2();
              }, 1000);
              
          }
      };

      xhr.open('POST', url, true);
      xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
      xhr.send(data);
    }
  }

  window.onload = function() {
    makeAjaxRequestTC();
    
    
  };

  function makeAjaxRequestAD() {

      userIDValue = getCookie("userID");
      var xhr = new XMLHttpRequest();
      var url = 'getMin.php';
      var data = 'userIDValue=' + userIDValue; // Send the userIDValue in the POST data

      xhr.onreadystatechange = function () {
          if (xhr.readyState === 4 && xhr.status === 200) {
              // Handle the response from the PHP script
              var AD = xhr.responseText;
              setCookie("admin", AD, 365);
              changebutton();
              
          }
      };

      xhr.open('POST', url, true);
      xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
      xhr.send(data);
    }


  function getCookie(name) {
  var value = "; " + document.cookie;

  var parts = value.split("; " + name + "=");

  if (parts.length === 2) return parts.pop().split(";").shift();
}

function setCookie(name, value, days) {
      var expires = "";
      if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        expires = "; expires=" + date.toUTCString();
      }
      document.cookie = name + "=" + (value || "") + expires + "; path=/";
    }

  setInterval(makeAjaxRequestTC2, 5000); // 2000 milliseconds = 2 seconds
  // Function to check the cookie value and redirect if necessary
  function checkPC() {
    // Retrieve the value of the "TC" cookie
    var PC = getCookie("PC");
    makeAjaxRequestPC();

    if (PC === undefined) {

    } else if (PC === "0") {
      // Get the overlay and buttons
      const overlay = document.getElementById('overlay3');
      const changeButton = document.getElementById('changeButton');
    
    if (PC === "1"){
      pOverlay.style.display = 'none';
    }

      // Show the popup when the page loads
      overlay.style.display = 'block';

      changeButton.addEventListener('click', function() {
    // User agrees, you can handle this accordingly (e.g., storing their agreement in a cookie or database)
    // For this example, I'll simply close the popup.
    overlay.style.display = 'none';
    fadeOutScreen('../menu/passChange/index.html')
    userIDValue = getCookie("userID");
    updateUserAcceptedTerms(userIDValue);
      });
  }
}

function makeAjaxRequestTC2() {
    
    userIDValue = getCookie("userID");
    var xhr = new XMLHttpRequest();
    var url = 'getTC.php';
    var data = 'userIDValue=' + userIDValue; // Send the userIDValue in the POST data

    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            // Handle the response from the PHP script
            var TC = xhr.responseText;
            if (TC == 1) {
              checkPC();
            }
            else{
              checkAndRedirect();
            }

            
        }
    };

    xhr.open('POST', url, true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.send(data);
}


  // Now, set an interval to call the function every 2 seconds

  // Handle button clicks

  // Assuming you have the userIDValue already defined.

function updateUserPC(userID) {
    // Create a new XMLHttpRequest object
    const xhr = new XMLHttpRequest();

    // Configure the request
    const url = 'setPC.php';
    const params = 'userID=' + encodeURIComponent(userID);
    xhr.open('POST', url, true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

    // Set up a callback function to handle the server response
    xhr.onreadystatechange = function() {
      if (xhr.readyState === XMLHttpRequest.DONE) {
        if (xhr.status === 200) {
          // Request was successful, handle the response if needed
        } else {
          // Request failed, handle the error if needed
          console.error('Error updating acceptedTerms:', xhr.statusText);
        }
      }
    };

    // Send the request with the encoded parameters
    xhr.send(params);
  }


  function makeAjaxRequestPC() {
    
      userIDValue = getCookie("userID");
      var xhr = new XMLHttpRequest();
      var url = 'getPC.php';
      var data = 'userIDValue=' + userIDValue; // Send the userIDValue in the POST data

      xhr.onreadystatechange = function () {
          if (xhr.readyState === 4 && xhr.status === 200) {
              // Handle the response from the PHP script
              var PC = xhr.responseText;
              if (PC == 1) {
                pOverlay=document.getElementById('overlay3');
                pOverlay.style.display = 'none';
              }
              setCookie("PC", PC, 365);
              
          }
      };

      xhr.open('POST', url, true);
      xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
      xhr.send(data);
  }

  window.onload = function() {

    makeAjaxRequestPC();
    
    
  };

function getCookie(name) {
  var value = "; " + document.cookie;

  var parts = value.split("; " + name + "=");

  if (parts.length === 2) return parts.pop().split(";").shift();
}

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
  cookieID = getCookie("userID");
  function checkUserIDExists(){
    var newXHR = new XMLHttpRequest();
    var url = 'getID.php';
    var data = 'cookieID=' + cookieID; // Send the userIDValue in the POST data

    newXHR.onreadystatechange = function () {
        if (newXHR.readyState === 4 && newXHR.status === 200) {
            // Handle the response from the PHP script
            var exists = newXHR.responseText;
            if (exists == 1) {
              //do nothing
            }
            else{
              window.location.href = "login page";
            };

        newXHR.open('POST', url, true);
        newXHR.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        newXHR.send(data);
        }
    };
  }
  checkUserIDExists();
</script>

