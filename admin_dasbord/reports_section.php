  <?php include('admin_header.php') ?>

 <!-- Reports Section -->
        <div id="reports-section" class="section-content p-8 ">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <div class="bg-white rounded-xl shadow-lg border border-slate-200 p-6 dark:bg-slate-800 dark:border-slate-600">
                    <h3 class="text-lg font-semibold text-primary-purple mb-4">📊 Generate Reports</h3>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-2">Report Type</label>
                            <select class="w-full p-3 border border-slate-200 rounded-lg bg-white dark:bg-slate-900 dark:border-slate-600 dark:text-slate-100">
                                <option>Student Enrollment Report</option>
                                <option>Teacher Performance Report</option>
                                <option>Application Status Report</option>
                                <option>Financial Summary Report</option>
                            </select>
                        </div>
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-2">From Date</label>
                                <input type="date" class="w-full p-3 border border-slate-200 rounded-lg bg-white dark:bg-slate-900 dark:border-slate-600 dark:text-slate-100">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-2">To Date</label>
                                <input type="date" class="w-full p-3 border border-slate-200 rounded-lg bg-white dark:bg-slate-900 dark:border-slate-600 dark:text-slate-100">
                            </div>
                        </div>
                        <button class="w-full bg-primary-purple text-white py-3 px-4 rounded-lg hover:bg-dark-purple transition-all duration-300">
                            Generate Report
                        </button>
                    </div>
                </div>
                
                <div class="bg-white rounded-xl shadow-lg border border-slate-200 p-6 dark:bg-slate-800 dark:border-slate-600">
                    <h3 class="text-lg font-semibold text-primary-purple mb-4">📈 Quick Statistics</h3>
                    <div class="space-y-4">
                        <div class="flex justify-between items-center p-3 bg-slate-50 rounded-lg dark:bg-slate-700">
                            <span class="text-slate-700 dark:text-slate-300">Applications This Month</span>
                            <span class="font-bold text-primary-purple">28</span>
                        </div>
                        <div class="flex justify-between items-center p-3 bg-slate-50 rounded-lg dark:bg-slate-700">
                            <span class="text-slate-700 dark:text-slate-300">Approved Applications</span>
                            <span class="font-bold text-green-600">19</span>
                        </div>
                        <div class="flex justify-between items-center p-3 bg-slate-50 rounded-lg dark:bg-slate-700">
                            <span class="text-slate-700 dark:text-slate-300">Pending Applications</span>
                            <span class="font-bold text-yellow-600">9</span>
                        </div>
                        <div class="flex justify-between items-center p-3 bg-slate-50 rounded-lg dark:bg-slate-700">
                            <span class="text-slate-700 dark:text-slate-300">Active Teachers</span>
                            <span class="font-bold text-blue-600">24</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
 <?php include('admin_footer.php') ?>