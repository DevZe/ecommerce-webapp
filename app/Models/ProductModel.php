<?php namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{

    protected $table = "products";
    protected $primaryKey = "id";
    // protected $returnType = "array";
    //     protected $useSoftDeletes = true;
    
    protected $allowedFields = ['title','category_id','description','price','image_url'];
}