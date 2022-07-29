<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IntentionModel extends Model
{
    use HasFactory;

    protected $table = 'intention';
    protected $primaryKey = 'id';
    protected $fillable = [
    'Intentions', 
    'Amount_of_each'
    ];
}
