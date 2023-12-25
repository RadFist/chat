<?php 
session_start();
include "connection.php";
if (isset($_POST['submit'])){
    $user = $connection->real_escape_string($_POST["username"]);
    $pass = $_POST["password"];
    
    $stmt = $connection->prepare("SELECT * FROM tb_login WHERE username = ?");
    $stmt->bind_param("s", $user);//isi dari tanda tanya yang bertipe s atau string
    $stmt->execute(); //menjalankan statemen
    $result = $stmt->get_result();
    if($result->num_rows > 0 ){
        $data_tamp = $result->fetch_assoc(); //mengambil data query menjadi array
        if(password_verify($pass,$data_tamp["password"])){
        $_SESSION["user"] = array(
        "id_login"=>$data_tamp["id_login"],
        "username"=>$data_tamp["username"]
        );
        $aktif = $_SESSION["user"]["id_login"];
        $connection->query("UPDATE tb_login SET status='online' WHERE id_login='$aktif'");
        header("location: public/menu_chat.php");
        }else{
            header("location: index.php?error");
        }
    }else{
        header("location: index.php?error");
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
    <title>Login</title>
</head>
<body>
    <div class="container mt-4 pt-4 m-auto">
        <div class="row">
            <div class="col-12 col-sm-8 col-md-5 m-auto ">
                <div class="card">
                    <div class="card-body p-4">
                        <div class="d-flex justify-content-center mb-3">
                            <img src="image/avatar.png" alt="image-profile" class="img-fluid rounded-circle border border-2" style="width: 110px; height: 110px;">
                        </div>
                    <form action="" method="POST" class="mb-2">
                            <h2 class="text-center mb-3">Login</h2>
                            <div class="form-grup">
                                <label for="username">username</label>
                                <input type="text" name="username" id="username" class="form-control" required>
                            </div>
                            <div class="form-grup mt-2">
                                <label for="password">password</label>
                                <input type="password" name="password" id="password" class="form-control" required>
                            </div>
                        <input type="Submit" name="submit" value="Login" class="mt-3 btn bg-primary " >
                </form>
                <a href="register.php">dont have a acount?</a>
            </div>
        </div>
    </div>
    </div>
    </div>
</body>
</html>