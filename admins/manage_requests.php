<?php include('partials/menu.php'); ?>
        <div class="main-content text-center">
         <div class="wrapper">
                <h1>Manage Experts</h1><br/><br/>
                <a href="approved.php" class="btn-primary">Approved Farmer Requests</a>
                <a href="display_request.php" class="btn-primary">Display User Requests</a>
                <a href="link_requests.php" class="btn-primary">Pending Approval</a>
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
