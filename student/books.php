<?php require_once "header.php"; ?>

            <!-- content HEADER -->
                <!-- ========================================================= -->
                <div class="content-header">
                    <!-- leftside content header -->
                    <div class="leftside-content-header">
                        <ul class="breadcrumbs">
                            <li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Dashboard</a></li>
                            <li><a href="javascript:avoid(0)">Books</a></li>
                        </ul>
                    </div>
                </div>
                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
                <div class="row animated fadeInUp">

                    <div class="col-sm-12">
                        <div class="panel">
                            <div class="panel-content">
                                <form class="" method="POST" action="">
                                    <div class="row pt-md">
                                        <div class="form-group col-sm-9 col-lg-10">
                                            <span class="input-with-icon">
                                            <input type="text" name="search_result" class="form-control" id="lefticon" placeholder="Search" required="">
                                            <i class="fa fa-search"></i>
                                        </span>
                                        </div>
                                        <div class="form-group col-sm-3  col-lg-2 ">
                                            <button type="submit" name="search_book" class="btn btn-primary btn-block">Search</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <?php
                    
                    if(isset($_POST["search_book"])){

                        ?>

                        <div class="col-sm-12">
                            <div class="panel">
                                <div class="panel-content">
                                    <div class="row">

                                        <?php
                                        
                                        $search_result = $_POST["search_result"];

                                        $result = mysqli_query($con, "SELECT * FROM `books` WHERE `book_name` LIKE '%$search_result%' ");

                                        if(mysqli_num_rows($result) > 0){
                                            
                                            while($row = mysqli_fetch_assoc($result)){
                                                ?>
                                                <div class="col-sm-2 col-md-2">
                                                    <img class="img-responsive" src="../images/book/<?= $row['book_image']; ?>" alt="">
                                                    <div><?= $row["book_name"]; ?></div>
                                                    <div>Available : <?= $row["available_qty"]; ?></div>
                                                </div>
                                                <?php
                                            }
                                            
                                        }else{
                                            

                                            echo "<h1 class='text-center text-danger'>Book not found!</h1>";
                                        }

                                        ?>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php
                        
                    }else{
                        ?>
                        <div class="col-sm-12">
                            <div class="panel">
                                <div class="panel-content">
                                    <div class="row">

                                        <?php
                                        
                                        $result = mysqli_query($con, "SELECT * FROM `books` ");
                                        
                                        while($row = mysqli_fetch_assoc($result)){
                                            ?>
                                            <div class="col-sm-2 col-md-2">
                                                <img class="img-responsive" src="../images/book/<?= $row['book_image']; ?>" alt="">
                                                <div><?= $row["book_name"]; ?></div>
                                                <div>Available : <?= $row["available_qty"]; ?></div>
                                            </div>
                                            <?php
                                        }

                                        ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    
                    ?>

                </div>

<?php require_once "footer.php"; ?>