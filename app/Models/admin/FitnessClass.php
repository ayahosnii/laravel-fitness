<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FitnessClass extends Model
{
    use HasFactory;
    protected $table = 'fitness_classes';


    public function trainer()
    {
        return $this->belongsTo(Trainer::class);
    }
}
