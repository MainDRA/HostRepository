<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class DrugModel extends Model
{
    use HasFactory,Searchable;

    protected $table = 'final_table';
    protected $primaryKey = 'SL';
    protected $fillable = [
    'Registration_Type', 
    'Application_Type', 
    'Market_Authorisation_Holder',
    'Category_of_Medical_Product', 
    'This_product_is_intended_for', 
    'Generic_Name',
    'Brand_Name',
    'Dosage_Form', 
    'Pack_Size', 
    'Type_of_Packaging',
    'Composition_of_active_ingredients_with_strengths',  
    'Manufacturer',
    'Country_of_Manufacturer', 
    'Therapeutic_Category', 
    'Certificate_Number',
    'Issue_Date', 
    'Expiry_Date',
    'updated_at', 
    'created_at',
    'Essential',
    ];


    public function toSearchableArray()
    {
        return [
              
            'Brand_Name'=> $this->Brand_Name,
            'Manufacturer'=> $this->Manufacturer,
            'Country_of_Manufacturer'=> $this->Country_of_Manufacturer, 
            'Therapeutic_Category'=> $this->Therapeutic_Category, 
            'Certificate_Number'=> $this->Certificate_Number,
            'Market_Authorisation_Holder'=> $this->Market_Authorisation_Holder,
            
        ];
    }

    



}
