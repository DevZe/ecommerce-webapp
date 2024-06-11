<?php

namespace App\Cells;
use App\Models\ShoppingCartModel;

class Cart
{

    protected $model = new ShoppingCartModel();
    public function show($userId): string
    {   
        if(isset($userId))
        {
            $cart = $this->model->where('customer_id', $userId)->first();
            if($cart){

                return 
                '<h4>Cart <span class="price" style="color:black"><i class="fa fa-shopping-cart"></i> <b>4</b></span></h4>'
                .'<div id="cartModal" class="modal">'
    
                  .'<div class="modal-content">'
                    .'<span class="close">&times;</span>'
                    .'<div class="col">'
                        .'<div class="container">'
                        .'<h4>Cart <span class="price" style="color:black"><i class="fa fa-shopping-cart"></i> <b>4</b></span></h4>'
                        .'<? foreach($products as $product): ?> '
                        .'<p><a href="#">Product 1</a> <span class="price">$15</span></p>'
                        .'<? endforeach; ?>'
                        .'<hr>'
                        .'<p>Total <span class="price" style="color:black"><b>$30</b></span></p>'
                        .'</div>'
                    .'</div>'
                    .'</div>'           
    
                .'</div>';
            }
        
           

            
        }
        
        return "Some wrong";
    }
}