<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="user.css">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css">
    <title>Document</title>
    
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        
        .container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 600px;
            height: 700px;
        }

        .container form {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 10px;
        }

        h1 {
            margin-top: 0;
            margin-bottom: 50px;
            margin-left: 100px;
        }

        label {
            font-weight: bold;
            margin-left:15px;
            margin-top: 8px;
        }

        .container input[type="text"],
        .container input[type="date"],
        .container input[type="time"],
        .container select {
            width: 300px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
            margin-left: -200px;
        }

        select {
            height: 44px; /* Adjust the height as needed */
            width: calc(100% - 22px); /* Subtract padding and border width */
        }

        .container input[type="submit"] {
            width: 330px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            padding: 10px;
            cursor: pointer;
            font-size: 16px;
            margin-top: 50px;
            margin-left: 110px;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .success-message {
            margin-top: 20px;
        }
    </style>
</head>
<body>
<div class="container">
        <h1>Book an Appointment</h1>
        <form name="registerForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
            <label for="pid">Patient ID:</label>
            <input type="text" id="pid" name="pid" required>

            <label for="doctor">Doctor ID:</label>
            <select id="doctor" name="doctor" onchange="combinefunction()">
            <?php
    // Database connection
                $host = "localhost";
                $username = "root";
                $password = "";
                $database = "Final Project"; // Change to your database name

                $con = mysqli_connect($host, $username, $password, $database);

                if (!$con) {
                    die("Connection failed: " . mysqli_connect_error());
                 }

    // Fetch and populate services
                $service = mysqli_query($con, "SELECT * FROM doctor");
                while ($s = mysqli_fetch_array($service)) {
                ?>
                <option value="<?php echo $s['id'] ?>"><?php echo $s['name'] ?></option>
                <?php
            }

    // Close the database connection
            mysqli_close($con);
            ?>
            </select>

            <label for="avd">Available Date:</label>
            <input type="text" id="avd" name="avd" required>

            <label for="avt">Available Time:</label>
            <input type="text" id="avt" name="avt" required>

            <label for="service">Service:</label>
            <select id="service" name="service" onchange="getFee()">
            <?php
    // Database connection
                $host = "localhost";
                $username = "root";
                $password = "";
                $database = "Final Project"; // Change to your database name

                $con = mysqli_connect($host, $username, $password, $database);

                if (!$con) {
                    die("Connection failed: " . mysqli_connect_error());
                 }

    // Fetch and populate services
                $service = mysqli_query($con, "SELECT * FROM service");
                while ($s = mysqli_fetch_array($service)) {
                ?>
                <option value="<?php echo $s['id'] ?>"><?php echo $s['name'] ?></option>
                <?php
            }

    // Close the database connection
            mysqli_close($con);
            ?>
            </select>   
            

            <label for="date">Date:</label>
            <input type="date" id="date" name="date" required>

            <label for="time">Time:</label>
            <input type="time" id="time" name="time" required>

            <label for="fee">Service Fee:</label>
            <input type="text" id="fee" name="fee" required>

            <input type="submit" name="submit" value="Book Appointment">
        </form>

        <?php
        if (isset($_POST['submit'])) {
        $host = "localhost";
        $user = "root";
        $passwd = "";
        $database = "Final Project";
        $table_name = "Appointment";

        $connect = mysqli_connect($host, $user, $passwd, $database) or die("could not connect to database");

        
        $pid = $_POST["pid"];
        $doctor = $_POST["doctor"];
        $service = $_POST["service"];
        $date = $_POST["date"];
        $time = $_POST["time"];
        $fee = $_POST["fee"];

        $sql = "INSERT INTO $table_name(userid, doctorid, serviceid, date, time, fee)
                VALUES('$pid', '$doctor', '$service', '$date', '$time', '$fee')";

        if (!mysqli_query($connect, $sql)) {
            die('Error: ' . mysqli_error($connect));
        } else {
            echo "<div class='success-message'><center>Appointment Complete!</center></div>";
        }
        mysqli_close($connect);
    }
    ?>
    </div>

    <nav class="sidebar close">
        <header>
            <div class="image-text">
                <span class="image">
                    <img src="shortlogo.png" alt="logo">
                </span>

                <div class="text header-text">
                    <span class="name">Pure Dent</span>
                    <span class="pro">Dental Clinic</span>
                </div>
            </div>

            <i class="bx bx-chevron-right toggle"></i>
        </header>

        <div class="menu-bar">
            <div class="menu">
                
                <ul class="menu-links">
                    <li class="nav-link">
                        <a href="user.html">
                            <i class="bx bx-home-alt icon"></i>
                            <span class="text nav-text">Dashboard</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="PID.php">
                            <i class="bx bx-file-find icon"></i>
                            <span class="text nav-text">Search Patient ID</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="#">
                            <i class="bx bx-notepad icon"></i>
                            <span class="text nav-text">Make Appointment</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="Usview.php">
                            <i class="bx bx-list-ul icon"></i>
                            <span class="text nav-text">Services</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="Udview.php">
                            <i class="bx bx-user-circle icon"></i>
                            <span class="text nav-text">Doctors</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="review.php">
                            <i class="bx bxs-message-add icon"></i>
                            <span class="text nav-text">Write Review</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="Cappoint.php">
                            <i class="bx bxs-calendar-x icon"></i>
                            <span class="text nav-text">Cancel Appointment</span>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="bottom-content">
                <li class="">
                    <a href="Alogout.php">
                        <i class="bx bx-log-out icon"></i>
                        <span class="text nav-text">Logout</span>
                    </a>
                </li>

                <li class="mode">
                    <div class="moon-sun">
                        <i class="bx bx-moon icon moon"></i>
                        <i class="bx bx-sun icon sun"></i>
                    </div>
                    <span class="mode-text text">Dark Mode</span>

                    <div class="toggle-switch">
                        <span class="switch"></span>
                    </div>
                </li>
            </div>
        </div>
    </nav>

    <script>

    function combinefunction(){
        getav();
        getavt();
    }

    function getavt() {
    var serviceId = document.getElementById("doctor").value;
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                document.getElementById("avt").value = xhr.responseText;
            }
        }
    };
    xhr.open("GET", "getavt.php?serviceId=" + serviceId, true);
    xhr.send();
}

function getav() {
    var serviceId = document.getElementById("doctor").value;
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                document.getElementById("avd").value = xhr.responseText;
            }
        }
    };
    xhr.open("GET", "getav.php?serviceId=" + serviceId, true);
    xhr.send();
}
    function getFee() {
    var serviceId = document.getElementById("service").value;
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                document.getElementById("fee").value = xhr.responseText;
            }
        }
    };
    xhr.open("GET", "getFee.php?serviceId=" + serviceId, true);
    xhr.send();
}

const body = document.querySelector("body"),
        sidebar = body.querySelector(".sidebar"),
        toggle = body.querySelector(".toggle"),
        
        modeSwitch = body.querySelector(".toggle-switch"),
        modeText = body.querySelector(".mode-text");

        toggle.addEventListener("click", ()=>{
            sidebar.classList.toggle("close");
        });


        modeSwitch.addEventListener("click", ()=>{
            body.classList.toggle("dark");

            if(body.classList.contains("dark")){
                modeText.innerText = "Light Mode"
            }else{
                modeText.innerText = "Dark Mode"
            }
        });
    </script>
</body>
</html>