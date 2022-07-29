<?php

namespace App\Http\Controllers;

use App\Models\DrugModel;
use App\Models\ProductcatModel;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function Expire_more()
    {
        //  Expiry date alert 
        $now1 = Carbon::now('Etc/GMT+6')->format('o-m-d');
        $now2 = Carbon::now('Etc/GMT+6')->addMonths(3)->format('o-m-d');
        $raws = DrugModel::whereDate('Expiry_Date','<=',$now2)
        ->whereDate('Expiry_Date','>=',$now1)
        ->paginate(10);

        return view('Dashboard.expire',compact('raws'));
    }

    public function Manufacturer()
    {
        $Amount_of_Manufacturer = DrugModel::select('Manufacturer')->distinct()->get();

        return view('Dashboard.manufacturer',compact('Amount_of_Manufacturer'));
    }

    public function Therapeutic()
    {
        $Amount_of_Therapeutic = DrugModel::select('Therapeutic_Category')->distinct()->get();

        return view('Dashboard.therapeutic',compact('Amount_of_Therapeutic'));
    }

    public function PackageType()
    {
        $Types_of_Packages = DrugModel::select('Type_of_Packaging')->distinct()->get();
        return view('Dashboard.packagetype',compact('Types_of_Packages'));
    }

    public function ProductCat()
    {
        $Category_of_Medical_Product = DrugModel::select('Category_of_Medical_Product')->distinct()->get();
        $path = ProductcatModel::select('image_URL')->get();
        return view('Dashboard.productcat',compact('Category_of_Medical_Product'));
    }
}
