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

    public function Essential()
    { 
        $Amount_of_Essential = DrugModel::where("Essential","Essential")->paginate();

        return view('Dashboard.essential',compact('Amount_of_Essential'));
    }

    public function Non_essential()
    {
        $Amount_of_non_essential = DrugModel::where("Essential","Non-essential")->paginate();
        return view('Dashboard.non_essential',compact('Amount_of_non_essential'));
    }


}
