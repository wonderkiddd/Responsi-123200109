<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include 'head-items.php';
    ?>
    <?php
    include 'connection.php';

    $kode_barang = $_GET['id'];
    $query2 = "SELECT * FROM inventory WHERE item_id = '$kode_barang'";
    $result = mysqli_query($conn, $query2);
    $data = mysqli_fetch_array($result);
    ?>
    <title>Tambah Inventaris</title>

    <link rel="stylesheet" type="text/css" href="indexv5.css">
</head>

<body>

    <div class="header">
        <label>LIST OF INVENTORY EVERYTHING OFFICE</label>
    </div>
    <div class="navedit">
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


    <!-- FORM UBAH INVENTARIS -->
    <div class="edit-inventaris container">
        <div class="form-container container w-50">
            <div class="form-title-container container-fluid d-flex justify-content-center border">
                <span class="form-title text-white">Change Inventory Data</span>
            </div>
            <br>
            <form action="" class="edit-inventaris" method="post">
                <div class="row mb-3">
                    <label for="inputKode_Barang3" class="col-sm-3 col-form-label">Item code</label>
                    <div class="col-sm-9">
                        <input type="text" name="item_code" class="form-control" id="inputKode_Barang3">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputNama_Barang3" class="col-sm-3 col-form-label">Name of Goods</label>
                    <div class="col-sm-9">
                        <input type="text" name="item_name" class="form-control" id="inputNama_Barang3">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputJumlah3" class="col-sm-3 col-form-label">Amount</label>
                    <div class="col-sm-4">
                        <input type="number" name="item_quantity" class="form-control" id="inputJumlah3">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputSatuan3" class="col-sm-3 col-form-label">Unit</label>
                    <div class="col-sm-4">
                        <input type="text" name="item_unit" class="form-control" id="inputSatuan3">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputTanggal_Datang3" class="col-sm-3 col-form-label">Coming Date</label>
                    <div class="col-sm-6">
                        <input type="date" name="in_date" class="form-control" id="inputTanggal_Datang3">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputKategori3" class="col-sm-3 col-form-label">Category</label>
                    <div class="col-sm-6">
                        <select name="kategori" id="kategori" class="form-select">
                            <option value="Bangunan">Building</option>
                            <option value="Kendaraan">Vehicle</option>
                            <option value="Alat Tulis Kantor">Office Stationery</option>
                            <option value="Elektronik">Electronic</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputStatus3" class="col-sm-3 col-form-label">Status</label>
                    <div class="col-sm-auto">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="Baik">
                            <label class="form-check-label" for="inlineRadio1">Well</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="Perawatan">
                            <label class="form-check-label" for="inlineRadio2">Maintenance</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="Rusak">
                            <label class="form-check-label" for="inlineRadio3">Damaged</label>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputHarga_Satuan3" class="col-sm-3 col-form-label">Unit price</label>
                    <div class="col-sm-9">
                        <input type="number" name="item_price" class="form-control" id="inputHarga_Satuan3">
                    </div>
                </div>
                <center>
                    <button type="submit" class="btn" name="submit">Change</button>
                    <button type="reset" class="btn" value="Reset">Cancel</button>
                </center>
            </form>
        </div>

        <?php
        if (isset($_POST['submit'])) {
            $kode = $_POST['item_code'];
            $nama_barang = $_POST['item_name'];
            $jumlah = $_POST['item_quantity'];
            $satuan = $_POST['item_unit'];
            $tanggal = $_POST['in_date'];
            $kategori = $_POST['kategori'];
            $status = $_POST['inlineRadioOptions'];
            $harga = $_POST['item_price'];

            $query = "UPDATE `inventory` SET `item_id`='$kode',`item_name`='$nama_barang',`amount`=$jumlah,`unit`='$satuan',`arrival_date`='$tanggal',`category`='$kategori',`item_status`='$status',`price`=$harga WHERE `item_id`='$kode_barang'";
            $run = mysqli_query($conn, $query);
        }

        ?>

        <!-- Bootstrap JavaScript -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>