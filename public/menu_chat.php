<?php
session_start();
if(!isset($_SESSION["user"])){
    header("location: ../index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../style/style.css">
    <title>Document</title>
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-12 col-sm-8 col-md-9 m-auto ">
                <div class="card border-3">
                    <div class="card-body p-4">
                        <div class="card-title d-flex align-items-center mb-3 mx-2">
                            <img src="../image/avatar.png" alt="" style="width: 60px;" class="rounded-circle me-3">
                            <h2><?php echo $_SESSION['user']['username'] ?></h2>
                            <a href="logout.php" class="btn btn-danger ms-auto">Logout</a>
                        </div>
                        
                        <div class="input-group m-auto mb-2">
                            <input type="text" class="form-control" placeholder="search user">
                            <button class="btn btn-outline-secondary">Search</button>
                        </div>

                        <!-- user chating display start-->
                        <div class="card border-0">
                            <div class="card-body d-flex align-items-center">
                                <img src="../image/avatar.png" alt="" style="width: 60px;" class="rounded-circle me-3">
                                <div class="d-flex row">
                                    <h5 class="m-0">Rifansyah</h5>
                                    <p class="m-0">start chating</p>
                                </div>
                            </div>

                        <div class="card border-0">
                            <div class="card-body d-flex align-items-center">
                                <img src="../image/avatar.png" alt="" style="width: 60px;" class="rounded-circle me-3">
                                <div class="d-flex row">
                                    <h5 class="m-0">Joni</h5>
                                    <p class="m-0">p mabar cuk</p>
                                </div>
                            </div>

                        <div class="card border-0">
                            <div class="card-body d-flex align-items-center">
                                <img src="../image/avatar.png" alt="" style="width: 60px;" class="rounded-circle me-3">
                                <div class="d-flex row">
                                    <h5 class="m-0">Jono</h5>
                                    <p class="m-0">say hello</p>
                                </div>
                            </div>
                            <!-- user chating display end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>