<?php
include("database.php");

// session start
session_start();
if (empty($_SESSION['username']) and empty($_SESSION['password'])) {
    header('Location: ./admin_login.php');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // log out
    if (isset($_POST['log_out'])) {
        session_destroy();
        header('Location: admin_login.php');
    }

}

// gate path
$path= substr($_SERVER['SCRIPT_NAME'], strrpos($_SERVER['SCRIPT_NAME'],"/")+1); 

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher's Admin Panel - College Management</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'primary-purple': '#6366f1',
                        'light-purple': '#a5b4fc',
                        'dark-purple': '#4338ca',
                    }
                }
            },
            darkMode: 'class'
        }
    </script>
</head>

<body
    class="font-sans leading-relaxed bg-gray-50 text-slate-800 transition-all duration-300 dark:bg-slate-900 dark:text-slate-100">
    <!-- Mobile Backdrop -->
    <div id="backdrop" class="fixed inset-0 bg-black bg-opacity-50 z-30 hidden lg:hidden"></div>

    <!-- Sidebar -->
    <div id="sidebar"
        class="fixed left-0 top-0 h-full w-64 bg-white shadow-xl border-r-2 border-primary-purple transition-transform duration-300 z-40 dark:bg-slate-800 dark:shadow-slate-700/50 transform -translate-x-full lg:translate-x-0">
        <div class="p-6 border-b border-slate-200 dark:border-slate-600">
            <div class="text-xl font-bold text-primary-purple flex items-center gap-2">
                🎓 College Admin
            </div>
            <div class="text-sm text-slate-500 dark:text-slate-400 mt-1">Management System</div>
        </div>

        <nav class="p-4">
            <ul class="space-y-2">
                <li>
                    <a href="admin_home.php">
                        <button
                            class=" <?php if ($path == 'admin_home.php') {echo "bg-primary-purple text-white";} else{echo"";}  ?> nav-item w-full text-left p-3 rounded-lg transition-all duration-300 hover:bg-primary-purple hover:text-white flex items-center gap-3 text-slate-700 dark:text-slate-300">
                            <span class="text-lg">📊</span>
                            <span>Dashboard</span>
                        </button>
                    </a>

                </li>
                <li>
                    <a href="teachers_section.php">
                        <button
                            class=" <?php if ($path == 'teachers_section.php') {echo "bg-primary-purple text-white";} else{echo"";}  ?> nav-item w-full text-left p-3 rounded-lg transition-all duration-300 hover:bg-primary-purple hover:text-white flex items-center gap-3 text-slate-700 dark:text-slate-300">
                            <span class="text-lg">👨‍🏫</span>
                            <span>Teachers</span>
                        </button>
                    </a>

                </li>
                <li>
                    <a href="applications_section.php">
                        <button
                            class=" <?php if ($path == 'applications_section.php') {echo "bg-primary-purple text-white";} else{echo"";}  ?> nav-item w-full text-left p-3 rounded-lg transition-all duration-300 hover:bg-primary-purple hover:text-white flex items-center gap-3 text-slate-700 dark:text-slate-300">
                            <span class="text-lg">📋</span>
                            <span>Applications</span>
                        </button>
                    </a>

                </li>
                <li>
                    <a href="students_section.php">
                        <button
                            class=" <?php if ($path == 'students_section.php') {echo "bg-primary-purple text-white";} else{echo"";}  ?> nav-item w-full text-left p-3 rounded-lg transition-all duration-300 hover:bg-primary-purple hover:text-white flex items-center gap-3 text-slate-700 dark:text-slate-300">
                            <span class="text-lg">🎓</span>
                            <span>Students</span>
                        </button>
                    </a>

                </li>
                <li>
                    <a href="reports_section.php">
                        <button
                            class=" <?php if ($path == 'reports_section.php') {echo "bg-primary-purple text-white";} else{echo"";}  ?> nav-item w-full text-left p-3 rounded-lg transition-all duration-300 hover:bg-primary-purple hover:text-white flex items-center gap-3 text-slate-700 dark:text-slate-300">
                            <span class="text-lg">📈</span>
                            <span>Reports</span>
                        </button>
                    </a>

                </li>
                <li>
                    <a href="settings_section.php">
                        <button
                        
                            class=" <?php if ($path == 'settings_section.php') {echo "bg-primary-purple text-white";} else{echo"";}  ?> nav-item w-full text-left p-3 rounded-lg transition-all duration-300 hover:bg-primary-purple hover:text-white flex items-center gap-3 text-slate-700 dark:text-slate-300">
                            <span class="text-lg">⚙️</span>
                            <span>Settings</span>
                            
                        </button>
                    </a>

                </li>
            </ul>
        </nav>

        <div class="absolute bottom-4 left-4 right-4">
            <div class="p-3 bg-slate-100 dark:bg-slate-700 rounded-lg flex justify-around">
                <div>
                    <div class="text-sm font-semibold text-slate-800 dark:text-slate-200">Mr.
                        <?php echo $_SESSION['username'] ?></div>
                    <div class="text-xs text-slate-500 dark:text-slate-400">Administrator</div>
                </div>

                <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
                    <input type="submit" class="bg-primary-purple p-3 rounded-md text-white font-medium" value="Log out"
                        name="log_out">
                </form>
                <!-- <input type="text"> -->
            </div>
        </div>
    </div>

    <!-- Sidebar Toggle Button (Mobile) -->
    <button id="sidebarToggle"
        class="fixed top-4 left-4 z-50 lg:hidden bg-primary-purple text-white p-2 rounded-lg shadow-lg">
        <span class="text-xl">☰</span>
    </button>

    <!-- Main Content Area -->
    <div class="lg:ml-64 transition-all duration-300" id="mainContent">
        <!-- Header -->
        <header
            class="bg-white shadow-sm sticky top-0 z-30 border-b-2 border-primary-purple transition-all duration-300 dark:bg-slate-800 dark:shadow-slate-700/30">
            <div class="flex justify-between items-center px-8 py-4">
                <div class="flex items-center gap-4">
                    <h1 id="pageTitle" class="text-2xl font-bold text-primary-purple">Dashboard</h1>
                </div>
                <div class="flex items-center gap-4">

                    <button
                        class="bg-transparent border-2 border-primary-purple text-primary-purple w-10 h-10 rounded-full cursor-pointer flex items-center justify-center transition-all duration-300 hover:bg-primary-purple hover:text-white"
                        onclick="toggleTheme()" title="Toggle Dark/Light Mode">
                        <span id="themeIcon">🌙</span>
                    </button>
                </div>
            </div>
        </header>