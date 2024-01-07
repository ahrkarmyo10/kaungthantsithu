
<?php
        if (isset($_POST["submit"])) {
            if (!empty($_POST['user']) && !empty($_POST['pass'])) {
                $user = $_POST['user'];
                $pass = $_POST['pass'];
                $con = mysqli_connect('localhost', 'root', '', 'Final Project') or die(mysqli_error($con));
                $query = mysqli_prepare($con, "SELECT * FROM User WHERE Email=? AND Password=?");
                mysqli_stmt_bind_param($query, "ss", $user, $pass);
                mysqli_stmt_execute($query);
                $result = mysqli_stmt_get_result($query);
                $numrows = mysqli_num_rows($result);
                if ($numrows != 0) {
                    session_start();
                    $_SESSION['sess_user'] = $user;
                    header("Location: user.html");
                    exit();
                } else {
                    $error_message = "Invalid username or password!";
                }
                mysqli_stmt_close($query);
                mysqli_close($con); 
            } else {
                echo "<div class='error-message'>All fields are required!</div>";
            }
        }
        ?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="login.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">

    <style>

        body{
            background-image: url('bgl1.png');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            background-attachment: fixed;
        }
        
        .box{
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 90vh;
        }

        .container{
            width: 350px;
            height: 300px;
            display: flex;
            flex-direction: column;
            padding: 0 15px 0 15px;
            border-radius: 30px;
            background-color: white;
            backdrop-filter: blur(5px);
        }

        .top-header header{
            color: #333;
            font-size: 30px;
            display: flex;
            justify-content: center;
            padding: 10px 0 10px 0;
            margin-top: 25px;
            font-family: sans-serif, sans-serif;
        }

        .input-field {
            display: flex;
            flex-direction: column;
            position: relative;
        }

        .input {
            height: 45px;
            width: 100%;
            border: none;
            outline: none;
            border-radius: 30px;
            color: #000;
            padding: 0 50px 0 50px; 
            margin-bottom: 10px;
            box-sizing: border-box;
            background-color: rgba(255, 255, 255, 0.3);
        }

        i {
            position: absolute; 
            top: 40%; 
            left: 15px; 
            transform: translateY(-50%); 
            color: #000;
            font-size: 20px; 
        }

        .input:-webkit-autofill {
            color:#fff;
        }

        .submit{
            border: none;
            border-radius: 30px;
            font-size: 15px;
            height: 45px;
            outline: none;
            width: 100%;
            background: honeydew;
            cursor: pointer;
            transition: .3s;
            margin-top: 10px;
        }

        .submit:hover{
            box-shadow: 1px 5px 7px 1px rgba(0,0,0,0.2);
        }

        h1{
            font-size: 16px;
            margin-left: 60px;
        }

        .input-field h2{
            position: absolute; 
            top: 20%; 
            right: 15px; 
            transform: translateY(-50%); 
            color: #333333;
            font-size: 16px; 
        }

        .input-field label{
            position: absolute;
            top: 40%;
            left: 15%;
            transform: translateY(-50%);
            color: #000;
            z-index: -1;
            font-family: Sans-serif, sans-serif;
            transition: top 0.3s, font-size 0.3s, color 0.3s;
        }

        .input-field input:focus~label,
        .input-field input:valid~label{
            top: 0;
            color: #4070f4;
            font-size: 14px;
            background: white;
            z-index: 1;
        }

        .input-field input:focus,
        .input-field input:valid {
            border: 2px solid #4070f4;
        }

        a{
            color: blue;
            text-decoration: none;
        }

        a:hover{
            text-decoration: underline;
        }

        .error-message {
            text-align: center; 
            margin: 0 auto; 
            color: red; 
            margin-top: -5px;
        }
    </style>
</head>

<body>

    <div class="box">
        <div class="container">
            <div class="top-header">
                <header>Sign-In</header>
            </div>

            <form action="userL.php" method="POST">
                <div class="input-field">
                    <input type="text" class="input" name="user" required>
                    <label>Enter Email-Address</label>
                    <i class="bx bx-user"></i>
                </div>

                <div class="input-field">
                    <input type="password" class="input" name="pass" id="pswd" required>
                    <label>Enter Password</label>
                    <i class="bx bx-lock-alt"></i>
                    <h2 class="fas fa-eye-slash show"></h2>
                </div>

                <div class="btn">
                    <input type="submit" class="submit" value="Login" name="submit">
                </div>

                <h1>Don't have an account? <a href="usersu.php"> Sign-Up! </a></h1>
            </form>

            <div class="error-message">
                <?php
                    if (!empty($error_message)) {
                        echo $error_message; // Display the error message if it's not empty
                    }
                ?>
            </div>

        </div>
    </div>
    </div>

    <script>
        const pwShow = document.querySelector(".show"),
        pswd = document.querySelector("#pswd");

        pwShow.addEventListener("click", ()=>{
        if((pswd.type === "password")){
            pswd.type = "text";
            pwShow.classList.replace("fa-eye-slash", "fa-eye");
        }
        else{
            pswd.type = "password";
            pwShow.classList.replace("fa-eye", "fa-eye-slash");
        }
    });
    </script>
</body>
</html>