<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Model 
use App\Models\DrugModel;
use App\Models\CountryModel;
use App\Models\IntentionModel;

// Google sheet API
use Google_Service_Sheets;
use Google_Service_Sheets_ValueRange;
use Exception;

// Date and time
use Carbon\Carbon;

class DrugController extends Controller
{  
    // First page 
    public function home(Request $request)
    {
        // Dropdown
        $markets = DrugModel::select('Market_Authorisation_Holder')->orderBy('Market_Authorisation_Holder', 'ASC')->distinct()->get();
        $country = DrugModel::select('Country_of_Manufacturer')->distinct()->get();
        $manufacturers = DrugModel::select('Manufacturer')->orderBy('Manufacturer', 'ASC')->distinct()->get();
        $brands = DrugModel::select('Brand_Name')->orderBy('Brand_Name', 'ASC')->distinct()->get();
        
        // Date range
        $start = $request->start_date;
        $end = $request->end_date;
        
        $newStart = Carbon::parse($start)->format('o-m-d'); // change format of start date 
        $newEnd = Carbon::parse($end)->format('o-m-d'); // change format of end date
        
        // Search part
        if($request->filled('search_name')){
            $lists = DrugModel::search($request->input('search_name'))->paginate();
            
        }
        elseif ($request->filled('Country_Market_holder')){
            $lists = DrugModel::search($request->Country_Market_holder)->within('Country_Market_holder')->paginate();  
        }

        elseif ($request->filled('Market_Authorisation_Holder')){
            $lists = DrugModel::search($request->Market_Authorisation_Holder)->within('Market_Authorisation_Holder')->paginate();  
        }

        elseif ($request->filled('Manufacturer')){
            $lists = DrugModel::search($request->Manufacturer)->within('Manufacturer')->paginate();  
        }

        elseif ($request->filled('Brand_Name')){
            $lists = DrugModel::search($request->Brand_Name)->within('Brand_Name')->paginate();  
        }

        elseif (($request->filled('start_date')) && ($request->filled('end_date'))){
            $lists = DrugModel::where('Expiry_Date','>=',$newStart)
            ->where('Expiry_Date','<=',$newEnd) 
            ->orderBy('Expiry_Date', 'desc')      // oreder date 'asc' mean from min to max, 'desc' mean max to min
            ->paginate();
        }

        else{
            $lists = DrugModel::paginate(10);
        }

        return view ('Demo.home', compact('lists','markets','country','manufacturers','brands'));

    }
    
    public function store(Request $request)
    {
        $Registration_Type = DrugModel::select('Registration_Type')->orderBy('Registration_Type', 'ASC')->distinct()->get();
        $Application_Type = DrugModel::select('Application_Type')->orderBy('Application_Type', 'ASC')->distinct()->get();
        $Intention = DrugModel::select('This_product_is_intended_for')->orderBy('This_product_is_intended_for', 'ASC')->distinct()->get();
    
        return view ('Demo.create', compact('Registration_Type','Application_Type','Intention'));
    }

    public function dashboard()
    {
        //  Expiry date alert 
        $IssueDate = DrugModel::select("Expiry_Date")->get();
        $Now = Carbon::now('Etc/GMT+6')->format('o-m-d');    
        $Range = Carbon::now('Etc/GMT+6')->addMonths(3)->format('o-m-d');
        $Expire_number=0;
        foreach ($IssueDate as $Date) {
            if($Date->Expiry_Date >= $Now && $Date->Expiry_Date <= $Range){
                $Expire_number++;
            };
        }

        // Country pie chart 
        // Reference -> https://www.chartjs.org/

        $Update_time = Carbon::now('Etc/GMT+6')->format('g-a');

        $Countries = DrugModel::select('Country_of_Manufacturer')->get();
        $Country = DrugModel::select('Country_of_Manufacturer')->distinct()->get();

        $ListCountry =[];
        $Number =[];

        // if ($Update_time == "11-pm") {

        //     foreach ($Country as $Data) {
        //         $raws = $Data->Country_of_Manufacturer;
        //         array_push($ListCountry,$Data->Country_of_Manufacturer);
        //     }
    
        //     for ($i=0; $i <= count($ListCountry)-1  ; $i++) { 
                
        //         foreach ($Countries as $items){
        //             $Counts = DrugModel::where('Country_of_Manufacturer','=',$ListCountry[$i])->count();
        //             $Number[$i] = $Counts;
        //         }                
        //     }

        // }
        // else{

        //     $Country_db = CountryModel::select('Country')->get();
        //     $Number_Drugs = CountryModel::select('Amount_of_drugs')->get();
        //     foreach ($Country_db as $Data) {
        //         array_push($ListCountry,$Data->Country);
        //     }

        //     foreach ($Number_Drugs as $Data) {
        //         array_push($Number,$Data->Amount_of_drugs);
        //     }

        // }

            
        $Country_db = CountryModel::select('Country')->get();
        $Number_Drugs = CountryModel::select('Amount_of_drugs')->get();
        foreach ($Country_db as $Data) {
            array_push($ListCountry,$Data->Country);
        }

        foreach ($Number_Drugs as $Data) {
            array_push($Number,$Data->Amount_of_drugs);
        }


        // Doughnut Chart
        $ListIntention =[];
        $Amount_of_intent =[];
        
        $Intents = DrugModel::select('This_product_is_intended_for')->distinct()->get();
        foreach ($Intents as $Intent){
            $raws = $Intent->This_product_is_intended_for;
            array_push($ListIntention, $raws);
        }

        $Amount_intention = IntentionModel::select('Amount_of_each')->get();
        foreach ($Amount_intention as $Amounts){
            array_push($Amount_of_intent, $Amounts->Amount_of_each);
        }

        // Amount of Manufacturer
        $Amount_of_Manufacturer = DrugModel::select('Manufacturer')->distinct()->get()->count();
          
        // Total Drug
        $total = DrugModel::select("SL")->get()->count();

        // Essential
        $essential = DrugModel::where("Essential","Essential")->get()->count();

        // Non-esssential
        $non_essential = DrugModel::where("Essential","Non-essential")->get()->count();
        
        return view ('Demo.dashboard', 
        compact('IssueDate',
        'Expire_number',
        'total',
        'ListCountry',
        'Number',
        'ListIntention',
        'Amount_of_intent',
        'Amount_of_Manufacturer',
        'essential',
        'non_essential',
        ));
    }

    public function lists(Request $request)
    {
        // $lists = DrugModel::paginate(10);
        $country = DrugModel::select('Country_of_Manufacturer')->distinct()->get();

        $Now = Carbon::now('Etc/GMT+6')->format('o-m-d');    
        $Range = Carbon::now('Etc/GMT+6')->addYears(10)->format('o-m-d');

        // Search name fix
        if($request->filled('search_name')){
            $lists = DrugModel::search($request->input('search_name'))->paginate();
        }
        elseif ($request->filled('Country_Market_holder')){
            $lists = DrugModel::where('Expiry_Date','>=',$Now)->where('Country_of_Manufacturer','LIKE','%'.$request->input('Country_Market_holder').'%')->paginate();  
        }
        else{
            $lists = DrugModel::whereBetween('Expiry_Date',[$Now , $Range])->paginate(10);
        }
        
        return view ('Demo.listofdrug', compact('lists','country'));
    }

    public function expiry(Request $request)
    {
        $country = DrugModel::select('Country_of_Manufacturer')->distinct()->get();

        if($request->filled('search_name')){
            $lists = DrugModel::search($request->input('search_name'))->paginate(10);
            
        }
        elseif ($request->filled('Country_Market_holder')){
            $lists = DrugModel::where('Expiry_Date','<=',date('o-m-d'))->where('Country_of_Manufacturer','LIKE','%'.$request->input('Country_Market_holder').'%')->paginate(10);  
        }
        
        else{
            $lists = DrugModel::whereDate('Expiry_Date','<=',date('o-m-d'))->orderBy('Expiry_Date', 'DESC')->paginate(10);
            
        }
        
        return view ('Demo.expiry', compact('lists','country'));
    }

    public function show($SL)
    {
        $individual = DrugModel::find($SL);
        
        return view('Demo.showdetail',compact('individual'));
    }

    public function edit($SL)
    {
        $individual = DrugModel::find($SL);

        $Registration_Type = DrugModel::select('Registration_Type')->orderBy('Registration_Type', 'ASC')->distinct()->get();
        $Application_Type = DrugModel::select('Application_Type')->orderBy('Application_Type', 'ASC')->distinct()->get();
        $Intention = DrugModel::select('This_product_is_intended_for')->orderBy('This_product_is_intended_for', 'ASC')->distinct()->get();

        return view('Demo.edit',compact('Registration_Type','Application_Type','Intention'))->with('individual', $individual);
    }


    // Update and edit existing drug

    private $spreadSheetId;

    private $client;

    private $googleSheetService;


    public function update(Request $request, $SL)
    {
        // Mysql database updating part

        $validated = $request->validate([
            'Registration_Type' => 'required',
            'Application_Type' => 'required',
            'Market_Authorisation_Holder' => 'required',
            'Category_of_Medical_Product' => 'required',
            'This_product_is_intended_for' => 'required',
            'Generic_Name' => 'required',
            'Brand_Name' => 'required',
            'Dosage_Form' => 'required',
            'Pack_Size' => 'required',
            'Type_of_Packaging' => 'required',
            'Composition_of_active_ingredients_with_strengths' => 'required',
            'Manufacturer' => 'required',
            'Therapeutic_Category' => 'required',
            'Certificate_Number' => 'required',
            'Issue_Date' => 'required',
            'Expiry_Date' => 'required',
            'Essential' => 'max:255',
        ]);

        $individual = DrugModel::findOrFail($SL);
        $individual->update($validated);


            // ,['id' => $individual->SL ]
        // Update
        // for ($i=1; $i <= 2960; $i++) { 
        //     if ($old = DrugModel::find($i) == NULL){
        //         print("NO");
        //     }
        //     $old = DrugModel::find($i);
        //     $old->update(['Expiry_Date'=>Carbon::parse($old->Issue_Date)->addYear(3)->format('Y-m-d')]); 
                
        // }

        // Google sheet API update
        // Reference -> https://www.nidup.io/blog/manipulate-google-sheets-in-php-with-api

        // $this->spreadSheetId='1ja3haHVrOdlcrmBPqmO8Y6P6GBhbwC9I5wAVfoJcHcE';
        // $this->client = new \Google\Client();
        // $this->client->setAuthConfig(storage_path('credentials.json'));
        // $this->client->addScope("https://www.googleapis.com/auth/spreadsheets");
        // $this->client->setAccessType('offline');

        // $this->googleSheetService = new Google_Service_Sheets($this->client);

        // $now = Carbon::now()->format('o-m-d H:i:s');
        // $created_at = $individual->created_at;

        // $updateRow = [
        //         $SL,
        //         $request->Registration_Type,
        //         $request->Application_Type,
        //         $request->Market_Authorisation_Holder,
        //         $request->Category_of_Medical_Product,
        //         $request->This_product_is_intended_for,
        //         $request->Generic_Name,
        //         $request->Brand_Name,
        //         $request->Dossage_Form,
        //         $request->Pack_Size,
        //         $request->Type_of_Packaging,
        //         $request->Composition_of_active_ingredients_with_strengths,
        //         $request->Manufacturer,
        //         $request->Therapeutic_Category,
        //         $request->Certificate_Number,
        //         $request->Country_of_Manufacturer,
        //         $request->Issue_Date,
        //         $request->Expiry_Date,
        //         $created_at,
        //         $now,
        // ];
        // $rows = [$updateRow];
        // $valueRange = new Google_Service_Sheets_ValueRange();
        // $valueRange->setValues($rows);
        // $range = 'A'.$SL+1;     // where the replacement will start, here, first column and second line
        // $options = ['valueInputOption' => 'USER_ENTERED'];
        // $this->googleSheetService->spreadsheets_values->update($this->spreadSheetId, $range, $valueRange, $options);

        
        return redirect()->route('show_case',['id' => $individual->SL ])->with('success','Successfully updated!');
    }


    // Create new drug coding

    public function create(Request $request)
    {
        // Mysql database creating part
        $SL_sql = count(DrugModel::select('SL')->get())+1;

        $validated = $request->validate([
            'Registration_Type' => 'required',
            'Application_Type' => 'required',
            'Market_Authorisation_Holder' => 'required',
            'Category_of_Medical_Product' => 'required',
            'This_product_is_intended_for' => 'required',
            'Generic_Name' => 'required',
            'Brand_Name' => 'required',
            'Dossage_Form' => 'required',
            'Pack_Size' => 'required',
            'Type_of_Packaging' => 'required',
            'Composition_of_active_ingredients_with_strengths' => 'required',
            'Manufacturer' => 'required',
            'Therapeutic_Category' => 'required',
            'Certificate_Number' => 'required',
            'Country_of_Manufacturer' => 'required',
            'Issue_Date' => 'required',
            'Expiry_Date' => 'required',
            'Essential' => 'max:255',
        ]);

        // $validated['SL']="$SL_sql";
        // dd($validated);

        DrugModel::create($validated);

        // Google sheet API create
        // Reference -> https://developers.google.com/sheets/api/guides/concepts

        $this->spreadSheetId = config('RepositoryBackup.google_sheet_id');

        $this->client = new \Google\Client();
        $this->client->setAuthConfig(storage_path('credentials.json'));
        $this->client->addScope("https://www.googleapis.com/auth/spreadsheets");
        $this->client->setAccessType('offline');

        $this->googleSheetService = new Google_Service_Sheets($this->client);

        $number_row = count(DrugModel::select('SL')->get())+1;
        $SL = count(DrugModel::select('SL')->get());
        $now = Carbon::now()->format('o-m-d H:i:s');
        
        // Google sheet API (Add)
        try{
            $values = [[ $SL,
                $request->Registration_Type,
                $request->Application_Type,
                $request->Market_Authorisation_Holder,
                $request->Category_of_Medical_Product,
                $request->This_product_is_intended_for,
                $request->Generic_Name,
                $request->Brand_Name,
                $request->Dossage_Form,
                $request->Pack_Size,
                $request->Type_of_Packaging,
                $request->Composition_of_active_ingredients_with_strengths,
                $request->Manufacturer,
                $request->Therapeutic_Category,
                $request->Certificate_Number,
                $request->Country_of_Manufacturer,
                $request->Issue_Date,
                $request->Expiry_Date,
                $now,
                $now,

                ]];

            
    
            $body = new Google_Service_Sheets_ValueRange([
                'values' => $values
            ]);

            $params = [
                'valueInputOption' => 'RAW'
            ];

            $range= 'A'.$number_row;
            
            //executing the request
            $result = $this->googleSheetService->spreadsheets_values->update($this->spreadSheetId, $range, $body, $params);
            
            // printf("%d cells updated.", $result->getUpdatedCells());
        }

        catch(Exception $e) {
                // TODO(developer) - handle error appropriately
                echo 'Message: ' .$e->getMessage();
        }
        

        return redirect()->route('home')->with('Asuccess','Successfully Created!')->with('result', $result);
    }


}