<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ProductModel as ProductModel;
use App\Models\ProductCategoryModel as ProductCategoryModel;
class ShopController extends BaseController
{

    public function store()
    {
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
            echo json_encode('Error: ' . $e);      
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
}