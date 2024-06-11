<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ProductModel as ProductModel;
use App\Models\ProductCategoryModel as ProductCategoryModel;
use App\Models\SaleModel as SaleModel;
use App\Models\ShoppingCartModel as ShoppingCartModel;
use App\Models\OrderEntityModel as OrderEntityModel;
use App\Models\OrderItemModel as OrderItemModel;
use App\Models\CartModel as CartModel;
use CodeIgniter\I18n\Time;

class ShopController extends BaseController
{

    public function store()
    {
        if(!session()->get('isLoggedIn'))
        {
            return redirect()->to('/');            
        }
        return view('store',$this->getProducts());
    }

    //Return all products to the producs view
    protected function getProducts(): array
    {
        $productModel = new ProductModel();
        $products = $productModel->findAll();
        return  ['products' => $products];
    }

    //Get all products
    public function getAllProducts()
    {
        return view('products/productsDisplay',$this->getProducts());
    }

    //Find products by category
    public function getProductsCategory($id): array|\CodeIgniter\Model{
        try{
            $productModel = new ProductCategoryModel();
            $products = $productModel->where('category_id',$id);
            return $products;
        }catch(Exception $e){
            return ['error' => $e->getMessage()];
        }
    }

    //Get the product by its id
    public function getProduct($id)
    {
       try {
            $model = new ProductModel();
            $model = $model->find($id);
            $productData = [];
            if($model){
                $productData = [
                    'id'=> $model['id'],
                    'title' => $model['title'],
                    'price' => $model['price'],
                    'description' => $model['description'],
                    'image_url' => $model['image_url'],
                    'error' => '',
                ];
            }else{
                $productData = [
                    'error' => 'Product not found on get!',
                    
                ];
            }
            return view('products/productDetails', $productData);
       } catch (Exception $e) {
        $error = [
            'error' => $e->getMessage(),
        ];
        return view('products/productDetails', $error);
       }
    }

    //Local Method to retrive Product Categories
    protected function getProductCategories(): array{
        $categorModel = new ProductCategoryModel();
        $categories = $categorModel->findAll();
        return $categories;
    }
    //New product form
    public function createProduct()
    {
      
        return view('products/productCreate',['categories' => $this->getProductCategories()]);
    }

    //Save new product method
    public function saveProduct()
    {
        try{
          
            if($this->request->getMethod() == 'POST'){

                $model = new ProductModel();
                $model->save($_POST);
                if($model){
                    $productData = [
                        'id'=> '',
                        'title' => $_POST['title'],
                        'price' => $_POST['price'],
                        'description' => $_POST['description'],
                        'image_url' => $_POST['image_url'],
                        'error' => '',
                    ];
                }else{
                    $productData = [
                        'error' => 'Product Not Inserted!',
                        
                    ];
                }
                return view('products/productDetails', $productData);
            
            }else{
                echo 'Error: $Post Is Empty';
            }
        }catch(Exception $e){
            //echo json_encode('Error: ' . $e);      
        }
        
        //return view('store');
    }


    //Upoad a new product image
    function upload(): bool
    {
        $validationRule = [
            'userfile' => [
                'label' => 'Image File',
                'rules' => [
                    'uploaded[userfile]',
                    'is_image[userfile]',
                    'mime_in[userfile,image/jpg,image/jpeg,image/gif,image/png,image/webp]',
                    'max_size[userfile,100]',
                    'max_dims[userfile,1024,768]',
                ],
            ],
        ];
        if (! $this->validateData([], $validationRule)) {
             $data = $this->validator->getErrors();
            return false;
        }

        $img = $this->request->getFile('image_url');

        if ($img && ! $img->hasMoved()) {
            $filepath = WRITEPATH . 'uploads/' . $img->store();

            $data = ['uploaded_fileinfo' => new File($filepath)];

            return true;
        }

      return false;

    
    }

    //Edit product form call
    public function edit($id){
    
        $productModel = new ProductModel();
        $product = $productModel->find($id);
        $data = ['editProduct' => $product, 'categories'=>$this->getProductCategories()];
   
        return view('products/editProduct', $data);
    }

    public function saveEdited($id)
    {
        if($id){
            $model = new ProductModel();
            $model->save($_POST);
            $editedData = [
                'id'=> $id,
                'title' => $_POST['title'],
                'price' => $_POST['price'],
                'description' => $_POST['description'],
                'image_url' => $_POST['image_url'],
                'error' => '',
            ];
        }else{
            $editedData = [
                'error' => 'Product not updated!',
            ];
        }
        return view('products/productDetails', $editedData);
    
    }

    //Delete the selected product
    public function delete($id)
    {
     
        $model = new ProductModel();
        $row = $model->find($id);

        if($row){
            $model->delete($id);
            return redirect()->to('/');
        }
    }


    /*****Cart Component Methods *****/

    //Add the Item to the cart
    public function addToCart()
    {
        if($this->request->getMethod() == 'POST'){

            //variables for caculating total price
            $quantity =  1;
            $price = $this->request->getVar('price');

            $orderEntityModel = new OrderEntityModel();
            
             $orderEntity['customer_id'] = session()->get('id');
             $orderEntity['totalAmount'] = $quantity * $price;//Calcuate the total
            
             //Check if the user already has an order
             $existingOrderEntity = $orderEntityModel->where('customer_id',session()->get('id'))->first();
             $orderEntityId = null;
             if($existingOrderEntity)//If it exists update the order
             {
                //echo  $existingOrderEntity['id'];
                //$orderEntityModel->update;
                $castedOrderEntity = (object)$orderEntity;
                $orderEntityModel->update($existingOrderEntity['id'], $castedOrderEntity);
                $orderEntityId  = $existingOrderEntity['id'];
            }else{$orderEntityModel->save($orderEntity);}//else save the new order
             
            //At this point there is only one order per user
            //And the order has multiple items
            if($orderEntityId == null || $orderEntityId == 0)
            {
                $onlyOrderEntity = $orderEntityModel->where('customer_Id', session()->get('id'))->first();
                $orderEntityId = $onlyOrderEntity['id'];
            }
             
            
            
           
            //Add OrderItem record
            $orderItemModel = new OrderItemModel();
            $orderItem = array();
            $orderItem['orderID'] = $orderEntityId;
            $orderItem['productID'] = $this->request->getVar('item_id');
            $orderItem['quantity'] = $quantity;
            $orderItem['price'] = $price;

            /************************************/
            
            $db      = \Config\Database::connect();
            $builder = $db->table('orderitem');
             $builder->where($orderItem);
            $existingOrderItem = $builder->get()->getResult();
            /************************************/

            //$existingOrderItem = $orderItemModel->where($orderItem)->first();
            if($existingOrderItem)
            {
                //echo $existingOrderItem[0]->quantity;
                $orderItem['quantity'] = $existingOrderItem[0]->quantity+ 1;
                $objectedOrderItem =(object)$orderItem;
                $orderItemModel->update($existingOrderItem[0]->id,$objectedOrderItem);
            }else{
                //echo $orderItem['orderID'];
               
                $orderItemModel->save($orderItem);}

            //Popate Cart table
            $cartModel = new CartModel();
            $cart = [];
            $cart['CustomerID'] = session()->get('id');
            $existingCart = $cartModel->where('id',session()->get('id') )->first();
            if($existingCart)
            {
                $objectedCart = (object)$cart;
                $cartModel->update($existingCart['id'], $objectedCart);
            }else{ $cartModel->save($cart);}

           

            $this->cart();
           //return view('payments/cart',['item'=>$product]);
        }
       
        $error = 'No item found';
        return view('payments/cart',['error'=>$error]);
        
    }

 
    public function cart()
    {

            $model = new OrderEntityModel();
            
            //Get order entity from DB
            $orderEntity = $model->where('customer_id',session()->get('id'))->first();  
            $orderEntityId = $orderEntity['id'];  
            if($orderEntity)           
            {

                $products=array();
                if($orderEntityId && $orderEntityId !=''){

                    $orderItemModel = new OrderItemModel();
                    $orderItems = $orderItemModel->where('orderID',$orderEntityId)->findAll();
                
                    
                    $error = [];
                    //echo $orderItems[0]['id'];
                
                    //populate cart data with products
                    //Cart id 
                    //Cart product
                    //Cart 
                    //Total price
                    $totalAmout = 0;
                    if($orderItems && $orderItems!=null) {
                       
                        $productModel = new ProductModel();
                        foreach($orderItems as $key => $orderItem) 
                        {
                            
                            $products[$key] = $productModel->where('id',$orderItem['productID'])->first();
                            $products[$key]['quantity'] = $orderItem['quantity'];
                            $products[$key]['orderItemId'] = $orderItem['id'];
                            $products[$key]['itemTotalPrice'] = $orderItem['quantity'] * $orderItem['price'];
                            $error = '';
                            
                        }
                        
                        return view('payments/cart',['products'=>$products,'error'=>$error]);
                    }

            }
        } 
        $error = 'Empty Cart';
        return view('payments/cart',['products'=>$products,'error'=>$error]);
    }


    private function getCartArray(): array
    {
        
        $model = new OrderEntityModel();
        
        //Get order entity from DB
        $orderEntity = $model->where('customer_id',session()->get('id'))->first();  
        $orderEntityId = $orderEntity['id'];  
        if($orderEntity)           
        {

            $products=array();
            if($orderEntityId && $orderEntityId !='')
            {

                $orderItemModel = new OrderItemModel();
                $orderItems = $orderItemModel->where('orderID',$orderEntityId)->findAll();
            
                
                $error = [];
                //echo $orderItems[0]['id'];
            
                //populate cart data with products
                //Cart id 
                //Cart product
                //Cart 
                //Total price

                if($orderItems && $orderItems!=null) 
                {
                
                    $productModel = new ProductModel();
                    foreach($orderItems as $key => $orderItem) 
                    {
                        $products[$key] = $productModel->where('id',$orderItem['productID'])->first();
                        $products[$key]['quantity'] = $orderItem['quantity'];
                        $products[$key]['orderItemId'] = $orderItem['id'];
                        $products[$key]['itemTotalPrice'] = $orderItem['quantity'] * $orderItem['price'];
                        $error = '';
                        
                    }
                    
                    return ['products'=>$products,'error'=>$error];
                }

            }
        }    
        $error['error'] = 'Empty Cart';
        return ['error'=>$error];
    }
    
    //Shopping Cart Data
    protected function getCustomerCartData(): array          
    {
        $model = new ShoppingCartModel();
        $userId = session()->get('id');

        if(isset($userId) && $userId != '')
        {
           // $cart = $model->where(key: 'customer_id', $userId)->first();
        }
        
        return ['cart' => $cart];   
    }

    //Add Cart Record
    public function saveCartItem()
    {
        
        try{
          
            if($this->request->getMethod() == 'POST'){

                $model = new  CartItemModel();
                $cartItem = [];
                $cartItem['item_id'] = $this->request->getVar('id');
                $cartItem['customer_id'] = session()->get('id');
                
             
                $model->save($_POST);

                if($model){
                    $soldProductModel = new ProductModel();
                    $soldProductDataResut = $soldProductModel->find($_POST['item_id']);
                    
                    $soldProductData = [
                        'id'=> $soldProductDataResut['id'],
                        'title' => $soldProductDataResut['title'],
                        'price' => $soldProductDataResut['price'],
                        'description' => $soldProductDataResut['description'],
                        'image_url' => $soldProductDataResut['image_url'],
                        'date' => date("Y-m-d H:i:s"),
                        'error' => '',
                    ];


                }else{
                    $soldProductData = [
                        'error' => 'Error In the Order Sale Insert!',                       
                    ];
                }
                return view('sales/saleDetails', ['sale' => $soldProductData]);
            
            }else{
                echo 'Error: $Post Is Empty';
            }
        }catch(Exception $e){
            echo json_encode('Error: ' . $e);      
        }
        
    }

    public function updateOrderItem($orderItemId, $quantity)
    {
        if($orderItemId && $quantity)
        {
            $model = new OrderItemModel();
            $orderItemData = $model->where('id',$orderItemId)->first();

            $updatedOrderItem = array();

            

            if($orderItemData)
            {
                
                if($quantity == 1)
                {
                    
                    $updatedOrderItem['quantity'] = $orderItemData['quantity'] + 1;
                    
                }else if($quantity == -1)
                {
                   
                    $updatedOrderItem['quantity'] = $orderItemData['quantity'] - 1;
                    
                }
               
                //If the quantity is 0 then there is nothing in orderItem to update 
                if($updatedOrderItem && $updatedOrderItem['quantity'] == 0)
                {
                    $model->delete($orderItemId);
                }else{
                    $model->update($orderItemId, (object)$updatedOrderItem);
                }
               
                return view('payments/cart',$this->getCartArray());
            }
        }
    }


    public function deleteCartItem($id){
        $model = new OrderItemModel();
        $orderItemData = $model->where('id',$id)->first();

        if($orderItemData)
        {
            $model->delete($id);
            return view('payments/cart',$this->getCartArray());
        }
        $error['error'] = 'Error deleting item'; 
        return view('payments/cart',[$error]);
    }

    //Get the cart details and user profile to populate the checkout form
    public function checkout()
    {
        $cartArray = $this->getCartArray();
        return view('payments/checkout',$cartArray);
    }
}