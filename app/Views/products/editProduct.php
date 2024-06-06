<?= $this->extend('layouts/layout') ?>
<?= $this->section('content') ?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<h2 class="text-center pt-5">Edit a product on the system </h2>

<div class="row p-5">
  <div class="col-8 m-auto bg-light rounded">
    <form method="post" >
      <div class="input-group mb-3">
          <label class="input-group-text" for="stock-category">Stock Category</label>
          <select class="form-select" name="category_id" id="stock-category">
          <option selected>Choose...</option>
          <?php foreach ($categories as $category => $value): ?>
            <option value="<?= $value['category_id']?>" <?php if($value['category_id']== $editProduct['category_id']){ ?> selected="selected"; <?php }?>><?= $value['category_title'] ?></option>
          <?php endforeach; ?>

          </select>
      </div>  
    
      <div class="row">
        <div class="mb-3">
        <label for="stock-name" class="form-label">New Stock Title</label>
        <input type="text" class="form-control" value="<?= $editProduct['title'] ?>" name="title" id="stock-name" placeholder="Cheese Burger">
      </div>

      <div class="mb-3">
        <label for="stock-description" class="form-label">New Stock Description</label>
        <textarea class="form-control" name="description" id="stock-description" rows="3"><?= $editProduct['description'] ?></textarea>
      </div>
      <div class="row">
        <div class="mb-3">
        <label for="price" class="form-label">Price in Rands(ZAR)</label>
        <input type="number" class="form-control" value="<?= $editProduct['price'] ?>" name="price" id="stock-name" placeholder="R">
      </div>
      <div class="input-group mb-3">
        <label class="input-group-text" for="stock-image">Upload Stock Image</label>
        <input type="file" class="form-control" value="<?= $editProduct['image_url'] ?>" name="image_url" id="stock-image">
      </div>
      <div class="col-auto">
        <button type="submit" class="btn btn-primary mb-3">Update Stock </button>
      </div>

    </form>
  </div>
</div>

 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
 <?= $this->endSection() ?>