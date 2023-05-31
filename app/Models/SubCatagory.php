<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCatagory extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'name', 'description', 'status'];
    public function catagory()
{
    return $this->belongsTo(Catagory::class, 'cat_id');
}
}


