<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'product';
    protected $fillable = ['name','image','price','price_sale','slug','description','category_id','prioty','status'];
    //JOIN 1-1
    public function cat()
    {
        return $this->hasOne(Category::class,'id','category_id');
    }
}
