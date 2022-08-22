<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TherapeuticModel extends Model
{
    use HasFactory;

    protected $table = 'therapeutic_category';
    protected $primaryKey = 'id';
    protected $fillable = [
    'Therapeutic_category', 
    ];
}
