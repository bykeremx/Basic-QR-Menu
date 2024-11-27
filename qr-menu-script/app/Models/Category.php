<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    //elemenları gosterme
    protected $table = "category";
    protected $fillable = [
        'id',
        'category_name',
        'category_color',
        'category_image',
        'category_description',
        'category_status',
        'category_created_date',
        'category_updated_date',
    ];
    public $timestamps = false;
}
