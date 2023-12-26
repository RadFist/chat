<?php
session_start();
include "connection.php";
if (isset($_POST['Sign-in'])){
$user = $_POST["username"];
$pass = $_POST["password"];
$confirm = $_POST["confirm"];
if($pass==$confirm){
    $pass = password_hash($pass, PASSWORD_DEFAULT);
    $data = $connection->query("SELECT MAX(id_login) as max FROM tb_login");
    $row = $data->fetch_assoc();
    $maxId = $row['max'];
    $maxId = $maxId+1;
    $connection->query("INSERT INTO `tb_login`(`username`, `password`, `status`, `id_user`) VALUES ('$user','$pass','offline','$maxId')");
    $connection->query("INSERT INTO `tb_user`(`id_user`, `name`, `username`, `foto`) VALUES ('$maxId','','$user','')");
    if($connection){
     $_SESSION["user"] = array(
            "id_user"=>$maxId,
            "username"=>$user
            );
    header("location: public/menu_chat.php");
    }else{
    echo "gagal memuat";
    }
    }else{
        echo "
        <script>
        document.addEventListener('DOMContentLoaded', function() {
            const input_pass = document.getElementById('password');
            const input_confirm = document.getElementById('password-confirm');
            const error_msg = document.getElementById('error_msg');
            input_pass.classList.add('worng-input');
            input_confirm.classList.add('worng-input');
            error_msg.removeAttribute('hidden');
        });        
        </script>";
    }
}
?>

    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrapt -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style/style.css">
    <title>Login</title>
</head>
<body>
    <div class="container mt-5 pt-5">
        <div class="row">
            <div class="col-12 col-sm-8 col-md-5 m-auto ">
                <div class="card">
                    <div class="card-body">
                    <form action="" method="POST" class="mb-2">
                            <h2 class="text-center mb-3">Register</h2>
                            <div class="form-grup">
                                <label for="username">username</label>
                                <input type="text" name="username" id="username" class="form-control" required>
                            </div>
                            <div class="form-grup mt-2">
                                <label for="password">password</label>
                                <input type="password" name="password" id="password" class="form-control" required>
                            </div>
                            <div class="form-grup mt-2 mb-2">
                                <label for="password-confirm">confirm</label>
                                <input type="password" name="confirm" id="password-confirm" class="form-control" required>
                            </div>
                            <p hidden id="error_msg" class="text-danger">*password dan konfirmasi password tidak cocok</p>
                        <input type="Submit" name="Sign-in" value="Sign-in" class="btn bg-primary " >
                    </form>
                    <a href="index.php">sudah punya akun?</a>
            </div>
        </div>
    </div>
    </div>
    </div>
</body>
</html>    