<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin.css">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css">
    <title>Document</title>

    <style>
.entries {
    max-width: 800px;
    margin: 0 auto;
    padding: 20px;
    background-image:url('ba1.avif');
    border-radius: 8px;
    margin-top: 100px;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
}

.doctor-table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

.doctor-table th, .doctor-table td {
    padding: 12px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

.doctor-table th {
    background-color: #f2f2f2;
}

.doctor-table tr:hover {
    background-color: #f5f5f5;
}

.doctor-table th:first-child,
.doctor-table td:first-child {
    border-top-left-radius: 8px;
    border-bottom-left-radius: 8px;
}

.doctor-table th:last-child,
.doctor-table td:last-child {
    border-top-right-radius: 8px;
    border-bottom-right-radius: 8px;
}

    </style>
</head>
<body>
<div class="entries">
        <?php
        $host = "localhost";
        $user = "root";
        $passwd = "";
        $database = "Final Project";
        $table_name = "Doctor";
        $connect = mysqli_connect($host, $user, $passwd, $database) 
            or die("Could not connect to the database");

        $query = "SELECT * FROM $table_name";
        mysqli_select_db($connect, $database);
        $result = mysqli_query($connect, $query);

        echo "<h1 align='center'>Doctors</h1>";

        if ($result) {
            echo "<table class='doctor-table'>";
            echo "<tr><th>Doctor ID</th><th>Name</th><th>Expertise</th><th>Available Date</th><th>Available Hour</th></tr>";
            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                $id = $row['id'];
                $name = $row['name'];
                $exp = $row['expertise'];
                $ava = $row['available_date'];
                $avh = $row['available_hour'];

                echo "<tr>";
                echo "<td>".$id."</td>";
                echo "<td>".$name."</td>";
                echo "<td>".$exp."</td>";
                echo "<td>".$ava."</td>";
                echo "<td>".$avh."</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            die("Query=$query failed!");
        }
        mysqli_close($connect);
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
