<?php
include('database.php'); 
include('admin_header.php');

?>
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

    // delete teachers
    if(isset($_POST['delete_teacher'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
       
        $sql="DELETE FROM teachers WHERE name='$name' AND email='$email'";
        $result = mysqli_query($conn,$sql);
        $alert10=true;
    }

    // add teachers form
    if (isset($_POST['add_teacher'])) {

        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['number'];
        $department = $_POST['department'];
        $password = $_POST['password'];

        if (empty($name) || empty($email) || empty($phone) || empty($department) || empty($password) ) {
            $alert1 = true;
        } else {
            try {
                $sql = "INSERT INTO teachers (name, email, phone, department, password) VALUES('$name', '$email', '$phone', '$department', '$password')";
                $result = mysqli_query($conn, $sql);
                $alert2 = true;
                
            } catch (mysqli_sql_exception) {
                $alert3 = true;
            }
        }
    }

    // update teachers password
    if (isset($_POST["update_teacher"])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $department = $_POST['department'];
        $old_password = $_POST['old_password'];
        $new_password = $_POST['new_password'];
        if (empty($name) || empty($email) || empty($department) || empty($old_password) || empty($new_password)){
            $alert4 = true;
        }
        else{
            $sql="SELECT *FROM teachers WHERE name='$name' AND email='$email' AND password='$old_password'";
            $result= mysqli_query($conn, $sql);
            if(mysqli_num_rows($result)>0){
                $sql = "UPDATE teachers SET password='$new_password' WHERE name='$name' AND email='$email' AND password='$old_password'";
                mysqli_query($conn, $sql);
                $alert5=true;
                
            }
            else{
                $alert6 = true;
            }
        }

    }

}






?>
<!-- Teachers Section -->
<div class="section-content p-8 ">

    <div
        class="bg-white rounded-xl shadow-lg border border-slate-200 overflow-hidden transition-all duration-300 dark:bg-slate-800 dark:border-slate-600">
        <div class="px-6 py-4 bg-primary-purple text-white font-semibold text-lg flex justify-between items-center">
            <span>👨‍🏫 Teachers Management</span>
            <button
                class="bg-white text-primary-purple px-4 py-2 rounded-lg text-sm font-semibold hover:bg-slate-100 transition-all duration-300">
                Add New Teacher
            </button>
        </div>
        <div
            class="p-6 max-h-96 overflow-y-auto scrollbar-thin scrollbar-thumb-primary-purple scrollbar-track-slate-100 dark:scrollbar-track-slate-700">
            <?php if ($alert10): ?>
                        <div class="alert"
                            style="text-align:center; display: flex; justify-content: center; align-items: center; border:3px solid red; border-radius: 5px; color: red; padding: .2rem;  margin: .2rem; ">
                            <p>Delete Successful..!</p>
                        </div>
                    <?php endif; ?>
            <input type="text"
                class="w-full p-3 border border-slate-200 rounded-lg mb-4 bg-white text-slate-800 dark:bg-slate-900 dark:border-slate-600 dark:text-slate-100"
                placeholder="Search teachers..." onkeyup="searchTeachers(this.value)">

            <div id="teachersList">
                <?php
                $sql = "SELECT * FROM teachers";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($result)) {

                    ?>
                    <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
                    <div
                        class="flex items-center gap-4 p-4 border border-slate-200 rounded-lg mb-4 transition-all duration-300 hover:bg-slate-50 hover:translate-x-1 dark:border-slate-600 dark:hover:bg-slate-900">
                        <div
                            class="w-15 h-15 rounded-full bg-light-purple flex items-center justify-center text-primary-purple font-bold text-xl">
                            JD</div>
                        <div class="teacher-info flex-1">
                            <h4 class="text-primary-purple font-semibold mb-1">Dr. <?php echo $row['name']; ?></h4>
                            <p class="text-slate-500 text-sm dark:text-slate-400">📧 <?php echo $row['email']; ?></p>
                            <p class="text-slate-500 text-sm dark:text-slate-400">📱 +91 <?php echo $row['phone']; ?></p>
                            <p class="text-slate-500 text-sm dark:text-slate-400">🏫 <?php echo $row['department']; ?></p>
                        </div>

                        <!-- hidden form -->
                        <input type="hidden" name="name" value="<?php echo $row['name']; ?>">
                        <input type="hidden" name="email" value="<?php echo $row['email']; ?>">
                       
                        <div class="flex gap-2">
                            <button
                                class="bg-primary-purple text-white px-3 py-1 rounded text-sm hover:bg-dark-purple transition-all duration-300">Edit</button>
                            <button name="delete_teacher"
                                class="bg-red-500 text-white px-3 py-1 rounded text-sm hover:bg-red-600 transition-all duration-300">Delete</button>
                        </div>
                    </div>
                    </form>
                <?php } ?>


            </div>
        </div>
    </div>
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- add teachers -->
        <div
            class="mt-6 bg-white rounded-xl shadow-lg border border-slate-200 p-6 dark:bg-slate-800 dark:border-slate-600">
            <h3 class="text-lg font-semibold text-primary-purple mb-4">👨‍🏫 Add Teachers</h3>
            <div class="space-y-4">
                <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
                    <?php if ($alert1): ?>
                        <div class="alert"
                            style="text-align:center; display: flex; justify-content: center; align-items: center; border:3px solid red; border-radius: 5px; color: red; padding: .2rem;  margin: .2rem; ">
                            <p>Ples enter all the data..!</p>
                        </div>
                    <?php endif; ?>

                    <?php if ($alert2): ?>
                        <div class="alert"
                            style="text-align:center; display: flex; justify-content: center; align-items: center; border:3px solid #89E54C; border-radius: 5px; color: #89E54C; padding: .2rem;  margin: .2rem; ">
                            <p>Add Successful..!</p>
                        </div>
                    <?php endif; ?>

                    <?php if ($alert3): ?>
                        <div class="alert"
                            style="text-align:center; display: flex; justify-content: center; align-items: center; border:3px solid red; border-radius: 5px; color: red; padding: .2rem;  margin: .2rem; ">
                            <p>This Teacher is Already Ptresent..! OR Enter curect data..!</p>
                        </div>
                    <?php endif; ?>

                    <?php if ($alert9): ?>
                        <div class="alert"
                            style="text-align:center; display: flex; justify-content: center; align-items: center; border:3px solid red; border-radius: 5px; color: red; padding: .2rem;  margin: .2rem; ">
                            <p>Does not add..!</p>
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
                            class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-2">Department:</label>
                        <input name="department" type="text"
                            class="w-full p-3 border border-slate-200 rounded-lg bg-white dark:bg-slate-900 dark:border-slate-600 dark:text-slate-100">
                    </div>
                    <div>
                        <label
                            class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-2">Password:</label>
                        <input name="password" type="password"
                            class="w-full p-3 border border-slate-200 rounded-lg bg-white dark:bg-slate-900 dark:border-slate-600 dark:text-slate-100">
                    </div>
                    <button name="add_teacher"
                        class="mt-5 w-full bg-red-500 text-white py-3 px-4 rounded-lg hover:bg-red-600 transition-all duration-300">
                        Add Teacher
                    </button>
                </form>
            </div>
        </div>

        <!-- update teachers -->
        <div
            class="mt-6 bg-white rounded-xl shadow-lg border border-slate-200 p-6 dark:bg-slate-800 dark:border-slate-600">
            <h3 class="text-lg font-semibold text-primary-purple mb-4">👨‍🏫 Update Teachers</h3>
            <div class="space-y-4">
                <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
                    <?php if ($alert4): ?>
                        <div class="alert"
                            style="text-align:center; display: flex; justify-content: center; align-items: center; border:3px solid red; border-radius: 5px; color: red; padding: .2rem;  margin: .2rem; ">
                            <p>Ples enter all the data..!</p>
                        </div>
                    <?php endif; ?>

                    <?php if ($alert5): ?>
                        <div class="alert"
                            style="text-align:center; display: flex; justify-content: center; align-items: center; border:3px solid #89E54C; border-radius: 5px; color: #89E54C; padding: .2rem;  margin: .2rem; ">
                            <p>Update Successful..!</p>
                        </div>
                    <?php endif; ?>

                    <?php if ($alert6): ?>
                        <div class="alert"
                            style="text-align:center; display: flex; justify-content: center; align-items: center; border:3px solid red; border-radius: 5px; color: red; padding: .2rem;  margin: .2rem; ">
                            <p>This Teacher Doesnot Exjist..!</p>
                        </div>
                    <?php endif; ?>

                    <?php if ($alert7): ?>
                        <div class="alert"
                            style="text-align:center; display: flex; justify-content: center; align-items: center; border:3px solid red; border-radius: 5px; color: red; padding: .2rem;  margin: .2rem; ">
                            <p>Enter curect data..!</p>
                        </div>
                    <?php endif; ?>
                    <?php if ($alert8): ?>
                        <div class="alert"
                            style="text-align:center; display: flex; justify-content: center; align-items: center; border:3px solid red; border-radius: 5px; color: red; padding: .2rem;  margin: .2rem; ">
                            <p>Email does not send..!</p>
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
                        <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-2">Department:</label>
                        <input name="department" type="text"
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
                    <button name="update_teacher"
                        class="mt-5 w-full bg-red-500 text-white py-3 px-4 rounded-lg hover:bg-red-600 transition-all duration-300">
                        Update Teacher
                    </button>
                </form>
            </div>
        </div>
    </div>

</div>


<?php include('admin_footer.php') ?>