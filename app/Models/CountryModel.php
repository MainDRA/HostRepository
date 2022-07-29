<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CountryModel extends Model
{
    use HasFactory;
    protected $table = 'country_manufacturer';
    protected $primaryKey = 'id';
    protected $fillable = [
    'Country', 
    'Amount_of_drugs'
    ];
}
