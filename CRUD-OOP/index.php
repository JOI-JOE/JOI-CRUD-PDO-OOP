<?php
    include_once 'classes/Register.php';
    $re = new Register();

    if(isset($_GET['delStd'])){
        $id = base64_decode($_GET['delStd']);
        $delStudent = $re ->delStudent($id);
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>All Student</title>
</head>

<body>
    <br>
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-md-12">
                <div class="card shadow">
                    <?php
                    if (isset($delStudent)) {
                    ?>
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong><?= $delStudent ?></strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php
                    }
                    ?>
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6">
                                <h3>All Student Infor</h3>
                            </div>
                            <div class="col-md-6">
                                <a href="addstd.php" class="btn btn-info float-right">Add Student</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Photo</th>
                                    <th>Address</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $allStd = $re->allStudent();
                                if ($allStd) {
                                    while ($row = $allStd->fetch(PDO::FETCH_ASSOC)) {
                                ?>
                                        <tr>

                                            <td><?= $row['name'] ?></td>
                                            <td><?= $row['email'] ?></td>
                                            <td><?= $row['phone'] ?></td>
                                            <td><img src="<?= $row['photo'] ?>" width="100" class="img-fluid"></td>
                                            <td><?= $row['address'] ?></td>
                                            <td>
                                                <a href="edit.php?id=<?= base64_encode($row['id']) ?>" class="btn btn-sm btn-sm btn-warning">Edit</a>
                                                <a href="?delStd=<?= base64_encode($row['id']) ?>" onclick="return confirm('are you sure to delete')" class="btn btn-sm btn-sm btn-danger">Remove</a>
                                            </td>

                                        </tr>
                                <?php
                                    }
                                }
                                ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>