<?php

require_once "header.php";

if(isset($_POST["save_book"])){

    $book_name = $_POST["book_name"];
    $book_author_name = $_POST["book_author_name"];
    $book_publication_name = $_POST["book_publication_name"];
    $book_purchase_date = $_POST["book_purchase_date"];
    $book_price = $_POST["book_price"];
    $book_qty = $_POST["book_qty"];
    $available_qty = $_POST["available_qty"];
    $librarian_username = $_SESSION["librarian_username"];


    $image_exp = explode('.', $_FILES["book_image"]["name"]);
    $image_ext = end($image_exp);
    $image_name = date("Ymdhis").'.'.$image_ext;


    $input_errors = array();
    
    if(empty($book_name)){
        $input_errors["book_name"] = "Book name field is required!";      
    }

    if(empty($image_name)){  
        $input_errors["image_name"] = "Image field is required!";       
    }

    if(empty($book_author_name)){  
        $input_errors["book_author_name"] = "Book author name field is required!";       
    }

    if(empty($book_publication_name)){   
        $input_errors["book_publication_name"] = "Book publication name field is required!";     
    }

    if(empty($book_purchase_date)){   
        $input_errors["book_purchase_date"] = "Book purchase name field is required!";    
    }

    if(empty($book_price)){
        $input_errors["book_price"] = "Book price field is required!";  
    }

    if(empty($book_qty)){ 
        $input_errors["book_qty"] = "Book quentity field is required!";    
    }
    
    if(empty($available_qty)){  
        $input_errors["available_qty"] = "Available quentity field is required!";   
    }


    if(count($input_errors) == 0){

        $book_result = mysqli_query($con, "INSERT INTO `books`(`book_name`, `book_image`, `book_author_name`, `book_publication_name`, `book_purchase_date`, `book_price`, `book_qty`, `available_qty`, `librarian_username`) VALUES ('$book_name','$image_name','$book_author_name','$book_publication_name','$book_purchase_date','$book_price','$book_qty','$available_qty','$librarian_username') ");

        if($book_result){

            move_uploaded_file($_FILES["book_image"]["tmp_name"], "../images/book/".$image_name);

            $success = "Data save successfull!";

        }else{

            $error = "Data not save!";
            
        }

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
                    <li><a href="javascript:avoid(0)">Add book</a></li>
                </ul>
            </div>
        </div>
        <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
        <div class="row animated fadeInUp">
            <div class="col-sm-6 col-sm-offset-3">

                <?php
                
                if(isset($success)){
                    ?>

                    <div class="alert alert-info" role="alert">
                        <?= $success; ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <?php
                }
                
                ?>

                <?php
                
                if(isset($error)){
                    ?>

                    <div class="alert alert-info" role="alert">
                        <?= $error; ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <?php
                }
                
                ?>

                <div class="panel">
                    <div class="panel-content">
                        <div class="row">
                            <div class="col-md-12">
                                <form class="form-horizontal" method="POST" enctype="multipart/form-data">
                                    <h5 class="mb-lg text-center">Add Book <hr></h5>
                                    <div class="form-group">
                                        <label for="book_name" class="col-sm-4 control-label">Book name</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="book_name" id="book_name" placeholder="Book name">
                                        
                                            <?php if(isset($input_errors["book_name"])){ echo "<span class='text-danger' >".$input_errors["book_name"]."</span>"; } ?>

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="book_image" class="col-sm-4 control-label">Book image</label>
                                        <div class="col-sm-8">
                                            <input type="file" class="form-control" name="book_image" id="book_image" placeholder="Book image">

                                            <?php if(isset($input_errors["book_image"])){ echo "<span class='text-danger' >".$input_errors["book_image"]."</span>"; } ?>

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="book_author_name" class="col-sm-4 control-label">Author name</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="book_author_name" id="book_author_name" placeholder="Book author name">
                                        
                                            <?php if(isset($input_errors["book_author_name"])){ echo "<span class='text-danger' >".$input_errors["book_author_name"]."</span>"; } ?>

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="book_publication_name" class="col-sm-4 control-label">Publication name</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="book_publication_name" id="book_publication_name" placeholder="Book publication name">
                                        
                                            <?php if(isset($input_errors["book_publication_name"])){ echo "<span class='text-danger' >".$input_errors["book_publication_name"]."</span>"; } ?>

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="book_purchase_date" class="col-sm-4 control-label">Purchase date</label>
                                        <div class="col-sm-8">
                                            <input type="date" class="form-control" name="book_purchase_date" id="book_purchase_date">

                                            <?php if(isset($input_errors["book_purchase_date"])){ echo "<span class='text-danger' >".$input_errors["book_purchase_date"]."</span>"; } ?>

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="book_price" class="col-sm-4 control-label">Book price</label>
                                        <div class="col-sm-8">
                                            <input type="number" class="form-control" name="book_price" id="book_price" placeholder="Book price">
                                        
                                            <?php if(isset($input_errors["book_price"])){ echo "<span class='text-danger' >".$input_errors["book_price"]."</span>"; } ?>

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="book_qty" class="col-sm-4 control-label">Book quantity</label>
                                        <div class="col-sm-8">
                                            <input type="number" class="form-control" name="book_qty" id="book_qty" placeholder="Book quantity">
                                        
                                            <?php if(isset($input_errors["book_qty"])){ echo "<span class='text-danger' >".$input_errors["book_qty"]."</span>"; } ?>

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="available_qty" class="col-sm-4 control-label">Available quantity</label>
                                        <div class="col-sm-8">
                                            <input type="number" class="form-control" name="available_qty" id="available_qty" placeholder="Available quantity">
                                        
                                            <?php if(isset($input_errors["available_qty"])){ echo "<span class='text-danger' >".$input_errors["available_qty"]."</span>"; } ?>

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-offset-4 col-sm-8">
                                            <button type="submit" name="save_book" class="btn btn-primary"><i class="fa fa-save"></i> Save book</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->

<?php

require_once "footer.php";

?>