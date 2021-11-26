<?php
include 'connection.php';
session_start();
if (!isset($_SESSION['log'])) {
    header('location: admin/login.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include 'head-items.php';
    ?>

    <link rel="stylesheet" type="text/css" href="indexv5.css">
    <title>Home</title>
</head>

<body>
    <!--  HEADER -->
    <div class="header">
        <label>LIST OF INVENTORY EVERYTHING OFFICE</label>
    </div>
    <div class="nav">
        <div class="left-nav">
            <div class="home-btn">
             <a href="home.php">Home</a>
            </div>
            <div class="register-btn">
                <a href="inventory.php">Inventory</a>
            </div>
            <div class="list-btn">Category List
                <div class="submenu3">
                    <div>Building</div>
                    <div>Vehicle</div>
                    <div>Office Inventory</div>
                    <div>Electronic</div>
                </div>
            </div>
        </div>
        <div class="logout-btn">
            <button class="btn"><a href="admin/logout.php">Logout</a></button>
        </div>
    </div>
    <div class="main">

        <button class="tambah"><a href="tambah.php">+ Add</a></button>
        <label class="ucapan">Welcome
             <?php echo "<h1>" . $_SESSION['full_name'] ."!". "</h1>"; ?>
        </label>


    </div>
    <div class="footer">Investaris 2016</div>

    <!-- Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>