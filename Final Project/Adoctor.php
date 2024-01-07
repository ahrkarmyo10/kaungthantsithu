<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="admin.css">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css">
    <title>Document</title>
    <style>

        body {
            font-family: Arial, sans-serif;
            background-image: url('ba1.avif'); /* Change the file name to your image */
            background-size: cover;
            background-repeat: no-repeat;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            width: 400px;
            height: 550px;
            padding: 20px;
            border-radius: 10px;
            background-color: rgba(0, 0, 0, 0.3);
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        .container h1 {
            text-align: center;
            margin-bottom: 20px;
            color:white;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
            color: white;
        }

        .form-group input {
            width: 90%;
            height: 35px;
            padding: 5px 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            outline: none;
            margin-left: 10px;
            border-color: black;
        }

        .btn {
            text-align: center;
        }

        .btn input {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            background-color: aquamarine;
            color: white;
            cursor: pointer;
            transition: background-color 0.3s ease-in-out;
        }

        .btn input:hover {
            background-color: #0088b5;
        }

        .success-message {
            color: white;
            margin-top: 20px;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Add Doctors</h1>

    <form name="registerForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="dname" id="dname" required>
        </div>
        <div class="form-group">
            <label for="expertise">Expertise:</label>
            <input type="text" name="exp" id="exp" required>
        </div>
        <div class="form-group">
            <label for="available date">Available Date:</label>
            <input type="text" name="ava" id="ava" required>
        </div>
        <div class="form-group">
            <label for="available hour">Available Hour:</label>
            <input type="text" name="avh" id="avh" required>
        </div>
        <div class="btn">
            <input type="submit" name="submit" value="Add">
            <input type="reset" value="Reset">
        </div>
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $host = "localhost";
        $user = "root";
        $passwd = "";
        $database = "Final Project";
        $table_name = "Doctor";

        $connect = mysqli_connect($host, $user, $passwd, $database) or die("could not connect to database");

        $name = $_POST["dname"];
        $expertise = $_POST["exp"];
        $ava = $_POST["ava"];
        $avh = $_POST["avh"];

        $sql = "INSERT INTO $table_name(name, expertise, available_date, available_hour)
                VALUES('$name', '$expertise', '$ava', '$avh')";

        if (!mysqli_query($connect, $sql)) {
            die('Error: ' . mysqli_error($connect));
        } else {
            echo "<div class='success-message'><center>Successfully added!</center></div>";
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
                    <span class="name">Dente-Care</span>
                    <span class="pro">Dental Clinic</span>
                </div>
            </div>

            <i class="bx bx-chevron-right toggle"></i>
        </header>

        <div class="menu-bar">
            <div class="menu">
                
                <ul class="menu-links">
                    <li class="nav-link">
                        <a href="admin.html">
                            <i class="bx bx-home-alt icon"></i>
                            <span class="text nav-text">Dashboard</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="CheckA.php">
                            <i class="bx bx-calendar-check icon"></i>
                            <span class="text nav-text">Check Appointment</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="#">
                            <i class="bx bx-list-ul icon"></i>
                            <span class="text nav-text">Services</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="SView.php">View Services</a></li>
                            <li><a href="Aservice.php">Add Service</a></li>
                            <li><a href="Dservice.php">Remove Service</a></li>
                            <li><a href="Eservice.php">Edit Service</a></li>
                        </ul>
                    </li>

                    <li class="nav-link">
                        <a href="#">
                            <i class="bx bx-user-circle icon"></i>
                            <span class="text nav-text">Doctors</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="Vdoctor.php">View Doctors</a></li>
                            <li><a href="Adoctor.php">Add Doctor</a></li>
                            <li><a href="Ddoctor.php">Remove Doctor</a></li>
                            <li><a href="Edoctor.php">Edit Doctor</a></li>
                        </ul>
                    </li>

                    <li class="nav-link">
                        <a href="Vreview.php">
                            <i class="bx bx-chat icon"></i>
                            <span class="text nav-text">Read Review</span>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="bottom-content">
                <li class="">
                    <a href="Logout.php">
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

        document.addEventListener("DOMContentLoaded", function () {
        const navLinks = document.querySelectorAll(".nav-link");

        navLinks.forEach(function (navLink) {
            const dropdownMenu = navLink.querySelector(".dropdown-menu");
            
            navLink.addEventListener("mouseenter", function () {
                if (dropdownMenu) {
                    dropdownMenu.style.display = "block";
                }
            });

            navLink.addEventListener("mouseleave", function () {
                if (dropdownMenu) {
                    dropdownMenu.style.display = "none";
                }
            });
        });
    });
    </script>
</body>
</html>