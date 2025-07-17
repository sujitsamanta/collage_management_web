 <?php
 include("admin_header.php");
 ?>
           <!-- Teachers Section -->
           <div class="section full-width-section" style="width: 100%; margin: 1rem;">
                <div class="section-header">
                    👨‍🏫 Teachers Management
                </div>
                <div class="section-content scrollbar">
                    <input type="text" class="search-bar" placeholder="Search teachers..."
                        onkeyup="searchTeachers(this.value)">

                    <div id="teachersList">
                        <div class="teacher-card">
                            <div class="teacher-photo">JD</div>
                            <div class="teacher-info">
                                <h4>Dr. John Davis</h4>
                                <p>📧 john.davis@college.edu</p>
                                <p>📱 +1 (555) 123-4567</p>
                                <p>🏫 Computer Science Dept.</p>
                            </div>
                        </div>

                        <div class="teacher-card">
                            <div class="teacher-photo">SM</div>
                            <div class="teacher-info">
                                <h4>Dr. Sarah Miller</h4>
                                <p>📧 sarah.miller@college.edu</p>
                                <p>📱 +1 (555) 234-5678</p>
                                <p>🏫 Mathematics Dept.</p>
                            </div>
                        </div>

                        <div class="teacher-card">
                            <div class="teacher-photo">RW</div>
                            <div class="teacher-info">
                                <h4>Prof. Robert Wilson</h4>
                                <p>📧 robert.wilson@college.edu</p>
                                <p>📱 +1 (555) 345-6789</p>
                                <p>🏫 Physics Dept.</p>
                            </div>
                        </div>

                        <div class="teacher-card">
                            <div class="teacher-photo">LB</div>
                            <div class="teacher-info">
                                <h4>Dr. Lisa Brown</h4>
                                <p>📧 lisa.brown@college.edu</p>
                                <p>📱 +1 (555) 456-7890</p>
                                <p>🏫 Chemistry Dept.</p>
                            </div>
                        </div>
                    </div>

                    <button class="btn" style="width: 100%; margin-top: 1rem;">Add New Teacher</button>
                </div>
            </div>

            <?php
 include("admin_footer.php");
 ?>