<?php namespace App\Models;

use CodeIgniter\Model;

class OrderEntityModel extends Model
{

    protected $table = "orderentity";
    protected $primaryKey = "id";
  
    protected $allowedFields = ['customer_id','orderDate','totalAmount'];
}