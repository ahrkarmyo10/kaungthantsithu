<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="admin.css">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css">
    <link rel="stylesheet" href="review.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
</head>
<body>
    <div class="container">
        <div class="star-widget">
            <input type="radio" name="rate" id="rate-5">
            <label for="rate-5" class="fas fa-star"></label>

            <input type="radio" name="rate" id="rate-4">
            <label for="rate-4" class="fas fa-star"></label>

            <input type="radio" name="rate" id="rate-3">
            <label for="rate-3" class="fas fa-star"></label>

            <input type="radio" name="rate" id="rate-2">
            <label for="rate-2" class="fas fa-star"></label>

            <input type="radio" name="rate" id="rate-1">
            <label for="rate-1" class="fas fa-star"></label>
            <form name="registerForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
                <header></header>
                <div class="tf">
                    <input type="text" id="userid" name="userid" placeholder="Enter User ID" required>
                </div>
                <div class="tf">
                    <input type="text" id="doctorid" name="doctorid" placeholder="Enter Doctor ID" required>
                </div>
                <div class="tf">
                    <input type="text" id="serviceid" name="serviceid" placeholder="Enter Service ID" required>
                </div>
                <div class="textarea">
                    <textarea cols="30" id="fb" name="fb" placeholder="Describe your experience..." required></textarea>
                </div>
                <div class="btn">
                    <button type="submit" name="submit">Submit</button>
                </div>

                <?php
                    if (isset($_POST['submit'])) {
                    $host = "localhost";
                    $user = "root";
                    $passwd = "";
                    $database = "Final Project";
                    $table_name = "review";

                    $connect = mysqli_connect($host, $user, $passwd, $database) or die("could not connect to database");

                    $userid = $_POST["userid"];
                    $doctorid = $_POST["doctorid"];
                    $serviceid = $_POST["serviceid"];
                    $fb = $_POST["fb"];

                    $sql = "INSERT INTO $table_name(userid, doctorid, serviceid, feedback)
                            VALUES('$userid', '$doctorid', '$serviceid', '$fb')";

                    if (!mysqli_query($connect, $sql)) {
                        die('Error: ' . mysqli_error($connect));
                    }else {
                        echo "<div class='success-message'>Thanks for your feedback!</div>";
                    }
                    mysqli_close($connect);
                }
                ?>
            </form>
        </div>
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
                        <a href="#">
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