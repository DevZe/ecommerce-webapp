<?php namespace App\Models;

use CodeIgniter\Model;

class ProductCategoryModel extends Model
{

    protected $table = "product_categories";
    protected $primaryKey = "category_id";
    // protected $returnType = "array";
    //     protected $useSoftDeletes = true;
    
    protected $allowedFields = ['category_title','category_id','category_description'];
}