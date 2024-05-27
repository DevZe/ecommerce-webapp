
<?= $this->extend('layouts/layout') ?>
<?= $this->section('content') ?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

<style type="text/css">
    
    .price {
        color: orange;
        text-decoration: underline;
        text-align: center;
    }

    .card-body {
        background-color: #D3D3D3;
    }

</style>

<?php if ($error && $error !='') : ?>
    <p class="text-danger"><?= $error ?></p>
<?php else: ?>
    <div class="row">
    <div class="col-8 m-auto">
        <?php if ($id == '') : ?>
            <h3 class="text-success text-center">Product Inserted Successfilly!</h3>
            <hr/>
        <?php endif; ?>

        <div class="card m-auto" style="width: 18rem;">
        <img src="<?= $image_url ?>" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title text-center"><?= $title ?></h5>
            <hr/>
            <p class="card-text text-center"><?= $description ?></p>
            <h5 class="price">R <?= $price ?></h5>
          
            <a href="/admin/products/edit/<?= $id ?>" class="btn btn-primary m-auto">Edit</a>
            
            <?php if ($id && $id != '') : ?>
                <a href="/admin/products/delete/<?= $id ?>" class="btn btn-danger m-auto">Delete</a>
            <?php endif; ?>

            
        </div>
        </div>
    </div>
</div>
<?php endif; ?>
<?= $this->endSection() ?>