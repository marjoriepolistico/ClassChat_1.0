<?php
session_start();

if (!isset($_SESSION['idNumberStudent'])) {
    $_SESSION['msg'] = 'You must login first!';
    header('location: login_student.php');
    exit();
}else{
    if(time() - $_SESSION['last_login_timestamp'] > 60){
        $_SESSION['session_expired'] = 'Session Expired!';
        header('location: login_student.php');
        exit();
    }else{
        $_SESSION['last_activity_timestamp'] = time();
    }
}

if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['idNumberStudent']);
    header('location: index.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    if (isset($_SESSION['success'])) {
        echo "<script>alert('{$_SESSION['success']}');</script>";
        unset($_SESSION['success']); // Optional: Clear the session message after displaying it
    }
    ?>
    <h1>try ra ni</h1>
    <button type="button"><a href="dashboard_student.php?logout='1'">Logout</a></button>
    <script src="background.js"></script>
</body>

</html>