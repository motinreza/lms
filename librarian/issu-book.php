<?php

require_once "header.php";

if(isset($_POST["issu_book"])){
    
    $student_id = $_POST["student_id"];
    $book_id = $_POST["book_id"];
    $book_issu_date = $_POST["book_issu_date"];

    $result = mysqli_query($con, "INSERT INTO `issue_books`(`student_id`, `book_id`, `book_issu_date`) VALUES ('$student_id','$book_id','$book_issu_date') ");

    if($result){

        mysqli_query($con, "UPDATE `books` SET `available_qty` = `available_qty`-1 WHERE `id` = '$book_id' ");

        ?>
            <script type="text/javascript">
                alert("Book issued successfully!");
            </script>
        <?php
    }else{
        ?>
            <script type="text/javascript">
                alert("Book not issue!");
            </script>
        <?php
    }

}

?>


        <!-- content HEADER -->
        <!-- ========================================================= -->
        <div class="content-header">
            <!-- leftside content header -->
            <div class="leftside-content-header">
                <ul class="breadcrumbs">
                    <li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Dashboard</a></li>
                    <li><a href="javascript:avoid(0)">Issu book</a></li>
                </ul>
            </div>
        </div>
        <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
        <div class="row animated fadeInUp">
            <div class="col-sm-6 col-sm-offset-3">
            
                <div class="panel">
                    <div class="panel-content">
                        <div class="row">
                            <div class="col-md-12">
                                <form class="form-inline" method="POST" action="">
                                    <div class="form-group">
                                        <select name="student_id" class="form-control">
                                            <option value="">Select</option>

                                        <?php
                                            
                                            $student_result = mysqli_query($con, "SELECT * FROM `students` WHERE `status` = '1' ");

                                            while($student_row = mysqli_fetch_assoc($student_result)){
                                                ?>
 
                                                    <option value="<?= $student_row['id']; ?>"><?= ucwords($student_row['fname'].' '.$student_row['lname']).' '.' - ('.$student_row['roll'].')'; ?></option>
                                                
                                                <?php
                                            }
                                            
                                            ?>


                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" name="search" class="btn btn-primary">Search</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <?php
                        
                        if(isset($_POST["search"])){
                            
                            $id = $_POST["student_id"];
                            
                            $result = mysqli_query($con, "SELECT * FROM `students` WHERE `id` = '$id' AND `status` = '1' ");
                            $row = mysqli_fetch_assoc($result);
                            

                            ?>

                            <div class="panel">
                                <div class="panel-content">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <form method="POST" action="">
                                                <div class="form-group">
                                                    <label for="name">Student name</label>
                                                    <input type="text" class="form-control" id="name" value="<?= ucwords($row['fname'].' '.$row['lname']); ?>" readonly>
                                                    <input type="hidden" name="student_id" value="<?= $row['id']; ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Book name</label>
                                                    <select name="book_id" class="form-control">
                                                        <option value="">Select</option>
                                                        
                                                        <?php
                                                        
                                                        $book_result = mysqli_query($con, "SELECT * FROM `books` WHERE `available_qty` > 0 ");

                                                        while($row = mysqli_fetch_assoc($book_result)){
                                                            ?>
                                                                <option value="<?= $row['id']; ?>"><?= $row['book_name']; ?></option> 
                                                            <?php
                                                        }

                                                        ?>

                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Book issu date</label>
                                                    <input type="text" class="form-control" name="book_issu_date" value="<?= date("m-d-Y"); ?>" readonly>
                                                </div>
                                                <div class="form-group">
                                                    <button type="submit" name="issu_book" class="btn btn-primary"> Save issu book</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <?php
                            
                        }
                        
                        ?>

                    </div>
                </div>
            
            </div>
        </div>
        <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->

<?php

require_once "footer.php";

?>