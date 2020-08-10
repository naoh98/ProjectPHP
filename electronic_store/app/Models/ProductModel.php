<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductModel extends Model
{
    //
    protected $table ='product';
    protected $primaryKey = 'product_id';
    public $timestamps = true;

}
