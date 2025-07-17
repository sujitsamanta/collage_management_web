</div>

    <script>
        // Theme Management
        function toggleTheme() {
            const html = document.documentElement;
            const themeIcon = document.getElementById('themeIcon');
            
            if (html.classList.contains('dark')) {
                html.classList.remove('dark');
                themeIcon.textContent = '🌙';
            } else {
                html.classList.add('dark');
                themeIcon.textContent = '☀️';
            }
        }

        // Mobile Sidebar Management
        const sidebar = document.getElementById('sidebar');
        const backdrop = document.getElementById('backdrop');
        const sidebarToggle = document.getElementById('sidebarToggle');
        const mainContent = document.getElementById('mainContent');

        function toggleSidebar() {
            sidebar.classList.toggle('-translate-x-full');
            backdrop.classList.toggle('hidden');
            document.body.classList.toggle('overflow-hidden');
        }

        function closeSidebar() {
            sidebar.classList.add('-translate-x-full');
            backdrop.classList.add('hidden');
            document.body.classList.remove('overflow-hidden');
        }

        // Event listeners for mobile sidebar
        sidebarToggle.addEventListener('click', toggleSidebar);
        backdrop.addEventListener('click', closeSidebar);

        // Close sidebar when clicking on nav items (mobile)
        document.querySelectorAll('.nav-item').forEach(item => {
            item.addEventListener('click', () => {
                if (window.innerWidth < 1024) { // lg breakpoint
                    closeSidebar();
                }
            });
        });

        // Handle window resize
        window.addEventListener('resize', () => {
            if (window.innerWidth >= 1024) {
                closeSidebar();
            }
        });

        // // Section Management
        // function showSection(sectionName) {
        //     // Hide all sections
        //     document.querySelectorAll('.section-content').forEach(section => {
        //         section.classList.add('hidden');
        //     });
            
        //     // Show selected section
        //     document.getElementById(sectionName + '-section').classList.remove('hidden');
            
        //     // Update page title
        //     const titles = {
        //         'dashboard': 'Dashboard',
        //         'teachers': 'Teachers',
        //         'applications': 'Applications',
        //         'students': 'Students',
        //         'reports': 'Reports',
        //         'settings': 'Settings'
        //     };
        //     document.getElementById('pageTitle').textContent = titles[sectionName];
            
        //     // Update active nav item
        //     document.querySelectorAll('.nav-item').forEach(item => {
        //         item.classList.remove('bg-primary-purple', 'text-white');
        //     });
        //     event.target.classList.add('bg-primary-purple', 'text-white');
        // }

        // Search Functions
        function searchTeachers(searchTerm) {
            const teachersList = document.getElementById('teachersList');
            const teachers = teachersList.querySelectorAll('.flex.items-center');
            
            teachers.forEach(teacher => {
                const teacherInfo = teacher.querySelector('.teacher-info').textContent.toLowerCase();
                if (teacherInfo.includes(searchTerm.toLowerCase())) {
                    teacher.style.display = 'flex';
                } else {
                    teacher.style.display = 'none';
                }
            });
        }

        function searchApplications(searchTerm) {
            const applicationsList = document.getElementById('applicationsList');
            const applications = applicationsList.querySelectorAll('.p-4.border');
            
            applications.forEach(application => {
                const applicationText = application.textContent.toLowerCase();
                if (applicationText.includes(searchTerm.toLowerCase())) {
                    application.style.display = 'block';
                } else {
                    application.style.display = 'none';
                }
            });
        }

        function searchStudents(searchTerm) {
            const studentsList = document.getElementById('studentsList');
            const students = studentsList.querySelectorAll('.p-4.border');
            
            students.forEach(student => {
                const studentText = student.textContent.toLowerCase();
                if (studentText.includes(searchTerm.toLowerCase())) {
                    student.style.display = 'block';
                } else {
                    student.style.display = 'none';
                }
            });
        }

        // // Initialize
        // document.addEventListener('DOMContentLoaded', function() {
        //     // Set initial active nav item
        //     document.querySelector('[onclick="showSection(\'dashboard\')"]').classList.add('bg-primary-purple', 'text-white');
        // });

        // Smooth scrolling for better UX
        document.documentElement.style.scrollBehavior = 'smooth';
    </script>

    <style>
        /* Custom scrollbar */
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
            background-color: #334155;
        }

        /* Ensure sidebar is properly positioned on mobile */
        @media (max-width: 1023px) {
            #sidebar {
                position: fixed;
                z-index: 40;
            }
            
            #mainContent {
                margin-left: 0 !important;
            }
        }

        /* Smooth transitions */
        * {
            transition: background-color 0.3s ease, color 0.3s ease, border-color 0.3s ease;
        }
    </style>
</body>
</html>