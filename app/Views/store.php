<?= $this->extend('layouts/layout') ?>
<?= $this->section('content') ?>
<link href="/assets/css/store.css" rel="stylesheet">
<section>

<div class="tab">
  <button class="tablinks" onclick="openCategory(event, 'Burger')" id="defaultOpen" style="border-radius: 15px 0px 0px 0px;">
    <div class="container" >
      <img src="/img/burger6.jpg" >
      <img src="/img/burger1.jpg" >
        
        <img src="/img/burger3.jpg" >
        <div class="overlay">Burger</div>    
    </div>
  </button>
  <button class="tablinks" onclick="openCategory(event, 'Drinks')">
    <div class="container"> 
      <img src="/img/burger4.jpg" >
      <img src="/img/burger5.jpg" >
      <img src="/img/burger6.jpg" >
      <div class="overlay">Drinks</div>    
    </div>
  </button>
  <button class="tablinks" onclick="openCategory(event, 'Dessert')">
    <div class="container"> 
      <img src="/img/burger7.jpg">
      <img src="/img/burger1.jpg">
      <img src="/img/burger3.jpg">
      <div class="overlay">Dessert</div>    
    </div>
  </button>
  <button class="tablinks" onclick="openCategory(event, 'Specials')" style="border-radius: 0px 0px 0px 15px;">
    <div class="container">
      <img src="/img/burger4.jpg" >
      <img src="/img/burger2.jpg" >
      <div class="overlay">Specials</div>    
    </div>
  </button>
</div>

<div id="Burger" class="tabcontent">

  <div class="row"> 
    <?php foreach ($products as $key => $value): ?>
        <?php if ($value['category_id'] == 1): ?>
          <div class="column">
            <div class="card">
              <form method="post" action="/admin/sales/new">
                <input type="hidden" name="item_id" value="<?php echo $value['id'] ?>" />
                <input type="hidden" name="customer_id" value="3" />
                <img src="/img/burger1.jpg" alt="" style="width:100%">
                <h1><?= $value['title'] ?></h1>
                <p class="price">R <?= $value['price'] ?></p>
                <p><?= $value['description'] ?></p>
                <p><button>Add to Cart</button></p>
              </form>
            </div>
          </div>
          
      <?php endif; ?>
    <?php endforeach; ?>
  </div>
</div>

<div id="Drinks" class="tabcontent">
  <div class="row"> 
    <?php foreach ($products as $key => $value): ?>
        <?php if ($value['category_id'] == 2): ?>
          <div class="column">
            <div class="card">
              <form method="post" action="/admin/sales/new">
                <input type="hidden" name="item_id" value="<?php echo $value['id'] ?>" />
                <img src="/img/burger1.jpg" alt="" style="width:100%">
                <h1><?= $value['title'] ?></h1>
                <p class="price">R <?= $value['price'] ?></p>
                <p><?= $value['description'] ?></p>
                <p><button>Add to Cart</button></p>
              </form>
            </div>
          </div>
          
      <?php endif; ?>
    <?php endforeach; ?>
  </div>
   
</div>

<div id="Dessert" class="tabcontent">
    <div class="row"> 
      <?php foreach ($products as $key => $value): ?>
          <?php if ($value['category_id'] == 3): ?>
            <div class="column">
              <div class="card">
                <form method="post" action="/admin/sales/new">
                  <input type="hidden" name="item_id" value="<?php echo $value['id'] ?>" />
                  <img src="/img/burger1.jpg" alt="" style="width:100%">
                  <h1><?= $value['title'] ?></h1>
                  <p class="price">R <?= $value['price'] ?></p>
                  <p><?= $value['description'] ?></p>
                  <p><button>Add to Cart</button></p>
                </form>
              </div>
            </div>
            
        <?php endif; ?>
      <?php endforeach; ?>
    </div>
</div>

<div id="Specials" class="tabcontent">
  <div class="row"> 
      <?php foreach ($products as $key => $value): ?>
          <?php if ($value['category_id'] == 4): ?>
            <div class="column">
              <div class="card">
                <form method="post" action="/admin/sales/new">
                  <input type="hidden" name="item_id" value="<?php echo $value['id'] ?>" />
                  <img src="/img/burger1.jpg" alt="" style="width:100%">
                  <h1><?= $value['title'] ?></h1>
                  <p class="price">R <?= $value['price'] ?></p>
                  <p><?= $value['description'] ?></p>
                  <p><button type="submit">Add to Cart</button></p>
                </form>
              </div>
            </div>
            
        <?php endif; ?>
      <?php endforeach; ?>
    </div>
</div>


</section>


<script>
// When the user scrolls down 20px from the top of the document, slide down the navbar
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    document.getElementById("navbar").style.top = "0";
  } else {
    document.getElementById("navbar").style.top = "-50px";
  }
}


//Category Onclick function
function openCategory(evt, categoryName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(categoryName).style.display = "block";
  evt.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();



//NavBar disappear on scroll
var prevScrollpos = window.pageYOffset;
window.onscroll = function() {
var currentScrollPos = window.pageYOffset;
  if (prevScrollpos > currentScrollPos) {
    document.getElementById("navbar").style.top = "0";
  } else {
    document.getElementById("navbar").style.top = "-50px";
  }
  prevScrollpos = currentScrollPos;
}


</script>
<?= $this->endSection() ?>
