<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TheMostToPrefer extends Model
{
    use HasFactory;
    protected $table="most_the_prefer";
    protected $fillable=[
        'id','menu_id','must'
    ];
    public $timestamps =null;

    public function MenuleriGetir(){
        return $this->belongsTo(MenuItem::class, 'menu_id', 'id');
    }
}
