<?php namespace App\Models;

use CodeIgniter\Model;

class SaleModel extends Model
{
    protected $table = "sales";
    protected $primaryKey = "id";
    // protected $returnType = "array";
    //     protected $useSoftDeletes = true;
    protected $allowedFields = ['amount','customer_id'];
}