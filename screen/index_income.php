<?php
include_once('../class/income.php');
include_once('../class/items.php');

$income = new income_item;
$data_income = $income->index();

$getname = new list_item;
$getname_item = $getname->index();


if (isset($_POST['store'])) {
    $income->store();
}
if (isset($_POST['destroy'])) {
    $income->destroy();
}
if (isset($_POST['update'])) {
    $income->update();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
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
            include('../widget/sidebar.php')
            ?>
            <div class="col-md-10">
                <div class="row">

                    <div class="col-md-6">
                        <h4>Daftar Barang Masuk</h4>
                    </div>
                    <div class="col-md-6 text-end mt-4">
                        <!-- Button trigger modal -->
                        <button type="button" class="add btn btn-success" data-bs-toggle="modal" data-bs-target="#addIncome">
                            <i class="bi bi-plus"></i> tambah
                        </button>

                        <!-- Modal Tambah -->
                        <div class="modal fade" id="addIncome" tabindex="-1" aria-labelledby="addIncomeLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="addIncomeLabel">Tambah barang</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form method="POST" action="">
                                        <div class="modal-body text-start">
                                            <div class="mb-3">
                                                <label for="date_income">Tanggal Masuk</label>
                                                <input type="datetime-local" class="form-control" name="date_income">
                                            </div>
                                            <div class="mb-3">
                                                <label for="form-control" class="form-label">Nama Barang</label>
                                                <select class="form-select" aria-label="Default select example" name="list_item_id">
                                                    <option value=""></option>
                                                    <?php foreach ($getname_item as $key => $item) : ?>
                                                        <option value="<?= $item['id'] ?>"><?= $item['name'] ?></option>
                                                    <?php endforeach ?>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="price">Jumlah Barang</label>
                                                <input type="number" class="form-control" name="total_income">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-success" name="store">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="p-2">
                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tanggal masuk</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Stok</th>
                                <th scope="col">action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data_income as $key => $item) : ?>
                                <tr>
                                    <th scope="row"><?= $key + 1 ?></th>
                                    <td><?= $item['date_income']; ?></td>
                                    <td>
                                        <?= $item['name']; ?>
                                    </td>
                                    <td><?= $item['total_income']; ?></td>
                                    <td>

                                        <!-- Button trigger modal -->
                                        <button type="button" class="add btn btn-outline-light " data-bs-toggle="modal" data-bs-target="#editIncome?<?= $item['id'] ?>">
                                            </i> edit
                                        </button>

                                        <!-- Modal edit -->
                                        <div class="modal fade" id="editIncome?<?= $item['id'] ?>" tabindex="-1" aria-labelledby="editIncomeLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5 text-dark" id="editIncomeLabel">Edit barang</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <form method="POST" action="">
                                                        <input type="hidden" name="id" value="<?= $item['id'] ?>">
                                                        <div class="modal-body text-start text-dark">
                                                            <div class="mb-3">
                                                                <label for="date_income">Tanggal Masuk</label>
                                                                <input type="datetime-local" class="form-control" name="date_income" value="<?= $item['date_income']; ?>">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="form-control" class="form-label">Nama Barang</label>
                                                                <select class="form-select" aria-label="Default select example" name="list_item_id">
                                                                    <option value=""></option>
                                                                    <?php foreach ($getname_item as $key => $name) : ?>
                                                                        <option value="<?= $name['id'] ?>" <?= ($item['list_item_id'] == $name['id']) ? 'selected' : '' ?>>
                                                                            <?= $name['name'] ?>
                                                                        </option>
                                                                    <?php endforeach ?>
                                                                </select>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="total_income">Jumlah Barang</label>
                                                                <input type="number" class="form-control" name="total_income" value="<?= $item['total_income'] ?>">
                                                            </div>

                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-success" name="update">Submit</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Button trigger modal -->
                                        <button type="button" class="add btn btn-light " data-bs-toggle="modal" data-bs-target="#deleteIncome?<?= $item['id'] ?>">
                                            </i> delete
                                        </button>

                                        <!-- Modal delete -->
                                        <div class="modal fade" id="deleteIncome?<?= $item['id'] ?>" tabindex="-1" aria-labelledby="deleteIncomeLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5 text-dark" id="deleteIncomeLabel">Delete barang</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <form method="POST" action="">
                                                        <input type="hidden" name="id" value="<?= $item['id'] ?>">
                                                        <div class="text-dark p-3"><span>Apakah kamu yakin akan menghapus <?= $item['name']; ?> ?</span></div>
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-danger" name="destroy">Submit</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach ?>

                        </tbody>
                    </table>
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