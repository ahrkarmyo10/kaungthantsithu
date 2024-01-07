<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin.css">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css">
    <title>Document</title>

    <style>
    body {
        font-family: Arial, sans-serif;
        background-image:url('ba1.avif');
    }
    .entries {
        width: 30%;
        height: 450px;
        margin: 0 auto;
        margin-top: 100px;
        background-color: #fff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    }
    h1 {
        text-align: center;
        margin-bottom: 30px;
    }
    table {
        width: 100%;
    }

    .entries input[type="text"] {
        width: 80%;
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }
    input[type="submit"], input[type="reset"] {
        padding: 10px 20px;
        background-color: #3498db;
        color: #fff;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        margin-right: 10px;
        margin-top: 20px;
    }
    input[type="reset"] {
        background-color: #e74c3c;
    }
    input[type="submit"]:hover, input[type="reset"]:hover {
        background-color: #333;
    }

    .success-message {
        margin-top: 20px;
    }

    .error-message{
        margin-left: 40px;
        margin-top: 20px;
    }
</style>
</head>
<body>
<div class="entries">
        <h1 align="center">Edit Services</h1>
        <form name="editForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post"
            enctype='multipart/form-data'>
            <table border=0 cellpadding=5 align="center">
                <tr>
                    <td>Service ID :</td>
                    <td><input type="text" name="service_id" size="30"></td>
                </tr>
                <tr>
                    <td>New Name :</td>
                    <td><input type="text" name="new_name" size="30"></td>
                </tr>
                <tr>
                    <td>New Duration :</td>
                    <td><input type="text" name="new_dura" size="30"></td>
                </tr>
                <tr>
                    <td>New Fee :</td>
                    <td><input type="text" name="new_fee" size="30"></td>
                </tr>
                <tr>
                    <td>New Appointment :</td>
                    <td><input type="text" name="new_app" size="30"></td>
                </tr>
                <tr>
                    <td colspan=2 style="text-align:center">
                        <input type="submit" name="submit" value="Update">
                        <input type="reset" value="Reset">
                    </td>
                </tr>
            </table>
        </form>
        <?php
    if (isset($_POST['submit'])) {
        $host = "localhost";
        $user = "root";
        $passwd = "";
        $database = "Final Project";
        $table_name = "Service";

        $connect = mysqli_connect($host, $user, $passwd, $database) or die("could not connect to database");

        $service_id = $_POST['service_id'];
        $new_name = $_POST['new_name'];
        $new_dura = $_POST['new_dura'];
        $new_fee = $_POST['new_fee'];
        $new_app = $_POST["new_app"];

        if (empty($service_id) || empty($new_name) || empty($new_dura) || empty($new_fee) || empty($new_app)) {
            echo '<div class="error-message"><h3><b>You didn\'t fill up the form correctly!</b></h3></div>';
        } else {
            $update_query = "UPDATE service SET name = '$new_name', duration = '$new_dura', cost = '$new_fee', appointment = '$new_app'";
            $update_query .= " WHERE id = $service_id";

            if (!mysqli_query($connect, $update_query)) {
                die('Error: ' . mysqli_error($connect));
            } else {
                echo "<div class='success-message'><center>Successfully Updated!</center></div>";
            }

            mysqli_close($connect);
        }
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
