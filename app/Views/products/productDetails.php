

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


ul.breadcrumb {
  padding: 10px 16px;
  list-style: none;
  background-color: #eee;
}
ul.breadcrumb li {
  display: inline;
  font-size: 18px;
}
ul.breadcrumb li+li:before {
  padding: 8px;
  color: black;
  content: "/\00a0";
}
ul.breadcrumb li a {
  color: #0275d8;
  text-decoration: none;
}
ul.breadcrumb li a:hover {
  color: #01447e;
  text-decoration: underline;
}
</style>


<?php if ($error && $error !='') : ?>
    <p class="text-danger"><?= $error ?></p>
<?php else: ?>
    <div class="row p-5" >
        <div class="row">

            <ul class="breadcrumb">
                <li><a href="/admin/products">Products</a></li>
                <li>Create Product</li>
            </ul>
        </div>
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
