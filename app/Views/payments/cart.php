<?= $this->extend('layouts/layout') ?>
<?= $this->section('content') ?>
<link href="/assets/css/checkout.css" rel="stylesheet">

<style type="text/css">
  .badge {
    background-color: green;
    color: white;
    padding: 4px 8px;
    text-align: center;
    border-radius: 5px;
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
  a{
      text-decoration: none;
  }

  table {
    border-collapse: collapse;
    width: 100%;
    overflow: auto;
  }

  th, td {
    text-align: left;
    padding: 8px;
  }
  tr:nth-child(even) {background-color: #f2f2f2;}
  tr:hover {background-color: coral;}


  .btn-checkout{
    margin-top:15px;
    margin-bottom:15px;

  }

  .btn-checkout:link, .btn-checkout:visited {
    background-color: green;
    color: white;
    padding: 14px 25px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    
  }

  .btn-checkout:hover, btn-checkout:active {
    background-color: #f44336;
  }
  h2{
    text-align:center;
  }

  .btn-delete:link, .btn-delete:visited {
    background-color: #f44336;
    color: white;
    padding: 8px 13px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    
  }

  .btn-delete:hover, btn-delete:active {
    background-color: green;
    
  }

  .btn-remove{
    width: 16px;
    height: 16px;
    transition: transform .2s;
    margin: 0 auto;
  }


  .btn-remove:hover{
    -ms-transform: scale(1.5); /* IE 9 */
    -webkit-transform: scale(1.5); /* Safari 3-8 */
    transform: scale(1.5); 
  }


  /***Scroll***/
  /* width */
  ::-webkit-scrollbar {
    width: 20px;
  }

  /* Track */
  ::-webkit-scrollbar-track {
    box-shadow: inset 0 0 5px grey; 
    border-radius: 10px;
  }
  
  /* Handle */
  ::-webkit-scrollbar-thumb {
    background: red; 
    border-radius: 10px;
  }

  /* Handle on hover */
  ::-webkit-scrollbar-thumb:hover {
    background: #b30000; 
  }
</style>


<body onload="showCart()">     
    <div class="row p-5">

        <div class="col m-auto">
            <div id="cartModal" class="modal">
                <div class="modal-content">
                    <a href="<?= site_url('/') ?>" class="close">&times;</a>
                    <div class="col">
                      <h2>Cart</h2>
                        <div class="container">
                        <table >
                         
                            <thead>
                              <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Price</th>
                                <th>Add</th>
                                <th>Remove</th>
                                <th>quantity</th>
                          
                              </tr>
                            </thead>
                            <tbody>
                            <?php $totalAmount = 0; ?>
                              <?php foreach ($products as $key => $value): ?>
                                  
                                  <?php
                                  $totalAmount += $value['itemTotalPrice'];
                                  
                                  ?>
                                  <tr>
                                      <td><?= $key; ?></td>
                                      <td><?= $value['title'] ?></td>
                                      <td>R<?= $value['itemTotalPrice'] ?></td>
                                      
                                      <td class="btn-remove">
                                     
                                        <a href="/shopping_cart/update/<?= $value['orderItemId'] ?>/-1" >
                                          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-dash-circle" viewBox="0 0 16 16">
                                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                                            <path d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8"/>
                                          </svg>
                                        </a>
                                      
                                      </td>

                                      <td class="btn-remove">
                                      <a href="/shopping_cart/update/<?= $value['orderItemId'] ?>/1" >
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                                          <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                                          <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
                                        </svg>
                                      </a>
                                      </td>

                                      <td>
                                        <span class="badge"><?= $value['quantity'] ?></span>
                                      </td>
                                      <td>
                                      <a class="btn-delete" href="/shopping_cart/delete/<?= $value['orderItemId'] ?>">Delete</a>
                                      </td>
                                  </tr>
                              <?php endforeach; ?>
                          </tbody>

                        </table>
                        <hr/>
                        <p>Total <span class="price" style="color:black"><b>R  <?= $totalAmount ?> </b></span>
                        </div>
                        <a class="btn-checkout" href="/checkout">Check Out</a>
                    </div>
                </div>               
                                  
            </div>
        </div>
    </div>
</body> 
<script>
// Get the modal
//var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("cartModal");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>
<?= $this->endSection() ?>
