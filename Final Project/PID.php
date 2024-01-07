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
        background-color: aliceblue;
    }
    h1 {
        text-align: center;
        margin-top: 100px;
        margin-bottom: 50px;
    }
    .appointment-table {
        width: 50%;
        margin: 0 auto;
        border-collapse: collapse;
        margin-top: 50px;
    }
    .appointment-table th, .appointment-table td {
        padding: 10px;
        text-align: center;
        border-bottom: 1px solid #ddd;
        background: honeydew;
    }
    .appointment-table th {
        background-color: #f2f2f2;
    }
    .search-form {
            text-align: center;
            margin-bottom: 20px;
        }

        .search-input {
            padding: 5px;
            width: 300px;
        }

        .search-button {
            padding: 5px 10px;
            background-color: aquamarine;
            color: #fff;
            border-radius: 100px;
            border: none;
            cursor: pointer;
            transition: .3s;
        }

        .search-button:hover {
            box-shadow: 1px 5px 7px 1px rgba(0,0,0,0.2);
        }

        .error-message {
            text-align: center;
            color: red; 
            margin-top: 20px; 
            font-weight: bold;
        }
    </style>
</head>
<body>
<div class="entries">
        <h1 class="page-header text-center">Search Patient ID</h1>
        
        <div class="search-form">
            <form method="GET" action="">
                <input type="text" name="search" class="search-input" placeholder="Search by your email...">
                <input type="submit" value="Search" class="search-button">
            </form>
        </div>

        <?php
            $host = "localhost";
            $user = "root";
            $passwd = "";
            $database = "Final Project";                        
            $conn = mysqli_connect($host,$user,$passwd,$database) 
            or die("could not connect to database");

            $search = isset($_GET['search']) ? $_GET['search'] : '';

            if (!empty($search)) {
                $sql = "SELECT * FROM user WHERE Email LIKE '%$search%' ORDER BY userid DESC";
                $query = $conn->query($sql);
                if ($query->num_rows > 0) {
                    echo "<table class='appointment-table'>";
                    echo "<tr><th>Patient ID</th><th>Patient Name</th></tr>";
                    while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
                        $pid = $row['Userid'];
                        $name = $row['Username'];
            
                        echo "<tr>";
                        echo "<td>".$pid."</td>";
                        echo "<td>".$name."</td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                } else {
                    echo "<p class='error-message'>No result found!</p>";
                }
            }
            mysqli_close($conn);
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
                        <a href="#">
                            <i class="bx bx-file-find icon"></i>
                            <span class="text nav-text">Search Patient ID</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="Mappoint.php">
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