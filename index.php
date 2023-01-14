<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.css">
</head>
<body>

    <br>
    <br>
    <br>

    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-4">
                <a class="btn btn-primary btn-block" href="student/">Student</a>
                <a class="btn btn-primary btn-block" href="librarian/">Librarian</a>
            </div>
        </div>

        <?php

        require_once "dbcon.php";

        $result_student = mysqli_query($con, "SELECT * FROM `students` ");
        $result_librarian = mysqli_query($con, "SELECT * FROM `librarian` ");

        ?>

        <div class="row" style="margin-top: 10px;">
            <div class="col-md-6 col-sm-offset-3">
                <h2 class="text-center">Login Access</h2>
                <div class="row justify-content-center mt-5">
                    <div class="col-4">
                        <form action="" method="POST">
                            <table class="table table-bordered">
                                <tr>
                                    <td colspan="3" class="text-center"><label class="fw-bold text-muted">Student Information</label></td>
                                </tr>

                                <?php
                                $sl = 1;
                                while ($row = mysqli_fetch_assoc($result_student)){
                                    ?>
                                    <tr>
                                        <th rowspan="2" class="fw-bold"><?= $sl; ?></th>
                                        <td><label for="choose">Email</label></td>
                                        <td>
                                            <p><?= $row['email'] ?></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><label for="roll">Password</label></td>
                                        <td>
                                            <p><?= $row['password'] ?></p>
                                        </td>
                                    </tr>
                                <?php
                                    $sl++;
                                }

                                ?>

                                <tr>
                                    <td colspan="3" class="text-center"><label class="fw-bold text-muted">Librarian Information</label></td>
                                </tr>

                                <?php
                                $sl = 1;
                                while ($row2 = mysqli_fetch_assoc($result_librarian)){
                                    ?>
                                    <tr>
                                        <th rowspan="2" class="fw-bold"><?= $sl; ?></th>
                                        <td><label for="choose">Email</label></td>
                                        <td>
                                            <p><?= $row2['email']; ?></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><label for="roll">Password</label></td>
                                        <td>
                                            <p><?= $row2['password']; ?></p>
                                        </td>
                                    </tr>
                                <?php
                                    $sl++;
                                }

                                ?>

                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>