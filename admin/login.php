<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS -->
    <link rel="stylesheet" href="../style/design.css">
    <link rel="stylesheet" href="../style/design2.css">
    <link rel="stylesheet" type="text/css" href="../loginv1.css">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rozha+One&display=swap" rel="stylesheet">

    <title>Login</title>
</head>

<body>

    <div class="all-cont container d-flex justify-content-center">
        <div class="form-container">

            
            <!-- ISI -->
            <form action="" method="POST" autocomplete="off" class="card">
                <h1 class="card-title-f text-center">LOGIN</h1>

                <div class="mb-3">
                    <label for="Username" class="form-label">Username</label>
                    <input type="text" name="username" class="form-control" id="Username" placeholder="Enter Your Username">
                </div>
                <div class="mb-3">
                    <label for="Password" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="Password" placeholder="Enter your password">
                </div>
                <div class="tombol d-grid gap-2">
                    <button type="submit" class="btn-custom btn" name="login">Login</button>
                </div>
                <br>
            </form>
            <?php
            if (isset($_POST['login'])) {
                $conn = mysqli_connect('localhost', 'root', '', 'responsi');
                //echo "LOGIN BERHASIL";
                $username = $_POST['username'];
                $password = $_POST['password'];

                $sql_username = "SELECT * FROM staff WHERE username='$username'";
                $cek_username = mysqli_query($conn, $sql_username);
                $row = mysqli_num_rows($cek_username);

                if ($row === 1) {
                    $fetch_pass = mysqli_fetch_assoc($cek_username);
                    $cek_password = $fetch_pass['password'];

                    $fullname = $fetch_pass['full_name'];
                    $_SESSION['username']=$username;
                    $_SESSION['full_name']=$fullname;
                    if ($cek_password <> $password) {
                        echo "<script>alert('Password Incorrect');</script>";
                    } else {
                        $_SESSION['log'] = true;
                        echo "<html><script>alert('Login Berhasil');document.location.href='../home.php'</script></html>";
                    }
                } else {
                    echo "<script>alert('Username Incorrect');</script>";
                }
            }
            ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>