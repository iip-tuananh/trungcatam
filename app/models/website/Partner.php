<?php

namespace App\models\website;

use Illuminate\Database\Eloquent\Model;
use App\models\product\Product;

class Partner extends Model
{
    protected $table = "partners";
    protected $fillable = ['id','name', 'image', 'status', 'link','type'];

    public function products()
    {
        return $this->hasMany(Product::class, 'thuonghieu_id');
    }
}
