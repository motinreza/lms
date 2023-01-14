<?php

require_once "header.php";

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

            <?php
            
            $students = mysqli_query($con, "SELECT * FROM `students` ");
            $total_student = mysqli_num_rows($students);
            
            ?>

            <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="panel widgetbox wbox-1 bg-darker-1">
                    <a href="students.php">
                        <div class="panel-content">
                            <h1 class="title color-w"><i class="fa fa-users"></i> <?= $total_student; ?> </h1>
                            <h4 class="subtitle color-lighter-1">Total students</h4>
                        </div>
                    </a>
                </div>
            </div>

            <?php
            
            $librarian = mysqli_query($con, "SELECT * FROM `librarian` ");
            $total_librarian = mysqli_num_rows($librarian);
            
            ?>

            <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="panel widgetbox wbox-1 bg-darker-1">
                    <a href="#">
                        <div class="panel-content">
                            <h1 class="title color-w"><i class="fa fa-user"></i> <?= $total_librarian; ?> </h1>
                            <h4 class="subtitle color-lighter-1">Total librarian</h4>
                        </div>
                    </a>
                </div>
            </div>

            <?php
            
            $books = mysqli_query($con, "SELECT * FROM `books` ");
            $total_books = mysqli_num_rows($books);

            $book_qty = mysqli_query($con, "SELECT SUM(`book_qty`) AS `total` FROM `books` ");
            $qty = mysqli_fetch_assoc($book_qty);

            $book_a_qty = mysqli_query($con, "SELECT SUM(`available_qty`) AS `total` FROM `books` ");
            $qty_a = mysqli_fetch_assoc($book_a_qty);
            
            ?>

            <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="panel widgetbox wbox-1 bg-darker-1">
                    <a href="manage_books.php">
                        <div class="panel-content">
                            <h1 class="title color-w"><i class="fa fa-book"></i> <?= $total_books.' ('.$qty['total'].' - '.$qty_a['total'].')'; ?> </h1>
                            <h4 class="subtitle color-lighter-1">Total books</h4>
                        </div>
                    </a>
                </div>
            </div>

        </div>

        <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->

<?php

require_once "footer.php";

?>