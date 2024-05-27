
<?= $this->extend('layouts/layout') ?>
<?= $this->section('content') ?>
<link href="/assets/css/productsDisplay.css" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<section>

<div class="col-8">
    <h2 style="text-align:center">All Items on Menu</h2>

    <table style="margin:15px">
        <tr>
            <th>#</th>
            <th>Item title</th>
            <th>Description</th>
            <th>Price</th>
            <th>View</th>
        </tr>

        <?php foreach ($products as $key => $value): ?>
            <a href="/products/productDetails/<?= $value['id'] ?>">
                <tr>
                
                    <td><?= $key; ?></td>
                    <td><?= $value['title']; ?></td>
                    <td><?= $value['description']; ?></td>
                    <td><?= $value['price']; ?></td>
                    <td>
                        <a class="btn" href="/admin/products/<?= $value['id']; ?>">
                            <span class="glyphicon glyphicon-eye-open"></span>
                        </a>
                    </td>
                </tr>
            </a>
        <?php endforeach; ?>

    </table>
</div>
</section>
<?= $this->endSection() ?>