<?php
        
require_once "header.php";

require_once "../dbcon.php";
        
?>


<!-- content HEADER -->
<!-- ========================================================= -->
<div class="content-header">
    <!-- leftside content header -->
    <div class="leftside-content-header">
        <ul class="breadcrumbs">
            <li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Dashboard</a></li>
            <li><a href="javascript:avoid(0)">Students</a></li>
        </ul>
    </div>
</div>
<!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
<div class="row animated fadeInUp">
    <div class="col-sm-12">
        <h4 class="section-subtitle pull-left"><b>All students</b></h4>
        <div class="pull-right"><a href="print-all-students.php" target="_blank" class="btn btn-primary"><i class="fa fa-print"></i> Print</a></div>
        <div class="clearfix"></div>
        <div class="panel">
            <div class="panel-content">
                <div class="table-responsive">
                    <table id="basic-table" class="data-table table table-striped nowrap table-hover" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Roll</th>
                            <th>Reg no.</th>
                            <th>Email</th>
                            <th>Username</th>
                            <th>Phone</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php
                        
                        $student_result = mysqli_query($con, "SELECT * FROM `students` ");

                        while($student_row = mysqli_fetch_assoc($student_result)){
                            ?>
                            <tr>
                                <td><?= ucwords($student_row["fname"] .' '. $student_row["fname"]); ?></td>
                                <td><?= $student_row["roll"]; ?></td>
                                <td><?= $student_row["reg"]; ?></td>
                                <td><?= $student_row["email"]; ?></td>
                                <td><?= $student_row["username"]; ?></td>
                                <td><?= $student_row["phone"]; ?></td>
                                <td><img src="<?= $student_row['image']; ?>" alt=""></td>
                                <td><?= $student_row["status"] == 1 ? 'Active':'Inactive'; ?></td>
                                <td>

                                    <?php
                                    
                                    if($student_row["status"] == 1){
                                        ?>
                                            <a href="status_inactive.php?id=<?= base64_encode($student_row['id']); ?>" class="btn btn-primary"><i class="fa fa-arrow-up"></i></a>
                                        <?php
                                    }else{
                                        ?>
                                            <a href="status_active.php?id=<?= base64_encode($student_row['id']); ?>" class="btn btn-warning"><i class="fa fa-arrow-down"></i></a>
                                        <?php
                                    }
                                    
                                    ?>


                                    
                                </td>
                            </tr>
                            <?php
                        }
                        
                        ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->

<?php require_once "footer.php"; ?>