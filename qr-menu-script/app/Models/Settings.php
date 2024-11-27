<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    use HasFactory;
    //elemenları gosterme
    protected $table = "settings";
    protected $fillable = [
        'id', 'settings_description','settings_key','settings_value','settings_type','settings_delete','settings_status'
    ];
    public $timestamps = false;

}
