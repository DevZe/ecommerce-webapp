
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
    <li><a href="/admin/products">Products</a></li>
    <li>Create Product</li>
  </ul>
</div>
  <div class="col-8 m-auto bg-light rounded">
 
    <form method="post">
      <div class="input-group mb-3">
          <label class="input-group-text" for="stock-category">Stock Category</label>
          <select class="form-select" name="category_id" id="stock-category">
          <option selected>Choose...</option>
          <?php foreach ($categories as $category => $value): ?>
            <option value="<?= $value['category_id'] ?>"><?= $value['category_title'] ?></option>
          <?php endforeach; ?>

          </select>
      </div>  
    
      <div class="row">
        <div class="mb-3">
        <label for="stock-name" class="form-label">New Stock Name</label>
        <input type="text" class="form-control" name="title" id="stock-name" placeholder="Cheese Burger">
      </div>

      <div class="mb-3">
        <label for="stock-description" class="form-label">New Stock Description</label>
        <textarea class="form-control" name="description" id="stock-description" rows="3"></textarea>
      </div>
      <div class="row">
        <div class="mb-3">
        <label for="price" class="form-label">Price in Rands(ZAR)</label>
        <input type="number" class="form-control" name="price" id="stock-name" placeholder="R">
      </div>
      <div class="input-group mb-3">
        <label class="input-group-text" for="stock-image">Upload Stock Image</label>
        <input type="file" class="form-control" name="image_url" id="stock-image">
      </div>
      <div class="col-auto">
        <button type="submit" class="btn btn-primary mb-3">Add Stock </button>
      </div>
    </form>
  </div>
</div>

 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>