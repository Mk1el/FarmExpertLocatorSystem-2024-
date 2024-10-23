<?php include('partials/menu.php'); ?>
        <div class="main-content text-center">
         <div class="wrapper">
                <h1>Manage Experts</h1><br/><br/>
                <a href="add_expert.php" class="btn-primary">Add an Expert</a>
                <a href="display_experts.php" class="btn-primary">Display Experts</a>
                <a href="available_experts.php" class="btn-primary">Available Experts</a>
<br/><br/>

                <table class="tbl-full">
                    <tr>
                        <th>S.N.</th>
                        <th>Full Name</th>
                        <th>Username</th>
                        <th>Actions</th>
                    </tr>
                    <tr>
                        <td>1.</td>
                        <td>Moses</td>
                        <td>Admin1</td>
                        <td>
                            <a href="#" class="btn-secondary">Update Admin</a>
                            <a href="#" class="btn-danger">Delete Admin</a>
                        </td>
                    </tr>
                </table>
                
</div>

        </div>
     <?php include('partials/footer.php'); ?>