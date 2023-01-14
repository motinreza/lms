<?php

require_once "../dbcon.php";

$result = mysqli_query($con, "SELECT * FROM `students` ");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print all students</title>
    <style>
        .body{
            margin: 0;
            font-family: kalpurush;
        }
        .print-area{
            width: 755px;
            height: 1050px;
            margin: auto;
            box-sizing: border-box;
            page-break-after: always;
        }
        .header, .page-info{
            text-align: center;
            margin: 0;
        }
        .data-info table{
            width: 100%;
            border-collapse: collapse;
        }
        .data-info table th,
        .data-info table td{
            border: 1px solid #555;
            padding: 4px;
            line-height: 1em;
        }
    </style>
</head>
<body onload="window.print()">
        <?php 
        
        $sl = 1;
        $page = 1;
        $total = mysqli_num_rows($result);
        $par_page = 2;

        while($row = mysqli_fetch_assoc($result)){

            if($sl % $par_page == 1){
                echo page_header();
            }

            ?>
                <tr>
                    <td><?= $sl; ?></td>
                    <td><?= $row['fname']; ?></td>
                    <td><?= $row['lname']; ?></td>
                    <td><?= $row['roll']; ?></td>
                    <td><?= $row['reg']; ?></td>
                    <td><?= $row['email']; ?></td>
                    <td><?= $row['username']; ?></td>
                    <td><?= $row['phone']; ?></td>
                </tr>
            <?php

            if($sl % $par_page == 0 || $total == $par_page){
                echo page_footer($page++);
            }

            $sl++;
        }

        ?>


</body>
</html>

<?php

function page_header(){

    $data = '
    <div class="print-area">
    <div class="header">
        <h3>Print all students</h3>
    </div>
    <div class="data-info">
        <table class="table table-bordered">
            <tr>
                <th>Serial no</th>
                <th>Fname</th>
                <th>Lname</th>
                <th>Roll</th>
                <th>Reg</th>
                <th>Email</th>
                <th>Username</th>
                <th>Phone</th>
            </tr>
    ';
    return $data;
    
}

function page_footer($page){

    $data = '
    </table>
    <div class="page-info">Page: - '.$page.'</div>
</div>
</div>
    ';
    return $data;

}

?>