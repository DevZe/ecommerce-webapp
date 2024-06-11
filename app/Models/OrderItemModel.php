<?php namespace App\Models;

use CodeIgniter\Model;

class OrderItemModel extends Model
{

    protected $table = "orderitem";
    protected $primaryKey = "id";
    // protected $returnType = "array";
    //     protected $useSoftDeletes = true;
    
    protected $allowedFields = ['orderID','productID','quantity','price'];
}