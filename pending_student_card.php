<?php
include("admin_header.php");


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    
}
?>

<div class="right">

    <!-- Pending Applications -->

    <div class="section full-width-section">
        <div class="section-header">
            📋 Pending Applications
        </div>
        <div class="section-content scrollbar">


            <input type="text" class="search-bar" placeholder="Search applications..."
                onkeyup="searchApplications(this.value)">

            <?php if ($alert1): ?>
                <div class="alert"
                    style="text-align:center; display: flex; justify-content: center; align-items: center; border:3px solid red; border-radius: 5px; color: red; padding: .2rem;  margin: .2rem; ">
                    <p>Ples enter the password..!</p>
                </div>
            <?php endif; ?>

            <?php if ($alert2): ?>
                <div class="alert"
                    style="text-align:center; display: flex; justify-content: center; align-items: center; border:3px solid #89E54C; border-radius: 5px; color: #89E54C; padding: .2rem;  margin: .2rem; ">
                    <p>Approve Successful..!</p>
                </div>
            <?php endif; ?>

            <?php if ($alert4): ?>
                <div class="alert"
                    style="text-align:center; display: flex; justify-content: center; align-items: center; border:3px solid red; border-radius: 5px; color: red; padding: .2rem;  margin: .2rem; ">
                    <p>This Student is Already Ptresent..!</p>
                </div>
            <?php endif; ?>

            <?php if ($alert5): ?>
                <div class="alert"
                    style="text-align:center; display: flex; justify-content: center; align-items: center; border:3px solid red; border-radius: 5px; color: red; padding: .2rem;  margin: .2rem; ">
                    <p>This Student Rejected Successful..!</p>
                </div>
            <?php endif; ?>

            <?php if ($alert6): ?>
                <div class="alert"
                    style="text-align:center; display: flex; justify-content: center; align-items: center; border:3px solid red; border-radius: 5px; color: red; padding: .2rem;  margin: .2rem; ">
                    <p>Email does not send..!</p>
                </div>
            <?php endif; ?>

            <div id="applicationsList">

                <?php
                // applying students
                $sql = "SELECT *FROM applyingstudents";
                $result = mysqli_query($conn, $sql);


                while ($row = mysqli_fetch_array($result)) {
                    ?>
                    <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
                        <div class="student-item">
                            <div class="student-header">
                                <span class="student-id"><?php echo $row['id']; ?></span>
                                <span class="status-badge status-pending">Pending</span>
                            </div>
                            <div class="student-name"><?php echo $row['name']; ?></div>
                            <div class="student-details">
                                <div class="detail-item"><span class="detail-label">Email:</span>
                                    <?php echo $row['email']; ?></div>
                                <div class="detail-item"><span class="detail-label">Phone:</span>
                                    +91<?php echo $row['phone']; ?></div>
                                <div class="detail-item"><span class="detail-label">Address:</span>
                                    <?php echo $row['address']; ?></div>
                                <div class="detail-item"><span class="detail-label">Applied:</span>
                                    <?php echo $row['date']; ?></div>


                                <!-- Hidden fields to pass data -->
                                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                <input type="hidden" name="name" value="<?php echo $row['name']; ?>">
                                <input type="hidden" name="email" value="<?php echo $row['email']; ?>">
                                <input type="hidden" name="phone" value="<?php echo $row['phone']; ?>">
                                <input type="hidden" name="address" value="<?php echo $row['address']; ?>">
                                <!-- Hidden fields to pass data -->

                                <!-- password -->
                                <div class="detail-item">
                                    <span class="detail-label">Password:</span>
                                    <input
                                        style=" height:1.8rem; padding: .5rem; font-size: 1rem; border-radius: 5px; margin-top: .4rem;"
                                        type="text" name="password">
                                </div>
                            </div>

                            <div style="margin-top: 1rem; display: flex; gap: 0.5rem;">
                                <!-- <button class="btn" name="approve">Approve</button> -->
                                <input class="btn" type="submit" name="approve" value="Approve">
                                <input class="btn-secondary btn" type="submit" name="reject" value="Reject">
                            </div>
                        </div>
                    </form>

                    <?php
                }
                ?>

            </div>
        </div>
    </div>

</div>


</main>


<?php
include("admin_footer.php");
?>