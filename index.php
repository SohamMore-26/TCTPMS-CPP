<?php
include "Admin_md\config.php";
$login = false;
$showError = false;
if (isset($_POST['login'])) {
    extract($_POST);
    $log = mysqli_query($con, "select * from teacherinfo where teacherId='" . $_POST['userid'] . "' AND password='" . $_POST['password'] . "'") or die(mysqli_error($con));
    if (mysqli_num_rows($log) > 0) {
        $fetch = mysqli_fetch_array($log);
        $login = true;
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['id'] = $fetch['id'];
        $_SESSION['teacherId'] = $fetch['teacherId'];
        $_SESSION['firstName'] = $fetch['firstName'];
        $_SESSION['middleName'] = $fetch['middleName'];
        $_SESSION['lastName'] = $fetch['lastName'];
        $_SESSION['designation'] = $fetch['designation'];
        if ($_SESSION['designation'] == "Lecturer") {
            header("location: Teacher_md/tch_home.php");
        } elseif ($_SESSION['designation'] == "Head of Department") {
            header("location: Hod_md\hod_home.php");
        } else {
            header("location: Admin_md\adm_home.php");

        }
    } else {
        $showError = "Login Failed...!(Check your email id and Password Once Again)";
    }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Admin_md\styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Calligraffitti&family=Montserrat&display=swap"
        rel="stylesheet">
    <script src="https://kit.fontawesome.com/970acd6ae4.js" crossorigin="anonymous"></script>
    <title>Login Page</title>
</head>

<body>
    <div class="login-container">

        <div class="Teach" id="teach">
            <form class="login-form" method="post">
                <h1>Login</h1>
                <?php
                if ($showError) {
                    echo ' <div class="alert" style = "color:red;" "text-align: center;">
                             ' . $showError . '
                        </div> ';
                }
                ?>
                <label for="username">User ID:</label>

                <div>
                    <input type="text" id="username" class="username" placeholder="Enter your User ID" name="userid"
                        required>
                    <div class="icon-user"><i class="fa-solid fa-user"></i></div>
                </div>

                <label for="password" class="passlabel">Password:</label>
                <div>
                    <input type="password" id="password" class="password" placeholder="Enter your Password"
                        name="password" required>
                    <div class="icon-pass"><i class="fa-solid fa-lock"></i></div>
                </div>
                <div class="button">
                    <button type="submit" name="login" class="btt">Login</button>
                </div>
            </form>
        </div>

    </div>

</body>

</html>