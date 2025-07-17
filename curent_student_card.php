           
            <?php
 include("admin_header.php");
 ?>
           <!-- Current Students Section -->
              <div class="section full-width-section" style="width: 100%; margin: 1rem;">
            <div class="section-header">
                🎓 Current Students
            </div>
            <div class="section-content scrollbar">

                <input type="text" class="search-bar" placeholder="Search current students..."
                    onkeyup="searchStudents(this.value)">

                <?php if ($alert3): ?>
                    <div class="alert"
                        style="text-align:center; display: flex; justify-content: center; align-items: center; border:3px solid #89E54C; border-radius: 5px; color: #89E54C; padding: .2rem;  margin: .2rem; ">
                        <p>A New Student Added Successful..!</p>
                    </div>
                <?php endif; ?>

                <div id="studentsList"
                    style="display: grid; grid-template-columns: repeat(auto-fit, minmax(400px, 1fr)); gap: 1rem;">


                    <?php

                    // admitted student
                    $sql = "SELECT *FROM admittedstudent";
                    $result = mysqli_query($conn, $sql);


                    while ($row = (mysqli_fetch_assoc($result))) {
                        ?>

                        <div class="student-item">
                            <div class="student-header">
                                <span class="student-id"><?php echo $row['id']; ?></span>
                                <span class="status-badge status-active">Active</span>
                            </div>
                            <div class="student-name"><?php echo $row['name']; ?></div>
                            <div class="student-details">
                                <div class="detail-item"><span class="detail-label">Email:</span>
                                    <?php echo $row['email']; ?></div>
                                <div class="detail-item"><span class="detail-label">Phone:</span> +91
                                    <?php echo $row['phone']; ?></div>
                                <div class="detail-item"><span class="detail-label">Password:</span>
                                    <?php echo $row['password']; ?></div>
                                <div class="detail-item"><span class="detail-label">Address:</span>
                                    <?php echo $row['address']; ?></div>
                                <div class="detail-item"><span class="detail-label">Enrolled:</span>
                                    <?php echo $row['date']; ?></div>
                                <div class="detail-item"><span class="detail-label">Major:</span> Mathematics</div>
                                <div class="detail-item"><span class="detail-label">Year:</span> Junior</div>
                            </div>
                        </div>

                      <?php
                    }
                      ?>


                </div>

                <button class="btn" style="width: 100%; margin-top: 1rem;">View All Students</button>
            </div>
        </div>

        </div>
        <?php
 include("admin_footer.php");
 ?>