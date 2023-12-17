<?php
include_once 'classes/Register.php';
$re = new Register();

if(isset($_GET['id'])){
    $id =  base64_decode($_GET['id']);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $register = $re->updateStudent($_POST, $_FILES, $id);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Registration Form</title>
</head>

<body>
    <br>
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-md-6">
                <div class="card shadow">
                    <?php
                    if (isset($register)) {
                    ?>
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong><?= $register ?></strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php
                    }
                    ?>
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6">
                                <h3>Update Student</h3>
                            </div>
                            <div class="col-md-6">
                                <a href="index.php" class="btn btn-info float-right">Show Student Infor</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                    <?php
                        $getStd = $re -> getStdById($id);
                        if($getStd){
                            while($row = $getStd ->fetch(PDO::FETCH_ASSOC)){
                    ?>
                        <form action="" method="POST" enctype="multipart/form-data">
                            <label for="">Name</label>
                            <input type="text" name="name" value="<?= $row['name']?>" class="form-control">

                            <label for="">Email</label>
                            <input type="email" name="email" value="<?= $row['email']?>" class="form-control">

                            <label for="">Phone</label>
                            <input type="number" name="phone"  value="<?= $row['phone']?>" class="form-control">

                            <label for="">Photo</label>
                            <input type="file" name="photo" class="form-control">
                            <img src="<?= $row['photo']?>" width="200" class="img-thumbnail">
                            <br>

                            <label for="">Address</label>
                            <textarea name="address" class="form-control"><?= $row['address']?>
                            </textarea><br>

                            <input type="submit" value="Update Student" class="btn btn-success form-control">
                        </form>
                    <?php
                            }
                        }
                    
                    ?>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>