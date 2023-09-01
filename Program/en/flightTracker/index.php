<!DOCTYPE html>
<html>
<head>
  <title>Employee Flights</title>
  <link rel="icon" href="logo.ico" type="image/x-icon">
  <style>
    body {
opacity: 0;
      transition: opacity 0.5s ease;
      background-color: lightgray;
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 20px;
      transition: background-color 0.5s ease; /* Transition effect */
    }
    .fade-in {
      opacity: 0;
      animation: fade-in-animation 1s forwards;
    }

    @keyframes fade-in-animation {
      from { opacity: 0; }
      to { opacity: 1; }
    }

    h1 {
      color: red;
      text-align: center;
    }

    table {
      border-collapse: collapse;
      margin-top: 20px;
      width: 100%;
    }

    th, td {
      border: 1px solid black;
      padding: 8px;
    }

    th {
      background-color: red;
      color: white;
      font-weight: bold;
      text-align: center;
    }

    td {
      background-color: white;
      text-align: center;
    }

    .logo {
      display: block;
      margin: 0 auto;
      max-width: 400px;
    }

    .menu-button {
      position: fixed;
      top: 20px;
      left: 20px;
      background-color: transparent;
      border: none;
      cursor: pointer;
      z-index: 9999;
    }

    .menu-button-lines {
      width: 30px;
      height: 25px;
      position: relative;
    }

    .menu-button-lines div {
      position: absolute;
      background-color: red;
      width: 100%;
      height: 4px;
      transition: all 0.3s ease;
    }

    .line-1 {
      top: 0;
    }

    .line-2 {
      top: 50%;
      transform: translateY(-50%);
    }

    .line-3 {
      bottom: 0;
    }


    .overlay {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(255, 255, 255, 0.8);
      display: none;
      justify-content: center;
      align-items: center;
      z-index: 9998;
      opacity: 0; /* Initially set the opacity to 0 */
      transition: fadeInOverlay 0.5s ease; /* Add transition for opacity property */
      animation.duration:0.5s;
      
    }

    .overlay.active {
      display: flex;
      animation: fadeInOverlay 0.5s ease forwards; 
    }

    .overlay.hidden {
      animation: fadeInOverlay 0.5s ease backwards;
    }



.fade-out {
  animation-name: fadeOut;
}

@keyframes fadeOut {
  from { opacity: 1; }
  to { opacity: 0; }
}
.fade-out-overlay {
  animation: fadeOut 0.5s ease forwards;
}

.hidden {
  display: none;
}


    @keyframes fadeInOverlay {
      from {
        opacity: 0;
      }
      to {
        opacity: 1;
      }
    }


    .overlay-content {
      text-align: center;
    }

    .overlay button {
      padding: 10px 20px;
      font-size: 18px;
      background-color: red;
      color: white;
      border: none;
      cursor: pointer;
    }

.menu-button.active .line-1 {
  transform: translateY(200%) rotate(45deg);
}

.menu-button.active .line-2 {
  opacity: 0;
}

.menu-button.active .line-3 {
  transform: translateY(-300%) rotate(-45deg);
}

    .fade-out {
      opacity: 0;
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
      backdrop-filter: blur(5px); /* Apply the blur effect */
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
  </style>
  <script>
    function showOverlay() {
      var overlay = document.getElementById("overlay");
      overlay.classList.add("active");
    }

function hideOverlay() {
  var overlay = document.getElementById("overlay");
  overlay.addEventListener("animationend", function() {
    overlay.style.display = "none";
  });
    overlay.classList.add("fade-out");
  setTimeout(function() {
    overlay.style.display = "none";
  }, 500); // adjust the delay to match the animation duration
}





    function toggleOverlay() {
      var overlay = document.getElementById("overlay");
      var menuButton = document.querySelector(".menu-button");
      overlay.classList.toggle("active");
      menuButton.classList.toggle("active");
    }

    window.addEventListener("load", function() {
      document.body.classList.add("fade-in");
    });

    function fadeOutScreen(url) {
      document.body.classList.add('fade-out');
      setTimeout(function() {
        window.location.href = url;
      }, 500); // Delay the redirection by 500 milliseconds (0.5 seconds)
      document.body.style.backgroundColor = "#fff"; /* Set background color to white (#fff) */
    }

  </script>
</head>
<body>

    <!-- Logout Warning Screen -->
 <div id="logout-warning">
  <h3>Logout Warning!</h3>
  <p>You will be logged out in <span id="countdown">60</span> seconds.</p>
  <button id="cancel-button">Cancel</button>
</div>

  <!-- Logout Warning Screen -->
  <div id="logout-warning">
    <h3>Logout Warning!</h3>
    <p>You will be logged out in <span id="countdown">60</span> seconds.</p>
    <button id="cancel-button">Cancel</button>
  </div>

  <!-- Blur Overlay -->
  <div id="overlay2"></div>

  <script>
    // Timer variables
    let warningTimer;
    let countdownValue = 60;
    const countdownElement = document.getElementById('countdown');

    // Show the logout warning after 5 minutes (300,000 ms) of page load
    setTimeout(showLogoutWarning, 300000);

    // Function to show the logout warning
    function showLogoutWarning() {
      document.getElementById('logout-warning').style.display = 'block';
      document.getElementById('overlay2').style.display = 'block'; // Show the blur overlay
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
      document.getElementById('overlay2').style.display = 'none'; // Hide the blur overlay

      // Restart the 5-minute timer
      setTimeout(showLogoutWarning, 300000);
    });
  </script>


  <img class="logo" src="logo.png" alt="Logo">
  <h1>Employee Flights Summary</h1>
  <button class="menu-button" onclick="toggleOverlay()">
    <div class="menu-button-lines">
      <div class="line-1"></div>
      <div class="line-2"></div>
      <div class="line-3"></div>
    </div>
  </button>
  <div id="overlay" class="overlay">
    <div class="overlay-content">
      <button onclick="fadeOutScreen('../flightTracker/sIndex.html')">SEARCH</button>
      <br>
      <br>
      <br>
      <button onclick="fadeOutScreen('../flightTracker/inputs.html')">INPUT PAGE</button>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <button onclick="fadeOutScreen('../loadingTrackers/loading_screen.html')">HOME</button>
    </div>
  </div>

  <table id="employee-table">
    <thead>
      <tr>
        <th style="display: none;">ID</th>
        <th>First Name</th>
        <th>Surname</th>
        <th>Start Date</th>
        <th style="display: none;">Weeks</th>
        <th style="display: none;">Accrued</th>
        <th>Entitlement</th>
        <th style="display: none;">Days Out</th>
        <th style="display: none;">Days Back</th>
        <th>Flights Booked in 2022</th>
        <th>Flights Booked in 2023</th>
        <th>Total Return Flights Booked</th>
        <th>Total Flights Left to Book</th>
        <th style="display: none;">Dates There</th>
        <th style="display: none;">Return Date</th>
      </tr>
    </thead>
    <tbody>
      <tr name="data1">
        <td name="dataID" style="display: none;">1</td>
        <td name="dataFName">Siarhei</td>
        <td name="dataSName">Almatau</td>
        <td name="dataCountry"></td>
        <td name="dataSDate">07/11/2022</td>
        <td name ="dataW" style="display: none;"></td>
        <td name ="dataA" style="display: none;"></td>
        <td name ="dataE"></td>
        <td name ="dataODays" style="display: none;"></td>
        <td name = "dataBDays" style="display: none;"></td>
        <td name ="22Bo"></td>
        <td name="23Bo"></td>
        <td name="dataTR"></td>
        <td name="dataTL"></td>
        <td name="dataFO" style="display: none;">11/12/2022 26/01/2023 07/03/2023 23/04/2023 10/06/2023</td>
        <td name="dataFB" style="display: none;">26/12/2022 06/02/2023 20/03/2023 06/05/2023 23/06/2023</td>
      </tr>
    </tbody>
  </table>

  <script>
function calculateWeeks(startDate) {
  var parts = startDate.split('/');
  var formattedDate;

  // Handling the case when the day is 1st of the month
  if (parts[0] === '01') {
    var prevMonth = parts[1] - 1;
    var prevYear = parts[2];
    if (prevMonth === 0) {
      prevMonth = 12;
      prevYear--;
    }
    formattedDate = prevMonth.toString().padStart(2, '0') + '/' + parts[0] + '/' + prevYear;
  } else {
    formattedDate = parts[1] + '/' + (parts[0] - 1) + '/' + parts[2]; // Subtract 1 from month value
  }

  var start = new Date(formattedDate);
  var end = new Date(start.getFullYear() + 1, 0, 1);
  var days = Math.ceil((end - start) / (1000 * 60 * 60 * 24));
  var weeks = Math.floor(days / 7);
  return weeks;
}


    function calculateAccrued(weeks) {
      var accrued = Math.ceil((8/52) * weeks);
      return accrued;
    }

    function calculateEntitlement(startDate, accrued) {
      var parts = startDate.split('/');
      var year = parts[2];
      if (year === '2022') {
        return accrued + 8;
      }
      return accrued;
    }

    function calculateDaysOut(datesThere) {
      var dates = datesThere.split(" ");
      var uniqueDates = [...new Set(dates)]; // Remove duplicate dates
      var daysOut = uniqueDates.length;
      return daysOut;
    }
    
    function calculateDaysBack(returnDate) {
      var dates = returnDate.split(" ");
      var uniqueDates = [...new Set(dates)]; // Remove duplicate dates
      var daysBack = uniqueDates.length;
      return daysBack;
    }
    
    function calculateFlightsBooked2022(datesThere) {
      if (datesThere.trim() === '') {
        return 0;
      }
      var dates = datesThere.split(" ");
      var uniqueDates = [...new Set(dates)]; // Remove duplicate dates
      var flightsBooked2022 = 0;
      for (var i = 0; i < uniqueDates.length; i++) {
        var parts = uniqueDates[i].split('/');
        var year = parts[2];
        if (year === '2022') {
          flightsBooked2022++;
        }
      }
      return flightsBooked2022;
    }
    
function calculateFlightsBooked2023(datesThere) {
  if (datesThere.trim() === '') {
    return 0;
  }

  var dates = datesThere.trim().split(' ');
  var flightsBooked2023 = 0;

  for (var i = 0; i < dates.length; i++) {
    var dateParts = dates[i].trim().split('/');
    var day = parseInt(dateParts[0]);
    var month = parseInt(dateParts[1]);
    var year = parseInt(dateParts[2]);
    var date = new Date(year, month - 1, day); // Month is zero-based in JavaScript Date object

    if (date.getFullYear() === 2023) {
      flightsBooked2023++;
    }
  }


  return flightsBooked2023;
}

// Rest of the code remains the same






    function calculateTotalReturnFlights(flightsBooked2022, flightsBooked2023) {
      return flightsBooked2022 + flightsBooked2023;
    }

    function calculateTotalFlightsLeft(entitlement, totalReturnFlights) {
      return entitlement - totalReturnFlights;
    }

    function updateRowData(row) {
      var startDate = row.cells[3].innerHTML;
      var weeks = calculateWeeks(startDate);
      var accrued = calculateAccrued(weeks);
      var entitlement = calculateEntitlement(startDate, accrued);
      var datesThere = row.cells[13].innerHTML;
      var daysOut = calculateDaysOut(datesThere);
      var returnDate = row.cells[14].innerHTML;
      var daysBack = calculateDaysBack(returnDate);
      var flightsBooked2022 = calculateFlightsBooked2022(datesThere);
      var flightsBooked2023 = calculateFlightsBooked2023(datesThere);
      var totalReturnFlights = calculateTotalReturnFlights(flightsBooked2022, flightsBooked2023);
      var totalFlightsLeft = calculateTotalFlightsLeft(entitlement, totalReturnFlights);

      row.cells[4].innerHTML = weeks;
      row.cells[5].innerHTML = accrued;
      row.cells[6].innerHTML = entitlement;
      row.cells[7].innerHTML = daysOut;
      row.cells[8].innerHTML = daysBack;
      row.cells[9].innerHTML = flightsBooked2022;
      row.cells[10].innerHTML = flightsBooked2023;
      row.cells[11].innerHTML = totalReturnFlights;
      row.cells[12].innerHTML = totalFlightsLeft;



 var totalFlightsLeft = calculateTotalFlightsLeft(entitlement, totalReturnFlights);

  row.cells[4].innerHTML = weeks;
  row.cells[5].innerHTML = accrued;
  row.cells[6].innerHTML = entitlement;
  row.cells[7].innerHTML = daysOut;
  row.cells[8].innerHTML = daysBack;
  row.cells[9].innerHTML = flightsBooked2022;
  row.cells[10].innerHTML = flightsBooked2023;
  row.cells[11].innerHTML = totalReturnFlights;

  // Set the value and background color of the "Flights Left to Book" cell
  var flightsLeftCell = row.cells[12];
  flightsLeftCell.innerHTML = totalFlightsLeft;

  if (totalFlightsLeft > 0) {
    flightsLeftCell.style.backgroundColor = 'rgb(144, 238, 144)'; // Light green
  } else if (totalFlightsLeft < 0) {
    flightsLeftCell.style.backgroundColor = 'rgb(255, 40, 71)'; // Orange
  } else {
    flightsLeftCell.style.backgroundColor = 'rgb(249, 179, 17)'; // Light red
  }
}

    function updateTableData() {
      var table = document.getElementById("employee-table");
      var rows = table.getElementsByTagName("tr");

      for (var i = 1; i < rows.length; i++) {
        updateRowData(rows[i]);
      }
    }

    updateTableData();
  </script>

  <!--Start of Tawk.to Script-->
  <script type="text/javascript">
</script>
<!--End of Tawk.to Script-->
</body>
</html>


<script>
function fetchFlightsData() {
    // Make an AJAX request to getFlights.php
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            // Parse the JSON response received from the server
            var flightsData = JSON.parse(this.responseText);
            // Call a function to update the table with the received data
            updateTableWithData(flightsData);
        }
    };
    xhttp.open("GET", "getFlights.php", true);
    xhttp.send();
}

function updateTableWithData(flightsData) {
  var table = document.getElementById("employee-table");
  var tbody = table.getElementsByTagName("tbody")[0];
  tbody.innerHTML = "";

  flightsData.forEach(function(flight) {
    var newRow = tbody.insertRow();

    newRow.innerHTML = `
      <td name="dataID" style="display: none;">${flight.ID}</td>
      <td>${flight.dataFName}</td>
      <td>${flight.dataSName}</td>
      <td>${flight.dataSDate}</td>
      <td style="display: none;">${calculateWeeks(flight.dataSDate)}</td>
      <td style="display: none;">${calculateAccrued(calculateWeeks(flight.dataSDate))}</td>
      <td>${calculateEntitlement(flight.dataSDate, calculateAccrued(calculateWeeks(flight.dataSDate)))}</td>
      <td style="display: none;">${calculateDaysOut(flight.dataFO)}</td>
      <td style="display: none;">${calculateDaysBack(flight.dataFB)}</td>
      <td>${calculateFlightsBooked2022(flight.dataFO)}</td>
      <td>${calculateFlightsBooked2023(flight.dataFO)}</td>
      <td>${calculateTotalReturnFlights(calculateFlightsBooked2022(flight.dataFO), calculateFlightsBooked2023(flight.dataFO))}</td>
      <td>${calculateTotalFlightsLeft(calculateEntitlement(flight.dataSDate, calculateAccrued(calculateWeeks(flight.dataSDate))), calculateTotalReturnFlights(calculateFlightsBooked2022(flight.dataFO), calculateFlightsBooked2023(flight.dataFO)))}</td>
      <td style="display: none;">${flight.dataFO}</td>
      <td style="display: none;">${flight.dataFB}</td>
    `;

    // Color the "Total Flights Left to Book" cell based on its value
    var totalFlightsLeftCell = newRow.cells[12];
    var totalFlightsLeftValue = parseInt(totalFlightsLeftCell.textContent);
    
    if (totalFlightsLeftValue > 0) {
      totalFlightsLeftCell.style.backgroundColor = 'rgb(144, 238, 144)'; // Light green
    } else if (totalFlightsLeftValue < 0) {
      totalFlightsLeftCell.style.backgroundColor = 'rgb(255, 40, 71)'; // Orange
    } else {
      totalFlightsLeftCell.style.backgroundColor = 'rgb(249, 179, 17)'; // Light red
    }
  });
}



window.addEventListener("load", function() {
    document.body.classList.add("fade-in");
    // Fetch flights data when the page loads
    fetchFlightsData();
});
var userIDValue = getCookie("userID");
        if (userIDValue == undefined) {
          window.location.href = 'login page';
        }

        function getCookie(name) {
            var value = "; " + document.cookie;
            var parts = value.split("; " + name + "=");
            if (parts.length === 2) return parts.pop().split(";").shift();
        }

</script>