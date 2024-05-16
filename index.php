<?php 
include_once ('class/items.php');
include_once ('class/income.php');
include_once ('class/expend.php');
include_once('class/stock.php');

$barang = new list_item;
$data_barang = $barang->index();
$daftar_barang = count($data_barang);

$barang_masuk = new income_item;
$data_masuk = $barang_masuk->index();
$daftar_masuk = count($data_masuk);

$barang_keluar= new expend_item;
$data_keluar = $barang_keluar->index();
$daftar_keluar = count($data_keluar);

$summary = new stock;
$get_summary = $summary->getItemSummary();
$data_summary = count($get_summary);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  <title>Coopify</title>
</head>

<body>
  <div class="container-fluid">
    <div class="row">
      <?php
      include('./widget/sidebar.php')
      ?>
      <div class="col-md-10">
        <h4>Dashboard</h4>
        <div class="row  p-3">
          <div class="col-md-3">
            <div class="card">
              <div class="card-body">
                <div class="row justify-content-between">
                  <div class="col-7">
                    <div class="header"><?=$daftar_barang?></div>
                    <div>Daftar barang</div>
                  </div>
                  <div class="col-5 text-end"><i class="bi bi-box-fill"></i></div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="card">
              <div class="card-body">
                <div class="row justify-content-between">
                  <div class="col-7">
                    <div class="header"><?=$daftar_masuk?></div>
                    <div>Barang masuk</div>
                  </div>
                  <div class="col-5 text-end"><i class="bi bi-clipboard2-plus-fill"></i></div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="card">
              <div class="card-body">
                <div class="row justify-content-between">
                  <div class="col-7">
                    <div class="header"><?=$daftar_keluar?></div>
                    <div>Barang keluar</div>
                  </div>
                  <div class="col-5 text-end"> <i class="bi bi-clipboard2-minus-fill"></i></div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="card">
              <div class="card-body">
                <div class="row justify-content-between">
                  <div class="col-7">
                    <div class="header"><?=$data_summary?></div>
                    <div>Stock opname</div>
                  </div>
                  <div class="col-5 text-end"><i class="bi bi-dropbox"></i></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div>
          
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

</body>

</html>