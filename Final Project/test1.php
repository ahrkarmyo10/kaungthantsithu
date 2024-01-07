<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Document</title>
    <style>

        body {
            background-image:url('bg4.jpg');
            font-family: san-serif, sans-serif;
            margin: 0;
            padding: 0;
        }
        .container{
            width: 500px;
            height: 580px;
            display: flex;
            flex-direction: column;
            padding: 0 15px 0 15px;
            border-radius: 30px;
            background: honeydew;
            margin-top: 100px;
            margin-left:500px;
        }

        .container h1{
            text-align: center;
            margin-bottom: 80px;
        }

        .form-group {
            display: grid;
            grid-template-columns: 120px 1fr;
            align-items: center;
            margin-bottom: 10px; /* Added margin to separate form groups */
        }

        .form-group label {
            color: black;
            text-align: right;
            padding-right: 10px;
        }

        .form-group input {
            height: 45px;
            width: 100%; /* Changed width to 100% for responsiveness */
            border: 2px solid aquamarine;
            outline: none;
            border-radius: 30px;
            color: #000;
            padding: 0 15px; /* Adjusted padding for input */
            box-sizing: border-box;
            background-color: aliceblue;
        }

        .btn {
            margin-top: 20px;
            text-align: center;
            display: flex;
            justify-content: center;
        }

        .btn input {
            min-width: 100px;
            min-height: 30px;
            border: none;
            border-radius: 30px;
            font-size: 15px;
            outline: none;
            background: aquamarine;
            cursor: pointer;
            transition: .3s;
            margin: 0 10px;
            margin-top: 20px;
        }

        .btn input:hover{
            box-shadow: 1px 5px 7px 1px rgba(0,0,0,0.2);
        }

        .foot img{
            margin-top: -500px;
            margin-left: -400px;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Registration</h1>

    <form name="registerForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" name="username" id="username" required>
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="text" name="email" id="email" required>
        </div>
        <div class="form-group">
            <label for="address">Address:</label>
            <input type="text" name="address" id="address" required>
        </div>
        <div class="form-group">
            <label for="contact">Contact:</label>
            <input type="text" name="contact" id="contact" required>
        </div>
        <div class="btn">
            <input type="submit" name="submit" value="Submit">
            <input type="reset" value="Reset">
        </div>

        <div class="foot">
            <img src="su.png" alt="" width="500" height="500">
        </div>
    </form>

    <?php
if (isset($_POST['submit'])) {
    $host = "localhost";
    $user = "root";
    $passwd = "";
    $database = "Final Project";
    $table_name = "User";

    $connect = mysqli_connect($host, $user, $passwd, $database) or die("could not connect to database");

    #$username = $_POST["Username"];
    #$password = $_POST["Password"];
    #$email = $_POST["Email"];
    #$address = $_POST["Address"];
    #$contact = $_POST["Contact"];

    $username = isset($_POST["Username"]);
    $password = isset($_POST["Password"]);
    $email = isset($_POST["Email"]);
    $address = isset($_POST["Address"]);
    $contact = isset($_POST["Contact"]);

    $check_query = "SELECT * FROM $table_name WHERE Email = '$email'";
    $result = mysqli_query($connect, $check_query);

    if (mysqli_num_rows($result) > 0) {
        echo "<center>Email already exists. Please use a different email.</center>";
    } else {
        $sql = "INSERT INTO $table_name(Username, Password, Email, Address, Contact)
            VALUES('$username', '$password', '$email', '$address', '$contact')";

        if (!mysqli_query($connect, $sql)) {
            die('Error: ' . mysqli_error($connect));
        } else {
            echo "<center>Successfully Registered!</center>";
        }
        mysqli_close($connect);
    }
}
?>
</div>
</body>
</html>