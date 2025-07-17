<?php
include("database.php");
$alert1 = false;
$alert2 = false;
$alert3 = false;


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $l_name = $_POST["l_name"];
    $l_password = $_POST["l_password"];

    if (empty($l_name) || empty($l_password)) {
        $alert1 = true;

    } else {
        $sql = "SELECT *FROM admittedstudent WHERE name='$l_name'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            $sql = "SELECT *FROM admittedstudent WHERE password='$l_password'";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                session_start();
                $_SESSION["username"] = $l_name;
                $_SESSION["password"] = $l_password;

                header("Location: student.php");
            }
            else{
                $alert2 = true;
            } 
        }
        else{
            $alert3= true;
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #74b9ff 0%, #0984e3 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-container {
            background: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 350px;
        }

        .login-title {
            text-align: center;
            margin-bottom: 30px;
            color: #333;
            font-size: 28px;
            font-weight: 300;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            color: #555;
            font-weight: 500;
        }

        .form-group input {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid #e1e1e1;
            border-radius: 5px;
            font-size: 16px;
            transition: border-color 0.3s ease;
        }

        .form-group input:focus {
            outline: none;
            border-color: #74b9ff;
        }

        .submit-btn {
            width: 100%;
            padding: 12px;
            background: linear-gradient(135deg, #74b9ff 0%, #0984e3 100%);
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: transform 0.2s ease, opacity 0.2s ease;
        }

        .submit-btn:hover {
            transform: translateY(-2px);
            opacity: 0.9;
        }

        .submit-btn:active {
            transform: translateY(0);
        }
    </style>
</head>

<body>
    <div class="login-container">
        <h2 class="login-title">Student Login</h2>
        <form id="loginForm" action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">

            <?php if ($alert1): ?>
                <div class="form-group"
                    style="text-align:center; color: black; border:3px solid #FD7777; padding: .5rem; border-radius: 5px;">
                    <label>Ples enter all the data..!</label>
                </div>
            <?php endif; ?>

            <?php if ($alert2): ?>
                <div class="form-group"
                    style="text-align:center; color: black; border:3px solid #E68750; padding: .5rem; border-radius: 5px;">
                    <label>Incorrect password..!</label>
                </div>
            <?php endif; ?>

            <?php if ($alert3): ?>
                <div class="form-group"
                    style="text-align:center; color: black; border:3px solid #E68750; padding: .5rem; border-radius: 5px;">
                    <label>Users does not exist..!</label>
                </div>
            <?php endif; ?>


            <div class="form-group">
                <label>Username</label>
                <input type="text" id="username" name="l_name">
            </div>

            <div class="form-group">
                <label>Password</label>
                <input type="password" id="password" name="l_password">
            </div>

            <button type="submit" class="submit-btn">Login</button>
        </form>
    </div>

    <script>

    </script>
</body>

</html>