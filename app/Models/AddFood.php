<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class AddFood extends Model
{
    use HasFactory;
    //use HasTranslations;
    //public $translatable = ['Food_Name'];
    protected $table = 'food';
    protected $guarded=[];
}
