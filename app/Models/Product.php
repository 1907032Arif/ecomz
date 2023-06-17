<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use \Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'status', 'is_featured', 'cat_id', 'image'];

    public function category(){
        return $this->belongsTo(catagory::class, 'cat_id');
    }
}
