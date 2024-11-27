<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{
    use HasFactory;
    //elemenları gosterme
    protected $table = "menu";
    protected $fillable = [
        'id',
        'category_id',
        'menu_name',
        'menu_description',
        'menu_image',
        'menu_price',
        'menu_status',
    ];
    public $timestamps = false;

    public function GetCategory(){
        return $this->belongsTo(Category::class,"category_id","id");
    }
}
