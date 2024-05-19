<?= $this->extend('layouts/layout') ?>
<?= $this->section('content') ?>
<style>
* {box-sizing: border-box;}

.container {
  position: relative;
  padding: 0;
  margin: 0;
}

.image {
  display: block;
  width: 100%;
  height: auto;
}

.overlay {
  position: absolute; 
  bottom: 0; 
  background: rgb(0, 0, 0);
  background: rgba(0, 0, 0, 0.5); /* Black see-through */
  color: #f1f1f1; 
  width: 100%;
  transition: .5s ease;
  opacity:0;
  color: white;
  font-size: 20px;
  padding: 20px;
  text-align: center;
}

.container:hover .overlay {
  opacity: 1;
}
</style>
<div class="row"> 
  <div class="column">
    <div class="container">
        <img src="/img/burger1.jpg" style="width:100%" class="image">
        <div class="overlay">R44.90</div>
    </div>
    <div class="container">
        <img src="/img/burger and chips.jpg" alt="Photo by Engin Akyurt: https://www.pexels.com/photo/hamburger-beside-fries-2271107/" style="width:100%">
        <div class="overlay">R144.50</div>    
    </div>
    <div class="container">
        <img src="/img/burger2.jpg" style="width:100%">
        <div class="overlay">R244.90</div>    
    </div>
    <img src="/img/burger6.jpg" style="width:100%">
    <img src="/img/burger3.jpg" style="width:100%">
    <img ssrc="/img/burger4.jpg" style="width:100%">
    <img src="/img/burger5.jpg" style="width:100%">
  
  </div>
  <div class="column">
    <img src="/img/burger7.jpg" style="width:100%">
    <img src="/img/burger5.jpg" style="width:100%">
    <img src="/img/burger and chips.jpg" alt="Photo by Engin Akyurt: https://www.pexels.com/photo/hamburger-beside-fries-2271107/" style="width:100%">
    <img src="/img/burger2.jpg" style="width:100%">
    <img src="/img/burger3.jpg" style="width:100%">
    <img ssrc="/img/burger4.jpg" style="width:100%">
  
    <img src="/img/burger6.jpg" style="width:100%">
</div>
  <div class="column">
   
    <img src="/img/burger3.jpg" style="width:100%"  class="image">
        
    <div class="container">
        <img src="/img/burger2.jpg" style="width:100%">
        <div class="overlay">R154.50</div>    
    </div>
    <div class="container">
        <img src="/img/burger and chips.jpg" alt="Photo by Engin Akyurt: https://www.pexels.com/photo/hamburger-beside-fries-2271107/" style="width:100%">
        <div class="overlay">R144.90</div>    
    </div>
    <div class="container">
        <img src="/img/burger1.jpg" style="width:100%" class="image">
        <div class="overlay">R194.90</div>
    </div>
    <img src="/img/burger7.jpg" style="width:100%"
    <img ssrc="/img/burger4.jpg" style="width:100%">
    <img src="/img/burger5.jpg" style="width:100%">
 </div>
  <div class="column">
    <img ssrc="/img/burger4.jpg" style="width:100%">
    <div class="container">
        <img src="/img/burger2.jpg" style="width:100%">
        <div class="overlay">R154.90</div>    
    </div>
    <div class="container">
        <img src="/img/burger1.jpg" style="width:100%" class="image">
        <div class="overlay">R104.90</div>
    </div>
    <img src="/img/burger3.jpg" style="width:100%">
   
    <img src="/img/burger5.jpg" style="width:100%">
    <img src="/img/burger6.jpg" style="width:100%">
    <div class="container">
        <img src="/img/burger and chips.jpg" alt="Photo by Engin Akyurt: https://www.pexels.com/photo/hamburger-beside-fries-2271107/" style="width:100%">
        <div class="overlay">R114.90</div>    
    </div>
  </div>
</div>

<?= $this->endSection() ?>
