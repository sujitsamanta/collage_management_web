<?php
include("database.php");
$alert1 = false;
$alert2 = false;
$alert3 = false;
$alert4 = false;
$alert5 = false;
$alert6 = false;

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// session_start
session_start();
if (!isset($_SESSION["username"])) {
    header("location: adminlogin.php");
    // echo $_SESSION["username"]."<br>";
    // echo $_SESSION["password"];
}



if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // log out
    if (isset($_POST['logout'])) {
        session_destroy();
        header("location: adminlogin.php");
    }

// applying student approve
if (isset($_POST['approve'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $address = $_POST['address'];


    if (empty($password)) {
        $alert1 = true;
    } else {
        // $message = 'Your application is submitted successful...';

        // check this applying student is present or not in admittedstudent table 
        $sql = "SELECT *FROM admittedstudent WHERE name='$name' AND email='$email'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {

            // delete in to applyingstudents table

            // $sql = "DELETE FROM applyingstudents WHERE id='$id'";
            // mysqli_query($conn, $sql);

            $alert4 = true;
        } else {


            //Load Composer's autoloader (created by composer, not included with PHPMailer)
            require 'PHPMailer/Exception.php';
            require 'PHPMailer/PHPMailer.php';
            require 'PHPMailer/SMTP.php';

            //Create an instance; passing `true` enables exceptions
            $mail = new PHPMailer(true);

            try {
                //Server settings

                //Enable verbose debug output
                // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      
                $mail->isSMTP();                                            //Send using SMTP
                $mail->Host = 'smtp.gmail.com';                     //Set the SMTP server to send through
                $mail->SMTPAuth = true;                                   //Enable SMTP authentication
                $mail->Username = 'sujitsamanta510@gmail.com';                     //SMTP username
                $mail->Password = 'zsyzdszvsjgnhhhs';                               //SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                $mail->Port = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                //Recipients
                $mail->setFrom('sujitsamanta510@gmail.com', 'CCLMS Collage');

                //Add a recipient
                $mail->addAddress("$email", "$name");

                // $mail->addAddress('ellen@example.com');               //Name is optional
                // $mail->addReplyTo('info@example.com', 'Information');
                // $mail->addCC('cc@example.com');
                // $mail->addBCC('bcc@example.com');

                //Attachments
                // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
                // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name


                $message = "<h1>Wellcome to CCLMS Collage...</h1><h2>Your applicant name {$name} is approve successful...</h2><br>
                <p>Name or User id: {$name}</p>
                <p>Password: {$password}</p>
                <p>Email id: {$email}</p>
                <p>Phone no: {$phone}</p>
                <p>Address: {$address}</p>
                ";



                //Content
                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject = 'Contact Request';
                $mail->Body = "$message";
                // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                $mail->send();
                // echo 'Message has been sent';

                // inser in to admittedstudent table
                $sql = "INSERT INTO admittedstudent (name, email, phone, password, address) VALUES('$name', '$email', '$phone','$password', '$address')";
                mysqli_query($conn, $sql);
                $alert2 = true;


                // delete in to applyingstudents table
                $sql = "DELETE FROM applyingstudents WHERE id='$id'";
                mysqli_query($conn, $sql);

            } catch (Exception $e) {
                $alert6 = true;
                // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
        }
    }
}

if (isset($_POST['reject'])) {

    $id = $_POST['id'];

    $sql = "DELETE FROM applyingstudents WHERE id='$id'";
    mysqli_query($conn, $sql);
    $alert5 = true;
}



}






?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher's Admin Panel - College Management</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --primary-purple: #6366f1;
            --light-purple: #a5b4fc;
            --dark-purple: #4338ca;
            --bg-light: #ffffff;
            --bg-secondary-light: #f8fafc;
            --text-light: #1e293b;
            --text-secondary-light: #64748b;
            --border-light: #e2e8f0;
            --shadow-light: 0 1px 3px 0 rgba(0, 0, 0, 0.1);
            --shadow-card-light: 0 4px 6px -1px rgba(0, 0, 0, 0.1);

            --bg-dark: #0f172a;
            --bg-secondary-dark: #1e293b;
            --text-dark: #f1f5f9;
            --text-secondary-dark: #94a3b8;
            --border-dark: #334155;
            --shadow-dark: 0 1px 3px 0 rgba(0, 0, 0, 0.3);
            --shadow-card-dark: 0 4px 6px -1px rgba(0, 0, 0, 0.3);
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            background: var(--bg-light);
            color: var(--text-light);
            transition: all 0.3s ease;
            /* align-items: center;
            justify-content: center; */
        }

        body.dark {
            background: var(--bg-dark);
            color: var(--text-dark);
        }

        .header {
            background: var(--bg-light);
            padding: 1rem 2rem;
            box-shadow: var(--shadow-light);
            position: sticky;
            top: 0;
            z-index: 100;
            border-bottom: 2px solid var(--primary-purple);
            transition: all 0.3s ease;
        }

        body.dark .header {
            background: var(--bg-dark);
            box-shadow: var(--shadow-dark);
        }

        .header-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 1400px;
            margin: 0 auto;
        }

        .logo {
            font-size: 1.5rem;
            font-weight: bold;
            color: var(--primary-purple);
        }

        .header-controls {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .theme-toggle {
            background: none;
            border: 2px solid var(--primary-purple);
            color: var(--primary-purple);
            width: 40px;
            height: 40px;
            border-radius: 50%;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
        }

        .theme-toggle:hover {
            background: var(--primary-purple);
            color: white;
        }

        .main-content {
            /* max-width: 1400px; */
            margin: 0 auto;
            /* padding: 2rem; */
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .stat-card {
            background: var(--bg-light);
            padding: 1.5rem;
            border-radius: 12px;
            box-shadow: var(--shadow-card-light);
            border: 1px solid var(--border-light);
            transition: all 0.3s ease;
        }

        .add_student button {
            padding: 1rem;
            border-radius: 10px;
            background: var(--primary-purple);
            font-size: 1rem;
            border: none;
            color: white;
            font-weight: 500;
        }

        body.dark .stat-card {
            background: var(--bg-secondary-dark);
            border-color: var(--border-dark);
            box-shadow: var(--shadow-card-dark);
        }

        .stat-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px -8px rgba(99, 102, 241, 0.3);
        }

        .stat-header {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            margin-bottom: 1rem;
        }

        .stat-icon {
            width: 40px;
            height: 40px;
            background: var(--light-purple);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary-purple);
        }

        .stat-title {
            font-weight: 600;
            color: var(--text-secondary-light);
        }

        body.dark .stat-title {
            color: var(--text-secondary-dark);
        }

        .stat-value {
            font-size: 2rem;
            font-weight: bold;
            color: var(--primary-purple);
        }

        .content-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 2rem;
            margin-bottom: 2rem;
        }

        .section {
            background: var(--bg-light);
            border-radius: 12px;
            box-shadow: var(--shadow-card-light);
            border: 1px solid var(--border-light);
            overflow: hidden;
            transition: all 0.3s ease;
            margin-top: 2rem;
        }

        body.dark .section {
            background: var(--bg-secondary-dark);
            border-color: var(--border-dark);
            box-shadow: var(--shadow-card-dark);
        }

        .section-header {
            padding: 1.5rem;
            background: var(--primary-purple);
            color: white;
            font-weight: 600;
            font-size: 1.1rem;
        }

        .section-content {
            padding: 1.5rem;
            max-height: 703px;
            overflow-y: auto;
        }




        /* add student form */

        .form-container {
            /* position: fixed;
            top: 8vmin;
            left: 40vmax; */

            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px;
            transform: translateY(0);
            transition: transform 0.3s ease;
            margin: auto;
            margin-top: 4rem;
            margin-bottom: 4rem;

        }

        .form-container:hover {
            transform: translateY(-5px);
        }

        .form-container h1 {
            text-align: center;
            color: #333;
            margin-bottom: 30px;
            font-size: 2.2em;
            font-weight: 300;
        }

        .form-group {
            margin-bottom: 25px;
            position: relative;
        }

        .form-container label {
            display: block;
            margin-bottom: 8px;
            color: #555;
            font-weight: 500;
            font-size: 0.95em;
        }

        .form-container input[type="text"],
        .form-container input[type="email"],
        .form-container input[type="tel"],
        .form-container textarea {
            width: 100%;
            padding: 15px;
            border: 2px solid #e1e1e1;
            border-radius: 10px;
            font-size: 16px;
            transition: all 0.3s ease;
            background: rgba(255, 255, 255, 0.9);
        }

        .form-container input[type="text"]:focus,
        .form-container input[type="email"]:focus,
        .form-container input[type="tel"]:focus,
        .form-container textarea:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
            transform: scale(1.02);
        }

        .form-container textarea {
            resize: vertical;
            min-height: 100px;
            font-family: inherit;
        }

        .add_student_submit {
            width: 100%;
            padding: 15px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 18px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .add_student_submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(102, 126, 234, 0.3);
        }

        .add_student_submit:active {
            transform: translateY(0);
        }


        @media (max-width: 600px) {
            .form-container {
                padding: 30px 20px;
                margin: 10px;
            }

            .form-container h1 {
                font-size: 1.8em;
            }
        }





        /* teacher */
        .teacher-card {
            display: flex;
            align-items: center;
            gap: 1rem;
            padding: 1rem;
            border: 1px solid var(--border-light);
            border-radius: 8px;
            margin-bottom: 1rem;
            transition: all 0.3s ease;
        }

        body.dark .teacher-card {
            border-color: var(--border-dark);
        }

        .teacher-card:hover {
            background: var(--bg-secondary-light);
            transform: translateX(5px);
        }

        body.dark .teacher-card:hover {
            background: var(--bg-dark);
        }

        .teacher-photo {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background: var(--light-purple);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary-purple);
            font-weight: bold;
            font-size: 1.2rem;
        }

        .teacher-info h4 {
            color: var(--primary-purple);
            margin-bottom: 0.25rem;
        }

        .teacher-info p {
            color: var(--text-secondary-light);
            font-size: 0.9rem;
        }

        body.dark .teacher-info p {
            color: var(--text-secondary-dark);
        }

        .student-item {
            padding: 1rem;
            border: 1px solid var(--border-light);
            border-radius: 8px;
            margin-bottom: 1rem;
            transition: all 0.3s ease;
        }

        body.dark .student-item {
            border-color: var(--border-dark);
        }

        .student-item:hover {
            background: var(--bg-secondary-light);
            border-color: var(--primary-purple);
        }

        body.dark .student-item:hover {
            background: var(--bg-dark);
        }

        .student-header {
            display: flex;
            justify-content: between;
            align-items: center;
            margin-bottom: 0.5rem;
        }

        .student-id {
            background: var(--primary-purple);
            color: white;
            padding: 0.25rem 0.75rem;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
            margin-right: 1rem;
        }

        .student-name {
            color: var(--primary-purple);
            font-weight: 600;
            margin-bottom: 0.5rem;
        }

        .student-details {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 0.5rem;
            font-size: 0.9rem;
        }

        .detail-item {
            color: var(--text-secondary-light);
        }

        body.dark .detail-item {
            color: var(--text-secondary-dark);
        }

        .detail-label {
            font-weight: 600;
            color: var(--text-light);
        }

        body.dark .detail-label {
            color: var(--text-dark);
        }

        .full-width-section {
            grid-column: 1 / -1;
        }

        .btn {
            background: var(--primary-purple);
            color: white;
            border: none;
            padding: 0.5rem 1rem;
            border-radius: 6px;
            cursor: pointer;
            transition: all 0.3s ease;
            font-size: 0.9rem;
        }

        .btn:hover {
            background: var(--dark-purple);
        }

        .btn-secondary {
            background: transparent;
            color: var(--primary-purple);
            border: 1px solid var(--primary-purple);
        }

        .btn-secondary:hover {
            background: var(--primary-purple);
            color: white;
        }

        .search-bar {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid var(--border-light);
            border-radius: 8px;
            margin-bottom: 1rem;
            background: var(--bg-light);
            color: var(--text-light);
        }

        body.dark .search-bar {
            background: var(--bg-dark);
            border-color: var(--border-dark);
            color: var(--text-dark);
        }

        .status-badge {
            padding: 0.25rem 0.75rem;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
        }

        .status-pending {
            background: #fef3c7;
            color: #92400e;
        }

        .status-admitted {
            background: #d1fae5;
            color: #065f46;
        }

        .status-active {
            background: #dbeafe;
            color: #1e40af;
        }

        /* left */
        .manu {
            padding: 1rem;
        }

        .manu_box {
            height: 90vh;
            background: var(--primary-purple);
            text-align: center;
            border-radius: 10px;
            margin-top: 1rem;

        }

        .a {
            border-radius: 10px;
            background-color: white;
            margin: 1rem;
            padding: .5rem;
        }

        .manu_box a {
            text-decoration: none;
            color: black;
            font-size: 1.2rem;
            /* line-height: 5rem; */
            font-weight: 500;
        }


        /* right */
        .right {
            width: 87vw;
            padding: 1.5rem;
        }

        @media (max-width: 1180px) {
            .left {
                display: none;
            }

            .right {
                width: 100vw;
            }
        }


        @media (max-width: 968px) {
            .content-grid {
                grid-template-columns: 1fr;
            }

            .stats-grid {
                grid-template-columns: 1fr;
            }

            .student-details {
                grid-template-columns: 1fr;
            }

            .left {
                display: none;
            }

            .right {
                /* width: 100%;
        padding: 2rem;
        position: absolute;
        right: 0px; */
                width: 100vw;
            }
        }

        .scrollbar::-webkit-scrollbar {
            width: 6px;
        }

        .scrollbar::-webkit-scrollbar-track {
            background: var(--bg-secondary-light);
        }

        .scrollbar::-webkit-scrollbar-thumb {
            background: var(--primary-purple);
            border-radius: 3px;
        }

        body.dark .scrollbar::-webkit-scrollbar-track {
            background: var(--bg-secondary-dark);
        }
    </style>
</head>

<body>
    <header class="header">
        <div class="header-content">
            <button class="theme-toggle" id="theme-toggle" onclick="toggleManu()">
                <span id="manuIcon">🌙</span>
            </button>
            <div class="logo">🎓 College Admin Panel</div>
            <div class="header-controls">
                <!-- <span id="adminName"><?php echo "<b>{$_SESSION['username']}</b>" ?></span> -->

                <button class="theme-toggle" onclick="toggleTheme()" title="Toggle Dark/Light Mode">
                    <span id="themeIcon">🌙</span>
                </button>
            </div>
        </div>

    </header>

    <main class="main-content" style=" display: flex;">

        <div class="left" id="left">

            <div class="manu_box">

                <div class="manu">
                    <div class="a"><a href="admin_home.php">Home</a></div><br>

                    <div class="a"><a href="pending_student_card.php">Pending Students</a></div><br>
                    <div class="a"><a href="teacher_card.php">Teachers</a></div><br>
                    <div class="a"><a href="curent_student_card.php">Curent Students</a></div>
                </div>
            </div>
        </div>
        <div class="right">