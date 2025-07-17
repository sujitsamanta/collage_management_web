</div>


</main>


<script>
     // function toggleManu(){
        const manuIcon = document.getElementById('theme-toggle');
    const manu = document.getElementById('left');
    manuIcon.addEventListener('click', () => {
        manu.classList.toggle('hidden');
    })

    // }





    // Theme Toggle Functionality
    function toggleTheme() {
        const body = document.body;
        const themeIcon = document.getElementById('themeIcon');

        body.classList.toggle('dark');

        if (body.classList.contains('dark')) {
            themeIcon.textContent = '☀️';
            localStorage.setItem('theme', 'dark');
        } else {
            themeIcon.textContent = '🌙';
            localStorage.setItem('theme', 'light');
        }
    }

    // Load saved theme on page load
    function loadTheme() {
        const savedTheme = localStorage.getItem('theme');
        const body = document.body;
        const themeIcon = document.getElementById('themeIcon');

        if (savedTheme === 'dark') {
            body.classList.add('dark');
            themeIcon.textContent = '☀️';
        } else {
            themeIcon.textContent = '🌙';
        }
    }

    // Search Functions
    function searchTeachers(query) {
        const teachers = document.querySelectorAll('#teachersList .teacher-card');
        teachers.forEach(teacher => {
            const name = teacher.querySelector('h4').textContent.toLowerCase();
            const email = teacher.querySelector('p').textContent.toLowerCase();
            if (name.includes(query.toLowerCase()) || email.includes(query.toLowerCase())) {
                teacher.style.display = 'flex';
            } else {
                teacher.style.display = 'none';
            }
        });
    }

    function searchApplications(query) {
        const applications = document.querySelectorAll('#applicationsList .student-item');
        applications.forEach(app => {
            const name = app.querySelector('.student-name').textContent.toLowerCase();
            const id = app.querySelector('.student-id').textContent.toLowerCase();
            if (name.includes(query.toLowerCase()) || id.includes(query.toLowerCase())) {
                app.style.display = 'block';
            } else {
                app.style.display = 'none';
            }
        });
    }

    function searchStudents(query) {
        const students = document.querySelectorAll('#studentsList .student-item');
        students.forEach(student => {
            const name = student.querySelector('.student-name').textContent.toLowerCase();
            const id = student.querySelector('.student-id').textContent.toLowerCase();
            const major = student.querySelector('.detail-item:nth-child(5)').textContent.toLowerCase();
            if (name.includes(query.toLowerCase()) || id.includes(query.toLowerCase()) || major.includes(query.toLowerCase())) {
                student.style.display = 'block';
            } else {
                student.style.display = 'none';
            }
        });
    }



    // Initialize theme on page load
    document.addEventListener('DOMContentLoaded', function () {
        loadTheme();
    });
</script>
</body>

</html>