<?= $this->extend('layouts/layout') ?>
<?= $this->section('content') ?>
<h2>Create a new product on the system </h2>

<div class="container">
  <form action="/action_page.php">
  <div class="row">
      <div class="col-25">
        <label for="pname">Product Name</label>
      </div>

      <div class="col-75">
        <input type="text" id="pname" name="firstname" placeholder="Your name..">
      </div>
    </div>
  <div class="row">
    <div class="col-25">
      <label for="pcategory">Category</label>
    </div>
    <div class="col-75">
      <select id="pcategory" name="pcategory">
        <option value="Dessert">Dessert</option>
        <option value="Burgers">Burgers</option>
        <option value="BunnyChow">BunnyChow</option>
      </select>
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="pdescription">Description</label>
    </div>
    <div class="col-75">
      <textarea id="pdescription" name="pdescription" placeholder="Write something about the product." style="height:200px"></textarea>
    </div>
  </div>

  <div class="row">
    <div class="col-25">
       <label>Product Image</label>
    </div>
    <div class="col-75">
    <input type="file" id="myFile" name="filename">
    </div>
  </div>
  <br>
  <div class="row">
    <input type="submit" value="Submit">
  </div>
  </form>
</div>
<?= $this->endSection() ?>
