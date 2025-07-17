<?php
include("database.php");
$alert1 = false;
$alert2 = false;
$alert3 = false;



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['submit-btn'])) {
        $name = $_POST["name"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];
        $address = $_POST["address"];
    
    
        if (empty($name) || empty($email) || empty($phone) || empty($address)) {
            $alert1 = true;
        } else {
    
    
            // $alert1=false;
            $sql = "SELECT *FROM applyingstudents WHERE name='$name' AND email='$email'";
            $result = mysqli_query($conn, $sql);
    
            if (mysqli_num_rows($result) > 0) {
                // $alert1=false;
                $alert2 = true;
                // $alert3=false;
            } else {
    
                $sql = "INSERT INTO applyingstudents (name, email, phone, address) VALUES('$name', '$email', '$phone', '$address')";
                mysqli_query($conn, $sql);
                // $alert1=false;
                // $alert2=false;
                $alert3 = true;
    
                // header("Location: login.php");
            }
        }
    }
   
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
        }

        /* Header */
        .header {
            background: #fff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            padding: 1rem 0;
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .nav {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 20px;

        }

        .logo {
            font-size: 24px;
            font-weight: bold;
            color: #2c3e50;
        }

        .nav-links {
            display: flex;
            list-style: none;
            gap: 30px;
        }

        .nav-links a {
            text-decoration: none;
            color: #333;
            font-weight: 600;
            transition: color 0.3s ease;
            font-size: 1.2rem;
        }

        .nav-links a:hover {
            color: #3498db;
        }

        /* Hero Section */
        .hero {
            background: linear-gradient(135deg, #3498db 0%, #2980b9 100%);
            color: white;
            text-align: center;
            padding: 10rem 20px;
        }

        .hero h1 {
            font-size: 48px;
            margin-bottom: 20px;
            font-weight: 300;
        }

        .hero p {
            font-size: 20px;
            margin-bottom: 30px;
            opacity: 0.9;
        }

        .cta-button {
            display: inline-block;
            background: #fff;
            color: #3498db;
            padding: 15px 30px;
            text-decoration: none;
            border-radius: 5px;
            font-weight: 600;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .cta-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }




        /* form */

        .form-container {
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

        .submit-btn {
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

        .submit-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(102, 126, 234, 0.3);
        }

        .submit-btn:active {
            transform: translateY(0);
        }

        .success-message {
            display: none;
            background: #d4edda;
            color: #155724;
            padding: 15px;
            border-radius: 10px;
            margin-top: 20px;
            text-align: center;
            border: 1px solid #c3e6cb;
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








        /* Features Section */
        .features {
            padding: 80px 20px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .features h2 {
            text-align: center;
            font-size: 36px;
            margin-bottom: 50px;
            color: #2c3e50;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 40px;
        }

        .feature-card {
            text-align: center;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .feature-card:hover {
            transform: translateY(-5px);
        }

        .feature-icon {
            font-size: 48px;
            margin-bottom: 20px;
        }

        .feature-card h3 {
            font-size: 24px;
            margin-bottom: 15px;
            color: #2c3e50;
        }

        .feature-card p {
            color: #666;
            line-height: 1.6;
        }

        /* Footer */
        .footer {
            background: #2c3e50;
            color: white;
            text-align: center;
            padding: 40px 20px;
        }

        .footer p {
            opacity: 0.8;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .nav {
                flex-direction: column;
                gap: 20px;
            }

            .nav-links {
                gap: 20px;
            }

            .hero h1 {
                font-size: 36px;
            }

            .hero p {
                font-size: 18px;
            }

            .features h2 {
                font-size: 28px;
            }
        }
    </style>
</head>

<body>
    <!-- Header -->
    <header class="header">
        <nav class="nav">
            <div class="logo">MyWebsite</div>
            <ul class="nav-links">
                <li><a href="#home">Home</a></li>
                <li><a href="#form-container">Apply form</a></li>
                <li><a href="#services">Services</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>
        </nav>
    </header>






    <!-- form -->
    <div id="form-container" class="form-container">
        <h1>Apply Form</h1>
        <form id="contactForm" action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">


            <?php if ($alert1): ?>
                <div class="form-group"
                    style="text-align:center; color: black; border:3px solid #FD7777; padding: .5rem; border-radius: 5px;">
                    <label>Ples enter all the data..!</label>
                </div>
            <?php endif; ?>

            <?php if ($alert2): ?>
                <div class="form-group"
                    style="text-align:center; color: black; border:3px solid #E68750; padding: .5rem; border-radius: 5px;">
                    <label>This candidate is already registered..!</label>
                </div>
            <?php endif; ?>

            <?php if ($alert3): ?>
                <div class="form-group"
                    style="text-align:center; color: black; border:3px solid #89E54C; padding: .5rem; border-radius: 5px;">
                    <label>Apply Successful..</label>
                </div>
            <?php endif; ?>


            <div class="form-group">
                <label for="name">Full Name *</label>
                <input type="text" id="name" name="name">
            </div>

            <div class="form-group">
                <label for="email">Email Address *</label>
                <input type="email" id="email" name="email">
            </div>

            <div class="form-group">
                <label for="phone">Phone Number</label>
                <input type="tel" id="phone" name="phone">
            </div>

            <div class="form-group">
                <label for="address">Address</label>
                <textarea id="address" name="address" placeholder="Enter your full address..."></textarea>
            </div>

            <button type="submit" class="submit-btn" name="submit-btn">Submit Information</button>
        </form>

        <div id="successMessage" class="success-message">
            Thank you! Your information has been submitted successfully.
        </div>
    </div>


    <!-- Hero Section -->
    <section class="hero" id="home">
        <h1>Welcome to Our Website</h1>
        <p>We create amazing experiences for our users</p>
        <a href="#features" class="cta-button">Get Started</a>
    </section>


    <!-- Features Section -->
    <section class="features" id="features">
        <h2>What We Offer</h2>
        <div class="features-grid">
            <div class="feature-card">
                <div class="feature-icon">🚀</div>
                <h3>Fast Performance</h3>
                <p>Lightning-fast loading times and optimized performance for the best user experience.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">🎨</div>
                <h3>Beautiful Design</h3>
                <p>Clean, modern design that looks great on all devices and screen sizes.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">🔒</div>
                <h3>Secure & Reliable</h3>
                <p>Your data is safe with us. We use the latest security measures to protect your information.</p>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <p>&copy; 2025 MyWebsite. All rights reserved.</p>
    </footer>

    <script>
        // form



        // Smooth scrolling for navigation links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Add some interactivity to the CTA button
        document.querySelector('.cta-button').addEventListener('click', function(e) {
            if (this.getAttribute('href') === '#features') {
                e.preventDefault();
                document.querySelector('#features').scrollIntoView({
                    behavior: 'smooth'
                });
            }
        });
    </script>
</body>

</html>










<?php
// if ($_SERVER['REQUEST_METHOD'] == 'POST'){
//     $name=$_POST['name'];
//     $password=$_POST['password'];

//     if (empty($name)){
//         echo 'entar name..!';
//     } 
//     elseif(empty($password)){
//         echo 'enter password..!';
//     }
//     else{
//         try{
//             $sql="INSERT INTO users (name, password) VALUES ('$name','$password')";
//             mysqli_query($conn, $sql);

//         }
//         catch(mysqli_sql_exception){
//             echo "not...!!!";
//         }
//     }
// }


// if ($_SERVER['REQUEST_METHOD'] == 'POST'){
//     $name=$_POST['name'];
//     $password=$_POST['password'];
//     if (empty($name)){
//         echo 'Enter name..!';
//     }
//     elseif(empty($password)){
//         echo 'Enter password..!';
//     }
//     else{
//         $sql = "SELECT *FROM users WHERE name='$name' AND password='$password'" ;
//         $result=mysqli_query( $conn, $sql );
//         if(mysqli_num_rows($result) > 0){
//             header("Location: home.php");
//         }
//         else{
//             echo "enter correct data..!";
//         }
//     }

// }



?>