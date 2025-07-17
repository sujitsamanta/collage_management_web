 <?php include('admin_header.php') ?>

<!-- Settings Section 1 -->
        <div id="settings-section" class="section-content p-8 ">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                
                <div class="bg-white rounded-xl shadow-lg border border-slate-200 p-6 dark:bg-slate-800 dark:border-slate-600">
                    <h3 class="text-lg font-semibold text-primary-purple mb-4">⚙️ System Settings</h3>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-2">College Name</label>
                            <input type="text" value="Springfield College" class="w-full p-3 border border-slate-200 rounded-lg bg-white dark:bg-slate-900 dark:border-slate-600 dark:text-slate-100">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-2">Academic Year</label>
                            <select class="w-full p-3 border border-slate-200 rounded-lg bg-white dark:bg-slate-900 dark:border-slate-600 dark:text-slate-100">
                                <option>2024-2025</option>
                                <option>2025-2026</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-2">Application Deadline</label>
                            <input type="date" class="w-full p-3 border border-slate-200 rounded-lg bg-white dark:bg-slate-900 dark:border-slate-600 dark:text-slate-100">
                        </div>
                        <button class="w-full bg-primary-purple text-white py-3 px-4 rounded-lg hover:bg-dark-purple transition-all duration-300">
                            Save Settings
                        </button>
                    </div>
                </div>
                
                <div class="bg-white rounded-xl shadow-lg border border-slate-200 p-6 dark:bg-slate-800 dark:border-slate-600">
                    <h3 class="text-lg font-semibold text-primary-purple mb-4">🔐 Security Settings</h3>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-2">Current Password</label>
                            <input type="password" class="w-full p-3 border border-slate-200 rounded-lg bg-white dark:bg-slate-900 dark:border-slate-600 dark:text-slate-100">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-2">New Password</label>
                            <input type="password" class="w-full p-3 border border-slate-200 rounded-lg bg-white dark:bg-slate-900 dark:border-slate-600 dark:text-slate-100">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-2">Confirm Password</label>
                            <input type="password" class="w-full p-3 border border-slate-200 rounded-lg bg-white dark:bg-slate-900 dark:border-slate-600 dark:text-slate-100">
                        </div>
                        <button class="w-full bg-red-500 text-white py-3 px-4 rounded-lg hover:bg-red-600 transition-all duration-300">
                            Change Password
                        </button>
                    </div>
                </div>
            </div>
  
        </div>


<!-- 
        <div style="position: absolute; top: 20rem; left: 45vw; width: 30vmax; " class="max-w-30 bg-white rounded-xl shadow-lg border border-slate-200 p-6 dark:bg-slate-800 dark:border-slate-600">
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
                </div> -->





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
<?php include('admin_footer.php') ?>