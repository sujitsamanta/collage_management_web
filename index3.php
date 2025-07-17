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
<body class="font-sans leading-relaxed bg-gray-50 text-slate-800 transition-all duration-300 dark:bg-slate-900 dark:text-slate-100">
    <!-- Sidebar -->
    <div id="sidebar" class="fixed left-0 top-0 h-full w-64 bg-white shadow-xl border-r-2 border-primary-purple transition-all duration-300 z-40 dark:bg-slate-800 dark:shadow-slate-700/50">
        <div class="p-6 border-b border-slate-200 dark:border-slate-600">
            <div class="text-xl font-bold text-primary-purple flex items-center gap-2">
                🎓 College Admin
            </div>
            <div class="text-sm text-slate-500 dark:text-slate-400 mt-1">Management System</div>
        </div>
        
        <nav class="p-4">
            <ul class="space-y-2">
                <li>
                    <button onclick="showSection('dashboard')" class="nav-item w-full text-left p-3 rounded-lg transition-all duration-300 hover:bg-primary-purple hover:text-white flex items-center gap-3 text-slate-700 dark:text-slate-300">
                        <span class="text-lg">📊</span>
                        <span>Dashboard</span>
                    </button>
                </li>
                <li>
                    <button onclick="showSection('teachers')" class="nav-item w-full text-left p-3 rounded-lg transition-all duration-300 hover:bg-primary-purple hover:text-white flex items-center gap-3 text-slate-700 dark:text-slate-300">
                        <span class="text-lg">👨‍🏫</span>
                        <span>Teachers</span>
                    </button>
                </li>
                <li>
                    <button onclick="showSection('applications')" class="nav-item w-full text-left p-3 rounded-lg transition-all duration-300 hover:bg-primary-purple hover:text-white flex items-center gap-3 text-slate-700 dark:text-slate-300">
                        <span class="text-lg">📋</span>
                        <span>Applications</span>
                    </button>
                </li>
                <li>
                    <button onclick="showSection('students')" class="nav-item w-full text-left p-3 rounded-lg transition-all duration-300 hover:bg-primary-purple hover:text-white flex items-center gap-3 text-slate-700 dark:text-slate-300">
                        <span class="text-lg">🎓</span>
                        <span>Students</span>
                    </button>
                </li>
                <li>
                    <button onclick="showSection('reports')" class="nav-item w-full text-left p-3 rounded-lg transition-all duration-300 hover:bg-primary-purple hover:text-white flex items-center gap-3 text-slate-700 dark:text-slate-300">
                        <span class="text-lg">📈</span>
                        <span>Reports</span>
                    </button>
                </li>
                <li>
                    <button onclick="showSection('settings')" class="nav-item w-full text-left p-3 rounded-lg transition-all duration-300 hover:bg-primary-purple hover:text-white flex items-center gap-3 text-slate-700 dark:text-slate-300">
                        <span class="text-lg">⚙️</span>
                        <span>Settings</span>
                    </button>
                </li>
            </ul>
        </nav>
        
        <div class="absolute bottom-4 left-4 right-4">
            <div class="p-3 bg-slate-100 dark:bg-slate-700 rounded-lg">
                <div class="text-sm font-semibold text-slate-800 dark:text-slate-200">Prof. Johnson</div>
                <div class="text-xs text-slate-500 dark:text-slate-400">Administrator</div>
            </div>
        </div>
    </div>

    <!-- Sidebar Toggle Button (Mobile) -->
    <button id="sidebarToggle" class="fixed top-4 left-4 z-50 lg:hidden bg-primary-purple text-white p-2 rounded-lg shadow-lg">
        <span class="text-xl">☰</span>
    </button>

    <!-- Main Content Area -->
    <div class="ml-64 transition-all duration-300" id="mainContent">
        <!-- Header -->
        <header class="bg-white shadow-sm sticky top-0 z-30 border-b-2 border-primary-purple transition-all duration-300 dark:bg-slate-800 dark:shadow-slate-700/30">
            <div class="flex justify-between items-center px-8 py-4">
                <div class="flex items-center gap-4">
                    <h1 id="pageTitle" class="text-2xl font-bold text-primary-purple">Dashboard</h1>
                </div>
                <div class="flex items-center gap-4">
                    <button 
                        class="bg-transparent border-2 border-primary-purple text-primary-purple w-10 h-10 rounded-full cursor-pointer flex items-center justify-center transition-all duration-300 hover:bg-primary-purple hover:text-white"
                        onclick="toggleTheme()" 
                        title="Toggle Dark/Light Mode"
                    >
                        <span id="themeIcon">🌙</span>
                    </button>
                </div>
            </div>
        </header>

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
                    <div class="text-3xl font-bold text-primary-purple">15</div>
                </div>
                
                <div class="bg-white p-6 rounded-xl shadow-lg border border-slate-200 transition-all duration-300 hover:-translate-y-1 hover:shadow-xl hover:shadow-primary-purple/20 dark:bg-slate-800 dark:border-slate-600">
                    <div class="flex items-center gap-2 mb-4">
                        <div class="w-10 h-10 bg-light-purple rounded-lg flex items-center justify-center text-primary-purple">🎓</div>
                        <div class="font-semibold text-slate-500 dark:text-slate-400">Current Students</div>
                    </div>
                    <div class="text-3xl font-bold text-primary-purple">342</div>
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

        <!-- Teachers Section -->
        <div id="teachers-section" class="section-content p-8 hidden">
            <div class="bg-white rounded-xl shadow-lg border border-slate-200 overflow-hidden transition-all duration-300 dark:bg-slate-800 dark:border-slate-600">
                <div class="px-6 py-4 bg-primary-purple text-white font-semibold text-lg flex justify-between items-center">
                    <span>👨‍🏫 Teachers Management</span>
                    <button class="bg-white text-primary-purple px-4 py-2 rounded-lg text-sm font-semibold hover:bg-slate-100 transition-all duration-300">
                        Add New Teacher
                    </button>
                </div>
                <div class="p-6 max-h-96 overflow-y-auto scrollbar-thin scrollbar-thumb-primary-purple scrollbar-track-slate-100 dark:scrollbar-track-slate-700">
                    <input 
                        type="text" 
                        class="w-full p-3 border border-slate-200 rounded-lg mb-4 bg-white text-slate-800 dark:bg-slate-900 dark:border-slate-600 dark:text-slate-100"
                        placeholder="Search teachers..." 
                        onkeyup="searchTeachers(this.value)"
                    >
                    
                    <div id="teachersList">
                        <div class="flex items-center gap-4 p-4 border border-slate-200 rounded-lg mb-4 transition-all duration-300 hover:bg-slate-50 hover:translate-x-1 dark:border-slate-600 dark:hover:bg-slate-900">
                            <div class="w-15 h-15 rounded-full bg-light-purple flex items-center justify-center text-primary-purple font-bold text-xl">JD</div>
                            <div class="teacher-info flex-1">
                                <h4 class="text-primary-purple font-semibold mb-1">Dr. John Davis</h4>
                                <p class="text-slate-500 text-sm dark:text-slate-400">📧 john.davis@college.edu</p>
                                <p class="text-slate-500 text-sm dark:text-slate-400">📱 +1 (555) 123-4567</p>
                                <p class="text-slate-500 text-sm dark:text-slate-400">🏫 Computer Science Dept.</p>
                            </div>
                            <div class="flex gap-2">
                                <button class="bg-primary-purple text-white px-3 py-1 rounded text-sm hover:bg-dark-purple transition-all duration-300">Edit</button>
                                <button class="bg-red-500 text-white px-3 py-1 rounded text-sm hover:bg-red-600 transition-all duration-300">Delete</button>
                            </div>
                        </div>
                        
                        <div class="flex items-center gap-4 p-4 border border-slate-200 rounded-lg mb-4 transition-all duration-300 hover:bg-slate-50 hover:translate-x-1 dark:border-slate-600 dark:hover:bg-slate-900">
                            <div class="w-15 h-15 rounded-full bg-light-purple flex items-center justify-center text-primary-purple font-bold text-xl">SM</div>
                            <div class="teacher-info flex-1">
                                <h4 class="text-primary-purple font-semibold mb-1">Dr. Sarah Miller</h4>
                                <p class="text-slate-500 text-sm dark:text-slate-400">📧 sarah.miller@college.edu</p>
                                <p class="text-slate-500 text-sm dark:text-slate-400">📱 +1 (555) 234-5678</p>
                                <p class="text-slate-500 text-sm dark:text-slate-400">🏫 Mathematics Dept.</p>
                            </div>
                            <div class="flex gap-2">
                                <button class="bg-primary-purple text-white px-3 py-1 rounded text-sm hover:bg-dark-purple transition-all duration-300">Edit</button>
                                <button class="bg-red-500 text-white px-3 py-1 rounded text-sm hover:bg-red-600 transition-all duration-300">Delete</button>
                            </div>
                        </div>
                        
                        <div class="flex items-center gap-4 p-4 border border-slate-200 rounded-lg mb-4 transition-all duration-300 hover:bg-slate-50 hover:translate-x-1 dark:border-slate-600 dark:hover:bg-slate-900">
                            <div class="w-15 h-15 rounded-full bg-light-purple flex items-center justify-center text-primary-purple font-bold text-xl">RW</div>
                            <div class="teacher-info flex-1">
                                <h4 class="text-primary-purple font-semibold mb-1">Prof. Robert Wilson</h4>
                                <p class="text-slate-500 text-sm dark:text-slate-400">📧 robert.wilson@college.edu</p>
                                <p class="text-slate-500 text-sm dark:text-slate-400">📱 +1 (555) 345-6789</p>
                                <p class="text-slate-500 text-sm dark:text-slate-400">🏫 Physics Dept.</p>
                            </div>
                            <div class="flex gap-2">
                                <button class="bg-primary-purple text-white px-3 py-1 rounded text-sm hover:bg-dark-purple transition-all duration-300">Edit</button>
                                <button class="bg-red-500 text-white px-3 py-1 rounded text-sm hover:bg-red-600 transition-all duration-300">Delete</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Applications Section -->
        <div id="applications-section" class="section-content p-8 hidden">
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
                    
                    <div id="applicationsList">
                        <div class="p-4 border border-slate-200 rounded-lg mb-4 transition-all duration-300 hover:bg-slate-50 hover:border-primary-purple dark:border-slate-600 dark:hover:bg-slate-900">
                            <div class="flex justify-between items-center mb-2">
                                <span class="bg-primary-purple text-white px-3 py-1 rounded-full text-xs font-semibold">APP001</span>
                                <span class="bg-yellow-100 text-yellow-800 px-3 py-1 rounded-full text-xs font-semibold">Pending</span>
                            </div>
                            <div class="text-primary-purple font-semibold mb-2">Alex Thompson</div>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-2 text-sm">
                                <div class="text-slate-500 dark:text-slate-400"><span class="font-semibold text-slate-800 dark:text-slate-100">Email:</span> alex.thompson@email.com</div>
                                <div class="text-slate-500 dark:text-slate-400"><span class="font-semibold text-slate-800 dark:text-slate-100">Phone:</span> +1 (555) 111-2222</div>
                                <div class="text-slate-500 dark:text-slate-400"><span class="font-semibold text-slate-800 dark:text-slate-100">Address:</span> 123 Main St, City</div>
                                <div class="text-slate-500 dark:text-slate-400"><span class="font-semibold text-slate-800 dark:text-slate-100">Applied:</span> June 15, 2025</div>
                            </div>
                            <div class="mt-4 flex gap-2">
                                <button class="bg-primary-purple text-white border-none py-2 px-4 rounded-lg cursor-pointer transition-all duration-300 text-sm hover:bg-dark-purple">Approve</button>
                                <button class="bg-transparent text-primary-purple border border-primary-purple py-2 px-4 rounded-lg cursor-pointer transition-all duration-300 text-sm hover:bg-primary-purple hover:text-white">Reject</button>
                            </div>
                        </div>
                        
                        <div class="p-4 border border-slate-200 rounded-lg mb-4 transition-all duration-300 hover:bg-slate-50 hover:border-primary-purple dark:border-slate-600 dark:hover:bg-slate-900">
                            <div class="flex justify-between items-center mb-2">
                                <span class="bg-primary-purple text-white px-3 py-1 rounded-full text-xs font-semibold">APP002</span>
                                <span class="bg-yellow-100 text-yellow-800 px-3 py-1 rounded-full text-xs font-semibold">Pending</span>
                            </div>
                            <div class="text-primary-purple font-semibold mb-2">Maria Garcia</div>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-2 text-sm">
                                <div class="text-slate-500 dark:text-slate-400"><span class="font-semibold text-slate-800 dark:text-slate-100">Email:</span> maria.garcia@email.com</div>
                                <div class="text-slate-500 dark:text-slate-400"><span class="font-semibold text-slate-800 dark:text-slate-100">Phone:</span> +1 (555) 222-3333</div>
                                <div class="text-slate-500 dark:text-slate-400"><span class="font-semibold text-slate-800 dark:text-slate-100">Address:</span> 456 Oak Ave, Town</div>
                                <div class="text-slate-500 dark:text-slate-400"><span class="font-semibold text-slate-800 dark:text-slate-100">Applied:</span> June 18, 2025</div>
                            </div>
                            <div class="mt-4 flex gap-2">
                                <button class="bg-primary-purple text-white border-none py-2 px-4 rounded-lg cursor-pointer transition-all duration-300 text-sm hover:bg-dark-purple">Approve</button>
                                <button class="bg-transparent text-primary-purple border border-primary-purple py-2 px-4 rounded-lg cursor-pointer transition-all duration-300 text-sm hover:bg-primary-purple hover:text-white">Reject</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Students Section -->
        <div id="students-section" class="section-content p-8 hidden">
            <div class="bg-white rounded-xl shadow-lg border border-slate-200 overflow-hidden transition-all duration-300 dark:bg-slate-800 dark:border-slate-600">
                <div class="px-6 py-4 bg-primary-purple text-white font-semibold text-lg flex justify-between items-center">
                    <span>🎓 Current Students</span>
                    <button class="bg-white text-primary-purple px-4 py-2 rounded-lg text-sm font-semibold hover:bg-slate-100 transition-all duration-300">
                        Export List
                    </button>
                </div>
                <div class="p-6 max-h-96 overflow-y-auto scrollbar-thin scrollbar-thumb-primary-purple scrollbar-track-slate-100 dark:scrollbar-track-slate-700">
                    <input 
                        type="text" 
                        class="w-full p-3 border border-slate-200 rounded-lg mb-4 bg-white text-slate-800 dark:bg-slate-900 dark:border-slate-600 dark:text-slate-100"
                        placeholder="Search current students..." 
                        onkeyup="searchStudents(this.value)"
                    >
                    
                    <div id="studentsList" class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-4">
                        <div class="p-4 border border-slate-200 rounded-lg transition-all duration-300 hover:bg-slate-50 hover:border-primary-purple dark:border-slate-600 dark:hover:bg-slate-900">
                            <div class="flex justify-between items-center mb-2">
                                <span class="bg-primary-purple text-white px-3 py-1 rounded-full text-xs font-semibold">STU001</span>
                                <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-xs font-semibold">Active</span>
                            </div>
                            <div class="text-primary-purple font-semibold mb-2">Emma Johnson</div>
                            <div class="space-y-1 text-sm">
                                <div class="text-slate-500 dark:text-slate-400"><span class="font-semibold text-slate-800 dark:text-slate-100">Email:</span> emma.johnson@student.college.edu</div>
                                <div class="text-slate-500 dark:text-slate-400"><span class="font-semibold text-slate-800 dark:text-slate-100">Phone:</span> +1 (555) 444-5555</div>
                                <div class="text-slate-500 dark:text-slate-400"><span class="font-semibold text-slate-800 dark:text-slate-100">Major:</span> Computer Science</div>
                                <div class="text-slate-500 dark:text-slate-400"><span class="font-semibold text-slate-800 dark:text-slate-100">Year:</span> Sophomore</div>
                            </div>
                        </div>
                        
                        <div class="p-4 border border-slate-200 rounded-lg transition-all duration-300 hover:bg-slate-50 hover:border-primary-purple dark:border-slate-600 dark:hover:bg-slate-900">
                            <div class="flex justify-between items-center mb-2">
                                <span class="bg-primary-purple text-white px-3 py-1 rounded-full text-xs font-semibold">STU002</span>
                                <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-xs font-semibold">Active</span>
                            </div>
                            <div class="text-primary-purple font-semibold mb-2">Michael Chen</div>
                            <div class="space-y-1 text-sm">
                                <div class="text-slate-500 dark:text-slate-400"><span class="font-semibold text-slate-800 dark:text-slate-100">Email:</span> michael.chen@student.college.edu</div>
                                <div class="text-slate-500 dark:text-slate-400"><span class="font-semibold text-slate-800 dark:text-slate-100">Phone:</span> +1 (555) 555-6666</div>
                                <div class="text-slate-500 dark:text-slate-400"><span class="font-semibold text-slate-800 dark:text-slate-100">Major:</span> Mathematics</div>
                                <div class="text-slate-500 dark:text-slate-400"><span class="font-semibold text-slate-800 dark:text-slate-100">Year:</span> Junior</div>
                            </div>
                        </div>
                        
                        <div class="p-4 border border-slate-200 rounded-lg transition-all duration-300 hover:bg-slate-50 hover:border-primary-purple dark:border-slate-600 dark:hover:bg-slate-900">
                            <div class="flex justify-between items-center mb-2">
                                <span class="bg-primary-purple text-white px-3 py-1 rounded-full text-xs font-semibold">STU003</span>
                                <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-xs font-semibold">Active</span>
                            </div>
                            <div class="text-primary-purple font-semibold mb-2">Sophie Williams</div>
                            <div class="space-y-1 text-sm">
                                <div class="text-slate-500 dark:text-slate-400"><span class="font-semibold text-slate-800 dark:text-slate-100">Email:</span> sophie.williams@student.college.edu</div>
                                <div class="text-slate-500 dark:text-slate-400"><span class="font-semibold text-slate-800 dark:text-slate-100">Phone:</span> +1 (555) 666-7777</div>
                                <div class="text-slate-500 dark:text-slate-400"><span class="font-semibold text-slate-800 dark:text-slate-100">Major:</span> Physics</div>
                                <div class="text-slate-500 dark:text-slate-400"><span class="font-semibold text-slate-800 dark:text-slate-100">Year:</span> Senior</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Reports Section -->
        <div id="reports-section" class="section-content p-8 hidden">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <div class="bg-white rounded-xl shadow-lg border border-slate-200 p-6 dark:bg-slate-800 dark:border-slate-600">
                    <h3 class="text-xl font-bold text-primary-purple mb-4">📊 Generate Reports</h3>
                    <div class="space-y-4">
                        <button class="w-full bg-primary-purple text-white p-3 rounded-lg border-none cursor-pointer transition-all duration-300 hover:scale-105 hover:shadow-lg">
                            <div class="text-left">
                                <div class="font-semibold">Teachers Report</div>
                                <div class="text-sm opacity-80">Complete list of all teachers</div>
                            </div>
                        </button>
                        
                        <button class="w-full bg-primary-purple text-white p-3 rounded-lg border-none cursor-pointer transition-all duration-300 hover:scale-105 hover:shadow-lg">
                            <div class="text-left">
                                <div class="font-semibold">Students Report</div>
                                <div class="text-sm opacity-80">Active students by department</div>
                            </div>
                        </button>
                        
                        <button class="w-full bg-primary-purple text-white p-3 rounded-lg border-none cursor-pointer transition-all duration-300 hover:scale-105 hover:shadow-lg">
                            <div class="text-left">
                                <div class="font-semibold">Applications Report</div>
                                <div class="text-sm opacity-80">Pending and processed applications</div>
                            </div>
                        </button>
                        
                        <button class="w-full bg-primary-purple text-white p-3 rounded-lg border-none cursor-pointer transition-all duration-300 hover:scale-105 hover:shadow-lg">
                            <div class="text-left">
                                <div class="font-semibold">Monthly Summary</div>
                                <div class="text-sm opacity-80">Overall statistics and trends</div>
                            </div>
                        </button>
                    </div>
                </div>
                
                <div class="bg-white rounded-xl shadow-lg border border-slate-200 p-6 dark:bg-slate-800 dark:border-slate-600">
                    <h3 class="text-xl font-bold text-primary-purple mb-4">📈 Quick Stats</h3>
                    <div class="space-y-4">
                        <div class="flex justify-between items-center p-3 bg-slate-50 rounded-lg dark:bg-slate-700">
                            <span class="text-slate-700 dark:text-slate-300">Applications This Week</span>
                            <span class="font-bold text-primary-purple">8</span>
                        </div>
                        <div class="flex justify-between items-center p-3 bg-slate-50 rounded-lg dark:bg-slate-700">
                            <span class="text-slate-700 dark:text-slate-300">New Admissions</span>
                            <span class="font-bold text-primary-purple">5</span>
                        </div>
                        <div class="flex justify-between items-center p-3 bg-slate-50 rounded-lg dark:bg-slate-700">
                            <span class="text-slate-700 dark:text-slate-300">Active Teachers</span>
                            <span class="font-bold text-primary-purple">24</span>
                        </div>
                        <div class="flex justify-between items-center p-3 bg-slate-50 rounded-lg dark:bg-slate-700">
                            <span class="text-slate-700 dark:text-slate-300">Department Count</span>
                            <span class="font-bold text-primary-purple">6</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Settings Section 2 -->
        <div id="settings-section" class="section-content p-8 hidden">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <div class="bg-white rounded-xl shadow-lg border border-slate-200 p-6 dark:bg-slate-800 dark:border-slate-600">
                    <h3 class="text-xl font-bold text-primary-purple mb-4">⚙️ System Settings</h3>
                    <div class="space-y-4">
                        <div class="flex justify-between items-center p-3 border border-slate-200 rounded-lg dark:border-slate-600">
                            <div>
                                <div class="font-semibold text-slate-800 dark:text-slate-200">Email Notifications</div>
                                <div class="text-sm text-slate-500 dark:text-slate-400">Receive email alerts for new applications</div>
                            </div>
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" class="sr-only peer" checked>
                                <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-primary-purple/30 dark:peer-focus:ring-primary-purple/50 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-primary-purple"></div>
                            </label>
                        </div>
                        
                        <div class="flex justify-between items-center p-3 border border-slate-200 rounded-lg dark:border-slate-600">
                            <div>
                                <div class="font-semibold text-slate-800 dark:text-slate-200">Auto-approve Applications</div>
                                <div class="text-sm text-slate-500 dark:text-slate-400">Automatically approve qualified applications</div>
                            </div>
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" class="sr-only peer">
                                <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-primary-purple/30 dark:peer-focus:ring-primary-purple/50 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-primary-purple"></div>
                            </label>
                        </div>
                        
                        <div class="flex justify-between items-center p-3 border border-slate-200 rounded-lg dark:border-slate-600">
                            <div>
                                <div class="font-semibold text-slate-800 dark:text-slate-200">Dark Mode</div>
                                <div class="text-sm text-slate-500 dark:text-slate-400">Switch to dark theme</div>
                            </div>
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" class="sr-only peer" id="darkModeToggle" onchange="toggleTheme()">
                                <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-primary-purple/30 dark:peer-focus:ring-primary-purple/50 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-primary-purple"></div>
                            </label>
                        </div>
                    </div>
                </div>
                
                <div class="bg-white rounded-xl shadow-lg border border-slate-200 p-6 dark:bg-slate-800 dark:border-slate-600">
                    <h3 class="text-xl font-bold text-primary-purple mb-4">👤 Profile Settings</h3>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-2">Full Name</label>
                            <input type="text" value="Prof. Johnson" class="w-full p-3 border border-slate-200 rounded-lg bg-white text-slate-800 dark:bg-slate-900 dark:border-slate-600 dark:text-slate-100">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-2">Email Address</label>
                            <input type="email" value="prof.johnson@college.edu" class="w-full p-3 border border-slate-200 rounded-lg bg-white text-slate-800 dark:bg-slate-900 dark:border-slate-600 dark:text-slate-100">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-2">Department</label>
                            <select class="w-full p-3 border border-slate-200 rounded-lg bg-white text-slate-800 dark:bg-slate-900 dark:border-slate-600 dark:text-slate-100">
                                <option>Administration</option>
                                <option>Computer Science</option>
                                <option>Mathematics</option>
                                <option>Physics</option>
                                <option>Chemistry</option>
                                <option>Biology</option>
                            </select>
                        </div>
                        <button class="w-full bg-primary-purple text-white p-3 rounded-lg border-none cursor-pointer transition-all duration-300 hover:bg-dark-purple hover:scale-105">
                            Save Changes
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Global variables
        let isDarkMode = false;
        let currentSection = 'dashboard';

        // Initialize the application
        document.addEventListener('DOMContentLoaded', function() {
            // Check for saved theme preference (using sessionStorage instead of localStorage)
            const savedTheme = sessionStorage.getItem('theme');
            if (savedTheme === 'dark') {
                isDarkMode = true;
                document.documentElement.classList.add('dark');
                const themeIcon = document.getElementById('themeIcon');
                const darkModeToggle = document.getElementById('darkModeToggle');
                if (themeIcon) themeIcon.textContent = '☀️';
                if (darkModeToggle) darkModeToggle.checked = true;
            }

            // Show initial section and set active nav
            showSection('dashboard');
            setActiveNav('dashboard');
        });

        // Theme toggle functionality
        function toggleTheme() {
            isDarkMode = !isDarkMode;
            const themeIcon = document.getElementById('themeIcon');
            const darkModeToggle = document.getElementById('darkModeToggle');
            
            if (isDarkMode) {
                document.documentElement.classList.add('dark');
                if (themeIcon) themeIcon.textContent = '☀️';
                if (darkModeToggle) darkModeToggle.checked = true;
                sessionStorage.setItem('theme', 'dark');
            } else {
                document.documentElement.classList.remove('dark');
                if (themeIcon) themeIcon.textContent = '🌙';
                if (darkModeToggle) darkModeToggle.checked = false;
                sessionStorage.setItem('theme', 'light');
            }
        }

        // Set active navigation item
        function setActiveNav(sectionName) {
            // Remove active class from all nav items
            const navItems = document.querySelectorAll('.nav-item');
            navItems.forEach(item => {
                item.classList.remove('bg-primary-purple', 'text-white');
                item.classList.add('text-slate-700', 'dark:text-slate-300');
            });

            // Add active class to current nav item
            const currentNavItem = document.querySelector(`button[onclick="showSection('${sectionName}')"]`);
            if (currentNavItem) {
                currentNavItem.classList.add('bg-primary-purple', 'text-white');
                currentNavItem.classList.remove('text-slate-700', 'dark:text-slate-300');
            }
        }

        // Section navigation
        function showSection(sectionName) {
            console.log('Showing section:', sectionName); // Debug log
            
            // Hide all sections
            const sections = document.querySelectorAll('.section-content');
            sections.forEach(section => {
                section.classList.add('hidden');
            });

            // Show selected section
            const targetSection = document.getElementById(sectionName + '-section');
            if (targetSection) {
                targetSection.classList.remove('hidden');
                console.log('Found and showing section:', sectionName); // Debug log
            } else {
                console.error('Section not found:', sectionName + '-section'); // Debug log
            }

            // Update page title
            const pageTitle = document.getElementById('pageTitle');
            if (pageTitle) {
                pageTitle.textContent = sectionName.charAt(0).toUpperCase() + sectionName.slice(1);
            }

            // Update navigation active state
            setActiveNav(sectionName);
            currentSection = sectionName;

            // Close mobile sidebar after navigation
            if (window.innerWidth < 1024) {
                const sidebar = document.getElementById('sidebar');
                const mainContent = document.getElementById('mainContent');
                if (sidebar && mainContent) {
                    sidebar.classList.add('-translate-x-full');
                    mainContent.classList.add('ml-0');
                    mainContent.classList.remove('ml-64');
                }
            }
        }

        // Search functionality for teachers
        function searchTeachers(query) {
            const teachersList = document.getElementById('teachersList');
            const teachers = teachersList.querySelectorAll('.teacher-info');
            
            teachers.forEach(teacher => {
                const teacherCard = teacher.closest('div');
                const teacherName = teacher.querySelector('h4').textContent.toLowerCase();
                const teacherEmail = teacher.querySelector('p').textContent.toLowerCase();
                
                if (teacherName.includes(query.toLowerCase()) || teacherEmail.includes(query.toLowerCase())) {
                    teacherCard.style.display = 'flex';
                } else {
                    teacherCard.style.display = 'none';
                }
            });
        }

        // Search functionality for applications
        function searchApplications(query) {
            const applicationsList = document.getElementById('applicationsList');
            const applications = applicationsList.children;
            
            Array.from(applications).forEach(app => {
                const applicantName = app.querySelector('.text-primary-purple').textContent.toLowerCase();
                const applicantEmail = app.querySelector('div:nth-child(1) .text-slate-500').textContent.toLowerCase();
                
                if (applicantName.includes(query.toLowerCase()) || applicantEmail.includes(query.toLowerCase())) {
                    app.style.display = 'block';
                } else {
                    app.style.display = 'none';
                }
            });
        }

        // Search functionality for students
        function searchStudents(query) {
            const studentsList = document.getElementById('studentsList');
            const students = studentsList.children;
            
            Array.from(students).forEach(student => {
                const studentName = student.querySelector('.text-primary-purple').textContent.toLowerCase();
                const studentEmail = student.querySelector('.text-slate-500').textContent.toLowerCase();
                const studentMajor = student.querySelectorAll('.text-slate-500')[2].textContent.toLowerCase();
                
                if (studentName.includes(query.toLowerCase()) || 
                    studentEmail.includes(query.toLowerCase()) || 
                    studentMajor.includes(query.toLowerCase())) {
                    student.style.display = 'block';
                } else {
                    student.style.display = 'none';
                }
            });
        }

        // Mobile sidebar toggle
        const sidebarToggle = document.getElementById('sidebarToggle');
        if (sidebarToggle) {
            sidebarToggle.addEventListener('click', function() {
                const sidebar = document.getElementById('sidebar');
                const mainContent = document.getElementById('mainContent');
                
                if (sidebar && mainContent) {
                    sidebar.classList.toggle('-translate-x-full');
                    mainContent.classList.toggle('ml-0');
                    mainContent.classList.toggle('ml-64');
                }
            });
        }

        // Close sidebar on mobile when clicking outside
        document.addEventListener('click', function(event) {
            const sidebar = document.getElementById('sidebar');
            const sidebarToggle = document.getElementById('sidebarToggle');
            const isMobile = window.innerWidth < 1024;
            
            if (isMobile && !sidebar.contains(event.target) && !sidebarToggle.contains(event.target)) {
                sidebar.classList.add('-translate-x-full');
                document.getElementById('mainContent').classList.remove('ml-0');
                document.getElementById('mainContent').classList.add('ml-64');
            }
        });

        // Responsive sidebar handling
        window.addEventListener('resize', function() {
            const sidebar = document.getElementById('sidebar');
            const mainContent = document.getElementById('mainContent');
            
            if (window.innerWidth >= 1024) {
                sidebar.classList.remove('-translate-x-full');
                mainContent.classList.remove('ml-0');
                mainContent.classList.add('ml-64');
            } else {
                sidebar.classList.add('-translate-x-full');
                mainContent.classList.add('ml-0');
                mainContent.classList.remove('ml-64');
            }
        });

        // Initialize responsive behavior
        if (window.innerWidth < 1024) {
            document.getElementById('sidebar').classList.add('-translate-x-full');
            document.getElementById('mainContent').classList.add('ml-0');
            document.getElementById('mainContent').classList.remove('ml-64');
        }
    </script>

    <style>
        /* Custom scrollbar styles */
        .scrollbar-thin::-webkit-scrollbar {
            width: 6px;
        }
        
        .scrollbar-thumb-primary-purple::-webkit-scrollbar-thumb {
            background-color: #6366f1;
            border-radius: 3px;
        }
        
        .scrollbar-track-slate-100::-webkit-scrollbar-track {
            background-color: #f1f5f9;
        }
        
        .dark .scrollbar-track-slate-700::-webkit-scrollbar-track {
            background-color: #374151;
        }
        
        /* Smooth transitions */
        * {
            transition: background-color 0.3s ease, color 0.3s ease;
        }
        
        /* Mobile responsive adjustments */
        @media (max-width: 1024px) {
            #sidebar {
                transform: translateX(-100%);
            }
            
            #mainContent {
                margin-left: 0 !important;
            }
        }
    </style>
</body>
</html>