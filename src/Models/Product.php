<?php

namespace GiapHiep\Productcrud\Models;

use Illuminate\Database\Eloquent\Model;

use GiapHiep\Productcrud\Models\Product;

class Product extends Model
{
    protected $fillable = ['name', 'price'];

}
