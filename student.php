<?php
include("database.php");
// include("adminlogin.php");
// session_start();

// session_start
session_start();
if (!isset($_SESSION["username"])) {
    header("location: studentlogin.php");
    // echo $_SESSION["username"]."<br>";
    // echo $_SESSION["password"];
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

     // log out
     if (isset($_POST['logout'])) {
        session_destroy();
        header("location: studentlogin.php");
    }
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
    <h1>Student Page</h1>
    <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
        <input type="submit" value="log out" name="logout">
    </form>

</body>

</html>