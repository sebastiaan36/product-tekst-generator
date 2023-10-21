<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Generator extends Model
{
    use HasFactory;
    protected $fillable = ['product_name', 'product_category','text', 'brands_id', 'user_id', 'amount'];
    public function brands()
    {
        return $this->hasOne(Brands::class,'id', 'brands_id');
    }
}
