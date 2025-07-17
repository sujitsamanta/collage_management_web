<?php
include("admin_header.php");

if (isset($_POST['add_student_submit'])) {

    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $address = $_POST["address"];


    if (empty($name) || empty($email) || empty($phone) || empty($address)) {
        $alert1 = true;
    } else {
        // $alert1=false;
        $sql = "SELECT *FROM admittedstudent WHERE name='$name' AND email='$email'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            // $alert1=false;
            $alert2 = true;
            // $alert3=false;
        } else {

            $sql = "INSERT INTO admittedstudent (name, email, phone, address) VALUES('$name', '$email', '$phone', '$address')";
            mysqli_query($conn, $sql);
            // $alert1=false;
            // $alert2=false;
            $alert3 = true;

            // header("Location: login.php");
        }
    }

}


?>


    <div class="box" style="display: flex; justify-content:space-around; margin: 1.5rem 0;">
        <div>
            <h1 style="font-size: 4vmin;">Welcome to Admin Page Mr. <?php echo "{$_SESSION['username']}" ?></h1>
        </div>
        <div>
            <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post" style="">
                <input
                    style="border-radius: 10px; padding: 1.3rem; font-weight: 600; background-color: var(--primary-purple); color: white; font-size: 1.2rem; "
                    type="submit" value="Log out" name="logout">
            </form>
        </div>


    </div>


    <!-- Statistics Overview -->
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-header">
                <div class="stat-icon">👥</div>
                <div class="stat-title">Total Teachers</div>
            </div>
            <div class="stat-value">24</div>
        </div>
        <div class="stat-card">
            <div class="stat-header">
                <div class="stat-icon">📋</div>
                <div class="stat-title">Pending Applications</div>
            </div>
            <div class="stat-value">
                <?php
                // applying students
                $sql = "SELECT *FROM applyingstudents";
                $result = mysqli_query($conn, $sql);
                echo mysqli_num_rows($result);
                ?>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-header">
                <div class="stat-icon">🎓</div>
                <div class="stat-title">Current Students</div>
            </div>
            <div class="stat-value">
                <?php
                // admitted students
                $sql = "SELECT *FROM admittedstudent";
                $result = mysqli_query($conn, $sql);
                echo mysqli_num_rows($result);
                // echo $result;
                ?>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-header">
                <div class="stat-icon">📊</div>
                <div class="stat-title">This Month Admissions</div>
            </div>
            <div class="stat-value">28</div>
        </div>
        <div class="add_student stat-card">
            <div class="stat-header">
                <div class="stat-icon">👥</div>
                <div class="stat-title">Add Student</div>
            </div>
            <div class="stat-value">
                <button>Add</button>
            </div>
        </div>


    </div>


    
<!-- add student form -->
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
                    <label>This Student is already present..!</label>
                </div>
            <?php endif; ?>

            <?php if ($alert3): ?>
                <div class="form-group"
                    style="text-align:center; color: black; border:3px solid #89E54C; padding: .5rem; border-radius: 5px;">
                    <label>App Student Successful..</label>
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

            <button type="submit" class="add_student_submit" name="add_student_submit" onclick="open_add_form();">Submit Information</button>
        </form>

    </div>




<?php
include("admin_footer.php");
?>