 
 <?php
  include('admin_header.php') 
?>

 <!-- Dashboard Section -->
        <div id="dashboard-section" class="section-content p-8">
            <!-- Statistics Overview -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <div class="bg-white p-6 rounded-xl shadow-lg border border-slate-200 transition-all duration-300 hover:-translate-y-1 hover:shadow-xl hover:shadow-primary-purple/20 dark:bg-slate-800 dark:border-slate-600">
                    <div class="flex items-center gap-2 mb-4">
                        <div class="w-10 h-10 bg-light-purple rounded-lg flex items-center justify-center text-primary-purple">👥</div>
                        <div class="font-semibold text-slate-500 dark:text-slate-400">Total Teachers</div>
                    </div>
                    <div class="text-3xl font-bold text-primary-purple">24</div>
                </div>
                
                <div class="bg-white p-6 rounded-xl shadow-lg border border-slate-200 transition-all duration-300 hover:-translate-y-1 hover:shadow-xl hover:shadow-primary-purple/20 dark:bg-slate-800 dark:border-slate-600">
                    <div class="flex items-center gap-2 mb-4">
                        <div class="w-10 h-10 bg-light-purple rounded-lg flex items-center justify-center text-primary-purple">📋</div>
                        <div class="font-semibold text-slate-500 dark:text-slate-400">Pending Applications</div>
                    </div>
                    <div class="text-3xl font-bold text-primary-purple">
                    <?php
                // applying students
                $sql = "SELECT *FROM applyingstudents";
                $result = mysqli_query($conn, $sql);
                echo mysqli_num_rows($result);
                ?>
                    </div>
                </div>
                
                <div class="bg-white p-6 rounded-xl shadow-lg border border-slate-200 transition-all duration-300 hover:-translate-y-1 hover:shadow-xl hover:shadow-primary-purple/20 dark:bg-slate-800 dark:border-slate-600">
                    <div class="flex items-center gap-2 mb-4">
                        <div class="w-10 h-10 bg-light-purple rounded-lg flex items-center justify-center text-primary-purple">🎓</div>
                        <div class="font-semibold text-slate-500 dark:text-slate-400">Current Students</div>
                    </div>
                    <div class="text-3xl font-bold text-primary-purple">
                    <?php
                // admitted students
                $sql = "SELECT *FROM admittedstudent";
                $result = mysqli_query($conn, $sql);
                echo mysqli_num_rows($result);
                // echo $result;
                ?>
                    </div>
                </div>
                
                <div class="bg-white p-6 rounded-xl shadow-lg border border-slate-200 transition-all duration-300 hover:-translate-y-1 hover:shadow-xl hover:shadow-primary-purple/20 dark:bg-slate-800 dark:border-slate-600">
                    <div class="flex items-center gap-2 mb-4">
                        <div class="w-10 h-10 bg-light-purple rounded-lg flex items-center justify-center text-primary-purple">📊</div>
                        <div class="font-semibold text-slate-500 dark:text-slate-400">This Month Admissions</div>
                    </div>
                    <div class="text-3xl font-bold text-primary-purple">28</div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                <button onclick="showSection('reports')" class="bg-gradient-to-r from-primary-purple to-dark-purple text-white p-4 rounded-xl border-none cursor-pointer transition-all duration-300 hover:scale-105 hover:shadow-lg">
                    <div class="text-2xl mb-2">📝</div>
                    <div class="font-semibold">Generate Reports</div>
                </button>
                
                <button class="bg-gradient-to-r from-primary-purple to-dark-purple text-white p-4 rounded-xl border-none cursor-pointer transition-all duration-300 hover:scale-105 hover:shadow-lg">
                    <div class="text-2xl mb-2">📧</div>
                    <div class="font-semibold">Send Notifications</div>
                </button>
                
                <button class="bg-gradient-to-r from-primary-purple to-dark-purple text-white p-4 rounded-xl border-none cursor-pointer transition-all duration-300 hover:scale-105 hover:shadow-lg">
                    <div class="text-2xl mb-2">📊</div>
                    <div class="font-semibold">Analytics Dashboard</div>
                </button>
                
                <button onclick="showSection('settings')" class="bg-gradient-to-r from-primary-purple to-dark-purple text-white p-4 rounded-xl border-none cursor-pointer transition-all duration-300 hover:scale-105 hover:shadow-lg">
                    <div class="text-2xl mb-2">⚙️</div>
                    <div class="font-semibold">System Settings</div>
                </button>
            </div>
        </div>
<?php include('admin_footer.php') ?>