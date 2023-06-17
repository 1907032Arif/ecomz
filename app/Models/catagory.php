<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class catagory extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'name', 'description', 'image', 'status'];

    public function product()
    {
        return $this->hasMany(Product::class, 'cat_id');
    }
}
