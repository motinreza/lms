<?php

require_once "header.php";

?>


        <!-- content HEADER -->
        <!-- ========================================================= -->
        <div class="content-header">
            <!-- leftside content header -->
            <div class="leftside-content-header">
                <ul class="breadcrumbs">
                    <li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Dashboard</a></li>
                    <li><a href="javascript:avoid(0)">Manage books</a></li>
                </ul>
            </div>
        </div>
        <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
        <div class="row animated fadeInUp">
            <div class="col-sm-12">
                <h4 class="section-subtitle"><b>All Books</b></h4>
                <div class="panel">
                    <div class="panel-content">
                        <div class="table-responsive">
                            <table id="basic-table" class="data-table table table-striped nowrap table-hover" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th>Book name</th>
                                    <th>Book image</th>
                                    <th>Author name</th>
                                    <th>Publication name</th>
                                    <th>Purchase date</th>
                                    <th>Book price</th>
                                    <th>Book quantity</th>
                                    <th>Available quantity</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>

                                <?php
                                
                                $book_result = mysqli_query($con, "SELECT * FROM `books` ");

                                while($book_row = mysqli_fetch_assoc($book_result)){
                                    ?>
                                    <tr>
                                         <td><?= $book_row["book_name"]; ?></td>               
                                         <td><img style="width: 100px;" src="../images/book/<?= $book_row["book_image"]; ?>" alt=""></td>               
                                         <td><?= $book_row["book_author_name"]; ?></td>               
                                         <td><?= $book_row["book_publication_name"]; ?></td>               
                                         <td><?= date("d-M-Y", strtotime($book_row["book_purchase_date"])); ?></td>               
                                         <td><?= $book_row["book_price"]; ?></td>               
                                         <td><?= $book_row["book_qty"]; ?></td>               
                                         <td><?= $book_row["available_qty"]; ?></td>               
                                         <td>
                                            <!--INFO modal-->
                                             <a href="javascript: avoid(0)" class="btn btn-info" data-toggle="modal" data-target="#book-<?= $book_row['id']; ?>"><i class="fa fa-eye"></i></a>
                                             <a href="" class="btn btn-warning" data-toggle="modal" data-target="#book-update-<?= $book_row['id']; ?>"><i class="fa fa-pencil"></i></a>
                                             <a href="delete.php?bookdelete=<?= base64_encode($book_row['id']); ?>" onclick="return confirm('Are you sure to delete?')" class="btn btn-danger"><i class="fa fa-trash-o"></i></a>
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

        <?php
        
        $book_result = mysqli_query($con, "SELECT * FROM `books` ");

        while($book_row = mysqli_fetch_assoc($book_result)){
            ?>

            <!-- Modal -->
            <div class="modal fade" id="book-<?= $book_row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="modal-info-label">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header state modal-info">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="modal-info-label"><i class="fa fa-book"></i>Book info</h4>
                        </div>
                        <div class="modal-body">
                            <table class="table table-bordered">
                                <tr>
                                    <th>Book name</th>
                                    <td><?= $book_row["book_name"]; ?></td>    
                                </tr>
                                <tr>
                                    <th>Book image</th>
                                    <td><img style="width: 100px;" src="../images/book/<?= $book_row["book_image"]; ?>" alt=""></td>               
                                </tr>
                                <tr>
                                    <th>Author name</th>
                                    <td><?= $book_row["book_author_name"]; ?></td>  
                                </tr>
                                <tr>
                                    <th>Publication name</th>
                                    <td><?= $book_row["book_publication_name"]; ?></td>    
                                </tr>
                                <tr>
                                    <th>Purchase date</th>
                                    <td><?= date("d-M-Y", strtotime($book_row["book_purchase_date"])); ?></td>   
                                </tr>
                                <tr>
                                    <th>Book price</th>
                                    <td><?= $book_row["book_price"]; ?></td>   
                                </tr>
                                <tr>
                                    <th>Book quantity</th>
                                    <td><?= $book_row["book_qty"]; ?></td>   
                                </tr>
                                <tr>
                                    <th>Available quantity</th>
                                    <td><?= $book_row["available_qty"]; ?></td>   
                                </tr>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>

            <?php
        
        }
                                
        ?>





        <!----------------------- Edit book information -------------------->
        <?php
        
        $book_result = mysqli_query($con, "SELECT * FROM `books` ");

        while($book_row = mysqli_fetch_assoc($book_result)){

            $id = $book_row["id"];
            $book_info = mysqli_query($con, "SELECT * FROM `books` WHERE `id` = '$id' ");
            $book_row = mysqli_fetch_assoc($book_info);

            ?>

            <!-- Modal -->
            <div class="modal fade" id="book-update-<?= $book_row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="modal-info-label">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header state modal-info">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="modal-info-label"><i class="fa fa-book"></i>Update Book info</h4>
                        </div>
                        <div class="modal-body">
                            <div class="panel">
                                <div class="panel-content">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <form class="form-horizontal" method="POST" enctype="multipart/form-data">
                                                <div class="form-group">
                                                    <label for="book_name">Book name</label> 
                                                    <input type="text" class="form-control" name="book_name" id="book_name" placeholder="Book name" value="<?= $book_row['book_name']; ?>">
                                                    <input type="hidden" class="form-control" name="id" id="id" value="<?= $book_row['id']; ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="book_image" >Book image</label>
                                                    <input type="file" class="form-control" name="book_image" id="book_image" placeholder="Book image">
                                                    <img style="width: 70px;" src="../images/book/<?= $book_row['book_image']; ?>" alt="">
                                                </div>
                                                <div class="form-group">
                                                    <label for="book_author_name">Author name</label>
                                                    <input type="text" class="form-control" name="book_author_name" id="book_author_name" placeholder="Book author name" value="<?= $book_row['book_author_name']; ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="book_publication_name">Publication name</label>
                                                    <input type="text" class="form-control" name="book_publication_name" id="book_publication_name" placeholder="Book publication name" value="<?= $book_row['book_publication_name']; ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="book_purchase_date">Purchase date</label>
                                                    <input type="date" class="form-control" name="book_purchase_date" id="book_purchase_date" value="<?= $book_row['book_purchase_date']; ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="book_price">Book price</label>
                                                    <input type="number" class="form-control" name="book_price" id="book_price" placeholder="Book price" value="<?= $book_row['book_price']; ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="book_qty">Book quantity</label>
                                                    <input type="number" class="form-control" name="book_qty" id="book_qty" placeholder="Book quantity" value="<?= $book_row['book_qty']; ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="available_qty">Available quantity</label>
                                                    <input type="number" class="form-control" name="available_qty" id="available_qty" placeholder="Available quantity" value="<?= $book_row['available_qty']; ?>">
                                                </div>
                                                <div class="form-group">
                                                    <button type="submit" name="update_book" class="btn btn-primary"><i class="fa fa-save"></i> Update book</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php
        
        }
        //----------- Update book php code ------------
        if(isset($_POST["update_book"])){

            $book_name = $_POST["book_name"];
            $id = $_POST["id"];
            $book_author_name = $_POST["book_author_name"];
            $book_purchase_date = $_POST["book_purchase_date"];
            $book_publication_name = $_POST["book_publication_name"];
            $book_price = $_POST["book_price"];
            $book_qty = $_POST["book_qty"];
            $available_qty = $_POST["available_qty"];
            $librarian_username = $_SESSION["librarian_username"];

            $result = mysqli_query($con, "UPDATE `books` SET `book_name`='$book_name',`book_author_name`='$book_author_name',`book_publication_name`='$book_publication_name',`book_purchase_date`='$book_purchase_date',`book_price`='$book_price',`book_qty`='$book_qty',`available_qty`='$available_qty',`librarian_username`='$librarian_username' WHERE `id` = '$id' ");
            
            if($result){
                ?>
                    <script type="text/javascript">
                        alert("Book issued successfully!");
                        javascript:history.go(-1);
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




<?php require_once "footer.php"; ?>






