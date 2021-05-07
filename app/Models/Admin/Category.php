<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
      'category_name'
    ];

    public function subcategories(){
        return $this->hasMany(Subcategory::class);
    }
}
