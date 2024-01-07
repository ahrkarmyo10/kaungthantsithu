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
        width: 80%;
        margin: 0 auto;
        border-collapse: collapse;
        margin-top: 50px;
    }
    .appointment-table th, .appointment-table td {
        padding: 10px;
        text-align: left;
        border-bottom: 1px solid #ddd;
        background: honeydew;
    }
    .appointment-table th {
        background-color: #f2f2f2;
    }
    .delete-link {
        color: #e74c3c;
        text-decoration: none;
    }
    .delete-link:hover {
        text-decoration: underline;
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

        .success-message {
            text-align: center;
            color: black; 
            margin-top: 20px; 
            font-weight: bold; 
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
        <h1 class="page-header text-center">Cancel Appointment</h1>
        
        <div class="search-form">
            <form method="GET" action="">
                <input type="text" name="search" class="search-input" placeholder="Search by Patient ID" required>
                <input type="submit" value="Search" class="search-button">
            </form>

            <?php
$host = "localhost";
$user = "root";
$passwd = "";
$database = "Final Project";                        
$conn = mysqli_connect($host, $user, $passwd, $database) 
    or die("could not connect to database");

$search = isset($_GET['search']) ? $_GET['search'] : '';

if (!empty($search)) {
    $sql = "SELECT * FROM appointment WHERE userid LIKE '%$search%' ORDER BY userid DESC";
    $query = $conn->query($sql);
    if ($query->num_rows > 0) {
        echo "<table class='appointment-table'>";
        echo "<tr><th>Appointment ID</th><th>Patient ID</th><th>Doctor ID</th><th>Service ID</th><th>Date</th><th>Time</th><th>Service Fee</th><th>Action</th></tr>";
        while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
            $id = $row['id'];
            $pid = $row['userid'];
            $did = $row['doctorid'];
            $sid = $row['serviceid'];
            $date = $row['date'];
            $time = $row['time'];
            $fee = $row['fee'];

            echo "<tr>";
            echo "<td>".$id." </td>";
            echo "<td>".$pid."</td>";
            echo "<td>".$did."</td>";
            echo "<td>".$sid."</td>";
            echo "<td>".$date."</td>";
            echo "<td>".$time."</td>";
            echo "<td>".$fee."</td>";

            echo "<td><a class='delete-link' href='Cappoint.php?delete_id=".$id."' onclick='return confirm(\"Are you sure you want to cancel this appointment? The cancellation fee will be $20.\");'>Cancel</a></td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "<p class='error-message'>No result found!</p>";
    }
}

if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];

    // Delete the product from the database
    $delete_query = "DELETE FROM appointment WHERE id = '$delete_id'";
    $result = mysqli_query($conn, $delete_query);

    if ($result) {
        echo "<p class='success-message'>Appointment canceled successfully!</p>";
    } else {
        echo "<p class='error-message'>Failed to cancel the appointment!</p>";
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
                        <a href="PID.php">
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

