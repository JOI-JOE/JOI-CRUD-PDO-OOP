<?php
include_once 'classes/Register.php';
$re = new Register();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $register = $re->addRegister($_POST, $_FILES);
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
                                <h3>Add Student</h3>
                            </div>
                            <div class="col-md-6">
                                <a href="index.php" class="btn btn-info float-right">Show Student Infor</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">

                        <form action="" method="POST" enctype="multipart/form-data">
                            <label for="">Name</label>
                            <input type="text" name="name" placeholder="Enter Your Name" class="form-control">

                            <label for="">Email</label>
                            <input type="email" name="email" placeholder="Enter Your Email" class="form-control">

                            <label for="">Phone</label>
                            <input type="number" name="phone" placeholder="Enter Your Number" class="form-control">

                            <label for="">Photo</label>
                            <input type="file" name="photo" placeholder="Enter Your Image" class="form-control">

                            <label for="">Address</label>
                            <textarea name="address" class="form-control"></textarea><br>

                            <input type="submit" value="Register" class="btn btn-success form-control">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>