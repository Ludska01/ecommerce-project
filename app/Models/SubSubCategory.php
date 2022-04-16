<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubSubCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'subsubcategory_name_en',
        'subsubcategory_name_srb',
        'subsubcategory_slug_en',
        'subsubcategory_slug_srb',
        'subcategory_id',
    ];


    public function subcategory(){
        return $this->belongsTo(SubCategory::class,'subcategory_id','id');
    }
}
