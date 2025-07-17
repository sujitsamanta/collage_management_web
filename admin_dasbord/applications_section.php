<?php include('admin_header.php');
include('database.php');
$alert1 = false;
$alert2 = false;
$alert3 = false;
$alert4 = false;
$alert5 = false;
$alert6 = false;


?>
<?php
 //Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

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


 
 ?>
 
 
 

     <!-- Applications Section -->
        <div id="applications-section" class="section-content p-8 ">
            <div class="bg-white rounded-xl shadow-lg border border-slate-200 overflow-hidden transition-all duration-300 dark:bg-slate-800 dark:border-slate-600">
                <div class="px-6 py-4 bg-primary-purple text-white font-semibold text-lg">
                    📋 Pending Applications
                </div>
                <div class="p-6 max-h-96 overflow-y-auto scrollbar-thin scrollbar-thumb-primary-purple scrollbar-track-slate-100 dark:scrollbar-track-slate-700">
                    <input 
                        type="text" 
                        class="w-full p-3 border border-slate-200 rounded-lg mb-4 bg-white text-slate-800 dark:bg-slate-900 dark:border-slate-600 dark:text-slate-100"
                        placeholder="Search applications..." 
                        onkeyup="searchApplications(this.value)"
                    >


                    <?php if ($alert1): ?>
                <div class="alert"
                    style="text-align:center; display: flex; justify-content: center; align-items: center; border:3px solid red; border-radius: 5px; color: red; padding: .2rem;  margin: .2rem; ">
                    <p>Ples enter the password..!</p>
                </div>
            <?php endif; ?>

            <?php if ($alert2): ?>
                <div class="alert"
                    style="text-align:center; display: flex; justify-content: center; align-items: center; border:3px solid #89E54C; border-radius: 5px; color: #89E54C; padding: .2rem;  margin: .2rem; ">
                    <p>Approve Successful..!</p>
                </div>
            <?php endif; ?>

            <?php if ($alert4): ?>
                <div class="alert"
                    style="text-align:center; display: flex; justify-content: center; align-items: center; border:3px solid red; border-radius: 5px; color: red; padding: .2rem;  margin: .2rem; ">
                    <p>This Student is Already Ptresent..!</p>
                </div>
            <?php endif; ?>

            <?php if ($alert5): ?>
                <div class="alert"
                    style="text-align:center; display: flex; justify-content: center; align-items: center; border:3px solid red; border-radius: 5px; color: red; padding: .2rem;  margin: .2rem; ">
                    <p>This Student Rejected Successful..!</p>
                </div>
            <?php endif; ?>

            <?php if ($alert6): ?>
                <div class="alert"
                    style="text-align:center; display: flex; justify-content: center; align-items: center; border:3px solid red; border-radius: 5px; color: red; padding: .2rem;  margin: .2rem; ">
                    <p>Email does not send..!</p>
                </div>
            <?php endif; ?>


                    
                    <div id="applicationsList">
                    <?php
                // applying students
                $sql = "SELECT *FROM applyingstudents";
                $result = mysqli_query($conn, $sql);


                while ($row = mysqli_fetch_array($result)) {
                    ?>
                    <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
                        <div class="p-4 border border-slate-200 rounded-lg mb-4 transition-all duration-300 hover:bg-slate-50 hover:border-primary-purple dark:border-slate-600 dark:hover:bg-slate-900">
                            <div class="flex justify-between items-center mb-2">
                                <span class="bg-primary-purple text-white px-3 py-1 rounded-full text-xs font-semibold"><?php echo $row['id']; ?></span>
                                <span class="bg-yellow-100 text-yellow-800 px-3 py-1 rounded-full text-xs font-semibold">Pending</span>
                            </div>

                            <div class="text-primary-purple font-semibold mb-2"><?php echo $row['name']; ?></div>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-2 text-sm">
                                <div class="text-slate-500 dark:text-slate-400"><span class="font-semibold text-slate-800 dark:text-slate-100">Email:</span> <?php echo $row['email']; ?></div>
                                <div class="text-slate-500 dark:text-slate-400"><span class="font-semibold text-slate-800 dark:text-slate-100">Phone:</span> +91 <?php echo $row['phone']; ?></div>
                                <div class="text-slate-500 dark:text-slate-400"><span class="font-semibold text-slate-800 dark:text-slate-100">Address:</span> <?php echo $row['address']; ?></div>
                                <div class="text-slate-500 dark:text-slate-400"><span class="font-semibold text-slate-800 dark:text-slate-100">Applied:</span> <?php echo $row['date']; ?></div>
                            </div>
                            <div>

                                <!-- Hidden fields to pass data -->
                                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                <input type="hidden" name="name" value="<?php echo $row['name']; ?>">
                                <input type="hidden" name="email" value="<?php echo $row['email']; ?>">
                                <input type="hidden" name="phone" value="<?php echo $row['phone']; ?>">
                                <input type="hidden" name="address" value="<?php echo $row['address']; ?>">
                                <!-- Hidden fields to pass data -->

                                <!-- password -->
                                <div class="detail-item">
                                    <span class="detail-label">Password:</span>
                                    <input
                                        style=" height:1.8rem; padding: .5rem; font-size: 1rem; border-radius: 5px; margin-top: .4rem;"
                                        type="text" name="password">
                                </div>
                            </div>

                            <div class="mt-4 flex gap-2">
                                <button name="approve" class="bg-primary-purple text-white border-none py-2 px-4 rounded-lg cursor-pointer transition-all duration-300 text-sm hover:bg-dark-purple">Approve</button>
                                <button name="reject" class="bg-transparent text-primary-purple border border-primary-purple py-2 px-4 rounded-lg cursor-pointer transition-all duration-300 text-sm hover:bg-primary-purple hover:text-white">Reject</button>
                            </div>
                        </div>
                        
                        </form>
                        <?php
                }
                ?>


                    </div>
                </div>
            </div>
        </div>

     
<?php include('admin_footer.php') ?>
