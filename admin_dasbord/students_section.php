<?php
include('database.php');
include('admin_header.php') ?>

<?php

$alert1 = false;
$alert2 = false;
$alert3 = false;
$alert4 = false;
$alert5 = false;
$alert6 = false;
$alert7 = false;
$alert8 = false;
$alert9 = false;
$alert10 = false;




if ($_SERVER['REQUEST_METHOD'] == 'POST') {


    // delete student
    if (isset($_POST['delete_student'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];

        $sql="DELETE FROM admittedstudent WHERE name='$name' AND email='$email'";
        mysqli_query($conn, $sql);
        $alert1=true;

    }


    // add student
    if (isset($_POST['add_student'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $number = $_POST['number'];
        $password = $_POST['password'];
        $address = $_POST['address'];
        if (empty($name) || empty($email) || empty($number) || empty($password) || empty($address)) {
            $alert2 = true;
        } else {
            $sql = "SELECT *FROM admittedstudent WHERE name='$name' AND email='$email'";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                $alert3 = true;
            } else {
                $sql = "INSERT INTO admittedstudent (name, email, phone, password, address) VALUES('$name','$email','$number','$password','$address')";
                mysqli_query($conn, $sql);
                $alert4 = true;
            }

        }
    }


    // update teachers password
    if (isset($_POST["update_student"])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $number = $_POST['number'];
        $old_password = $_POST['old_password'];
        $new_password = $_POST['new_password'];
        if (empty($name) || empty($email) || empty($number) || empty($old_password) || empty($new_password)){
            $alert5 = true;
        }
        else{
            $sql="SELECT *FROM admittedstudent WHERE name='$name' AND email='$email' AND password='$old_password'";
            $result= mysqli_query($conn, $sql);
            if(mysqli_num_rows($result)>0){
                $sql = "UPDATE admittedstudent SET password='$new_password' WHERE name='$name' AND email='$email' AND password='$old_password'";
                mysqli_query($conn, $sql);
                $alert7=true;
                
            }
            else{
                $alert6 = true;
            }
        }

    }


}

?>

<!-- Students Section -->
<div id="students-section" class="section-content p-8 ">
    <div
        class="bg-white rounded-xl shadow-lg border border-slate-200 overflow-hidden transition-all duration-300 dark:bg-slate-800 dark:border-slate-600">
        <div class="px-6 py-4 bg-primary-purple text-white font-semibold text-lg flex justify-between items-center">
            <span>🎓 Current Students</span>
            <button
                class="bg-white text-primary-purple px-4 py-2 rounded-lg text-sm font-semibold hover:bg-slate-100 transition-all duration-300">
                Export List
            </button>
        </div>
        <div
            class="p-6 max-h-96 overflow-y-auto scrollbar-thin scrollbar-thumb-primary-purple scrollbar-track-slate-100 dark:scrollbar-track-slate-700">
            <input type="text"
                class="w-full p-3 border border-slate-200 rounded-lg mb-4 bg-white text-slate-800 dark:bg-slate-900 dark:border-slate-600 dark:text-slate-100"
                placeholder="Search current students..." onkeyup="searchStudents(this.value)">
                <?php if ($alert1): ?>
                        <div class="alert"
                            style="text-align:center; display: flex; justify-content: center; align-items: center; border:3px solid red; border-radius: 5px; color: red; padding: .2rem;  margin: .2rem; ">
                            <p>Delete Successful..!</p>
                        </div>
                    <?php endif; ?>
            <div id="studentsList" class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-4">
                <?php

                // admitted student
                $sql = "SELECT *FROM admittedstudent";
                $result = mysqli_query($conn, $sql);


                while ($row = (mysqli_fetch_assoc($result))) {
                    ?>
                    <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
                    <div
                        class="p-4 border border-slate-200 rounded-lg transition-all duration-300 hover:bg-slate-50 hover:border-primary-purple dark:border-slate-600 dark:hover:bg-slate-900">
                        <div class="flex justify-between items-center mb-2">
                            <span
                                class="bg-primary-purple text-white px-3 py-1 rounded-full text-xs font-semibold"><?php echo $row['id']; ?></span>
                            <div>

                                <span
                                    class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-xs font-semibold">Active</span>
                                <span class="bg-red-100 text-red-800 px-3 py-1 rounded-full text-xs font-semibold"><button
                                        name="delete_student">Delete</button></span>


                            </div>

                        </div>
                        
                        <div class="text-primary-purple font-semibold mb-2"><?php echo $row['name']; ?></div>
                        <div class="space-y-1 text-sm">
                            <div class="text-slate-500 dark:text-slate-400"><span
                                    class="font-semibold text-slate-800 dark:text-slate-100">Email:</span>
                                <?php echo $row['email']; ?></div>

                            <div class="text-slate-500 dark:text-slate-400"><span
                                    class="font-semibold text-slate-800 dark:text-slate-100">Phone:</span> +91
                                <?php echo $row['phone']; ?>
                            </div>

                            <div class="text-slate-500 dark:text-slate-400"><span
                                    class="font-semibold text-slate-800 dark:text-slate-100">Password:</span>
                                <?php echo $row['password']; ?></div>

                            <div class="text-slate-500 dark:text-slate-400"><span
                                    class="font-semibold text-slate-800 dark:text-slate-100">Address:</span>
                                <?php echo $row['address']; ?></div>

                            <div class="text-slate-500 dark:text-slate-400"><span
                                    class="font-semibold text-slate-800 dark:text-slate-100">Date:</span>
                                <?php echo $row['date']; ?></div>

                            <div class="text-slate-500 dark:text-slate-400"><span
                                    class="font-semibold text-slate-800 dark:text-slate-100">Major:</span> Computer Science
                            </div>
                            <div class="text-slate-500 dark:text-slate-400"><span
                                    class="font-semibold text-slate-800 dark:text-slate-100">Year:</span> Sophomore</div>
                        </div>



                        <input name="name" type="text" value="<?php echo $row['name']; ?>" hidden>
                        <input name="email" type="email" value="<?php echo $row['email']; ?>" hidden>
                        
                    </div>
                    </form>
                    <?php
                }
                ?>

            </div>
        </div>
    </div>



    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- add teachers -->
        <div
            class="mt-6 bg-white rounded-xl shadow-lg border border-slate-200 p-6 dark:bg-slate-800 dark:border-slate-600">
            <h3 class="text-lg font-semibold text-primary-purple mb-4">👨‍🏫 Add Student</h3>
            <div class="space-y-4">
                <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
                    <?php if ($alert2): ?>
                        <div class="alert"
                            style="text-align:center; display: flex; justify-content: center; align-items: center; border:3px solid red; border-radius: 5px; color: red; padding: .2rem;  margin: .2rem; ">
                            <p>Ples enter all the data..!</p>
                        </div>
                    <?php endif; ?>

                    <?php if ($alert3): ?>
                        <div class="alert"
                            style="text-align:center; display: flex; justify-content: center; align-items: center; border:3px solid red; border-radius: 5px; color: red; padding: .2rem;  margin: .2rem; ">
                            <p>This Teacher is Already Ptresent..! OR Enter curect data..!</p>
                        </div>
                    <?php endif; ?> 

                    <?php if ($alert4): ?>
                        <div class="alert"
                            style="text-align:center; display: flex; justify-content: center; align-items: center; border:3px solid #89E54C; border-radius: 5px; color: #89E54C; padding: .2rem;  margin: .2rem; ">
                            <p>Add Successful..!</p>
                        </div>
                    <?php endif; ?>

                    <div>
                        <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-2">Name:</label>
                        <input name="name" type="text"
                            class="w-full p-3 border border-slate-200 rounded-lg bg-white dark:bg-slate-900 dark:border-slate-600 dark:text-slate-100">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-2">Email</label>
                        <input name="email" type="email"
                            class="w-full p-3 border border-slate-200 rounded-lg bg-white dark:bg-slate-900 dark:border-slate-600 dark:text-slate-100">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-2">Phone
                            no:</label>
                        <input name="number" type="number"
                            class="w-full p-3 border border-slate-200 rounded-lg bg-white dark:bg-slate-900 dark:border-slate-600 dark:text-slate-100">
                    </div>
                    <div>
                        <label
                            class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-2">Password:</label>
                        <input name="password" type="password"
                            class="w-full p-3 border border-slate-200 rounded-lg bg-white dark:bg-slate-900 dark:border-slate-600 dark:text-slate-100">
                    </div>
                    <div>
                        <label
                            class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-2">Address:</label>
                        <input name="address" type="text"
                            class="w-full p-3 border border-slate-200 rounded-lg bg-white dark:bg-slate-900 dark:border-slate-600 dark:text-slate-100">
                    </div>
                    <button name="add_student"
                        class="mt-5 w-full bg-red-500 text-white py-3 px-4 rounded-lg hover:bg-red-600 transition-all duration-300">
                        Add Teacher
                    </button>
                </form>
            </div>
        </div>

        <!-- update teachers -->
        <div
            class="mt-6 bg-white rounded-xl shadow-lg border border-slate-200 p-6 dark:bg-slate-800 dark:border-slate-600">
            <h3 class="text-lg font-semibold text-primary-purple mb-4">👨‍🏫 Update Student</h3>
            <div class="space-y-4">
                <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
                    <?php if ($alert5): ?>
                        <div class="alert"
                            style="text-align:center; display: flex; justify-content: center; align-items: center; border:3px solid red; border-radius: 5px; color: red; padding: .2rem;  margin: .2rem; ">
                            <p>Ples enter all the data..!</p>
                        </div>
                    <?php endif; ?>

                    <?php if ($alert6): ?>
                        <div class="alert"
                            style="text-align:center; display: flex; justify-content: center; align-items: center; border:3px solid red; border-radius: 5px; color: red; padding: .2rem;  margin: .2rem; ">
                            <p>This Student Doesnot Ptresent..! OR Enter curect data..!</p>
                        </div>
                    <?php endif; ?>

                    <?php if ($alert7): ?>
                        <div class="alert"
                            style="text-align:center; display: flex; justify-content: center; align-items: center; border:3px solid #89E54C; border-radius: 5px; color: #89E54C; padding: .2rem;  margin: .2rem; ">
                            <p>Update Successful..!</p>
                        </div>
                    <?php endif; ?>

                    <div>
                        <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-2">Name:</label>
                        <input name="name" type="text"
                            class="w-full p-3 border border-slate-200 rounded-lg bg-white dark:bg-slate-900 dark:border-slate-600 dark:text-slate-100">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-2">Email</label>
                        <input name="email" type="email"
                            class="w-full p-3 border border-slate-200 rounded-lg bg-white dark:bg-slate-900 dark:border-slate-600 dark:text-slate-100">
                    </div>
                    <div>
                        <label
                            class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-2">Phone:</label>
                        <input name="number" type="text"
                            class="w-full p-3 border border-slate-200 rounded-lg bg-white dark:bg-slate-900 dark:border-slate-600 dark:text-slate-100">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-2">Old
                            Password:</label>
                        <input name="old_password" type="password"
                            class="w-full p-3 border border-slate-200 rounded-lg bg-white dark:bg-slate-900 dark:border-slate-600 dark:text-slate-100">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-2">New
                            Password:</label>
                        <input name="new_password" type="password"
                            class="w-full p-3 border border-slate-200 rounded-lg bg-white dark:bg-slate-900 dark:border-slate-600 dark:text-slate-100">
                    </div>
                    <button name="update_student"
                        class="mt-5 w-full bg-red-500 text-white py-3 px-4 rounded-lg hover:bg-red-600 transition-all duration-300">
                        Update Teacher
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include('admin_footer.php') ?>