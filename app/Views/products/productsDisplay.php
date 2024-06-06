<?= $this->extend('layouts/layout') ?>
<?= $this->section('content') ?>
<link href="/assets/css/productsDisplay.css" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<section>
<div class="row">
   
    <div class="col-md-8" style="background-color:#F4F1F1;border-radius:8px">
    <h1>
    <a href="/admin/product/new">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
            </svg>
           
    </a>
        Add a new product
        <hr/>
  </h1>
    </div>
</div>
<div class="col-8">
  
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