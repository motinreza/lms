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
                    <li><i class="fa fa-home" aria-hidden="true"></i><a href="#">Dashboard</a></li>
                </ul>
            </div>
        </div>
        <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
        <div class="row animated fadeInUp">
            <div class="col-sm-12">
                <h4 class="section-subtitle"><b>All students</b></h4>
                <div class="panel">
                    <div class="panel-content">
                        <div class="table-responsive">
                            <table id="basic-table" class="data-table table table-striped nowrap table-hover" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th>Book name</th>
                                    <th>Book image</th>
                                    <th>Book issu date</th>
                                </tr>
                                </thead>
                                <tbody>

                                        <?php
                                        $id = $_SESSION["student_id"];

                                        $result = mysqli_query($con, "SELECT `issue_books`.`book_issu_date`, `books`.`book_name`, `books`.`book_image` FROM `books` INNER JOIN `issue_books` ON `issue_books`.`book_id` = `books`.`id` WHERE `issue_books`.`student_id` = '$id' ");
                                        
                                        while($row = mysqli_fetch_assoc($result)){

                                            ?>
                                            <tr>
                                                <td><?= $row["book_name"]; ?></td>
                                                <td><img style="width:100px;" src="../images/book/<?= $row["book_image"]; ?>" alt=""></td>
                                                <td><?= date('d-M-Y', strtotime($row["book_issu_date"])); ?></td>
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

<?php

require_once "footer.php";

?>