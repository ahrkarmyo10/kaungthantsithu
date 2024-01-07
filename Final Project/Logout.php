<?php
   session_start();
   if(isset($_SESSION["sess_user"])){
       if(isset($_GET['confirm']) && $_GET['confirm'] == 'yes') {
           session_destroy();
           header('location: index.html');
       } else {
           echo '<script>
                var confirmLogout = confirm("Are you sure you want to log out?");
                if(confirmLogout) {
                    window.location.href = "logout.php?confirm=yes";
                } else {
                    window.location.href = "admin.html";
                }
           </script>';
       }
   }
   else{
       header('location: index.html');
   }
?>