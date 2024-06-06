

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<style>
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
<div class="row p-5">
   
    <div class="row">

        <ul class="breadcrumb">
            <li><a href="/store">Store</a></li>
            <li>Order Details</li>
        </ul>
    </div>

    <?php if (isset($sale['id'] ) && $sale['id'] !='') : ?>
        <div class="alert alert-success" role="alert">
            
            <h4 class="alert-heading">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle" viewBox="0 0 16 16">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                    <path d="m10.97 4.97-.02.022-3.473 4.425-2.093-2.094a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05"/>
                </svg>
                Order Placed! 
            </h4>
           
            <p>Well done, you have successfully placed an order and it is being prepared, please be ready for it.</p>
            
        </div>
        
    <?php endif; ?>

    <div class="col-md-8 m-auto">
        <?php if (isset($error) && $error !='') : ?>
        <p class="text-danger"><?= $error ?></p>
        <?php else: ?>
                <div class="card m-auto" style="width: 18rem;">
                    <img src="/img/burger1.jpg"" class="card-img-top" alt="product">
                    <div class="card-body">
                        <h5 class="card-title"><?= $sale['title'] ?></h5>
                        <p class="card-text"><?= $sale['date'] ?></p>
                        <small class="btn btn-warning">R <?= $sale['price'] ?></small>
                    </div>
                </div>
                
        <?php endif; ?>

    </div>
</div>


