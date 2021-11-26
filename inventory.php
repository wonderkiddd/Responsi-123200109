<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include 'head-items.php';
    ?>
    <title>Inventory</title>
    <?php
    include 'connection.php';

    $sql = "SELECT * FROM inventory";
    $items = mysqli_query($conn, $sql);
    ?>
    <link rel="stylesheet" type="text/css" href="indexv5.css">
</head>

<body>

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
    </div>
    <!--  ADD BUTTON -->
    <div class="add-button container-fluid">
        <a href="tambah.php" class="btn">+ Add</a>
    </div>

    <!-- LIST INVENTARIS -->
    <div class="container-fluid">
        <div class="table-container container float-end">
            <table class="table table-white table-hover" border="1" cellspacing="0" cellpadding="10">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Code</th>
                        <th class="text-center">Name of Goods</th>
                        <th class="text-center">Amount</th>
                        <th class="text-center">Satuan</th>
                        <th class="text-center">Coming Date</th>
                        <th class="text-center">Category</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Unit Price</th>
                        <th class="text-center">Total Price</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <?php
                $no = 1;
                $total_inventaris = 0;
                while ($hasil = mysqli_fetch_array($items)) {
                    $total_inventaris = $total_inventaris + ($hasil['price'] * $hasil['amount']);
                ?>
                    <tbody>
                        <tr>
                            <td class="text-center"><?php echo $no; ?></td>
                            <td class="text-center"><?php echo $hasil['item_id']; ?></td>
                            <td class="text-center"><?php echo $hasil['item_name']; ?></td>
                            <td class="text-center"><?php echo $hasil['amount']; ?> </td>
                            <td class="text-center"><?php echo $hasil['unit']; ?></td>
                            <td class="text-center"><?php echo $hasil['arrival_date']; ?></td>
                            <td class="text-center"><?php echo $hasil['category']; ?></td>
                            <td class="text-center"><?php echo $hasil['item_status']; ?></td>
                            <td class="text-center">Rp.<?php echo number_format($hasil['price'], 2); ?></td>
                            <td class="text-center">Rp.<?php echo number_format($hasil['price'] * $hasil['amount'], 2); ?></td>
                            <td class="text-center">
                                <a href="edit.php?id=<?php echo $hasil['item_id']; ?>" name="edit" class="btn">Edit
                                </a> 
                                <a href="delete.php?id=<?php echo $hasil['item_id']; ?>" name="delete" class="btn" onclick="return confirm('Are You Sure You Want to Delete The Chair')">Delete
                                </a>
                            </td>
                        </tr>
                    </tbody>
                <?php
                    $no++;
                }
                ?>
            </table>
            <p class="text-center">
                Total Inventory = <?php echo number_format($total_inventaris, 2); ?>
            </p>
        </div>
    </div>

    <!-- Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>