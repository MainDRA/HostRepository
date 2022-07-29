<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DrugModel;
use setasign\Fpdi\Fpdi;
use Carbon\Carbon;



class CertificationController extends Controller
{
    public function certification($SL)
    {
        $individuals = DrugModel::find($SL);

        $CerNumber = $individuals->Certificate_Number;
        $Expire = Carbon::parse($individuals->Issue_Date)->addYear(3)->format('j-M-Y'); // change format of expiry date

        // Reference -> http://www.fpdf.org/ 

        // Generic name
        $Gname = substr($individuals->Generic_Name,0,30);
    
        $Tname = $individuals->Brand_Name;
        $Dform = $individuals->Dosage_Form;
        $Psize = $individuals->Pack_Size;
        $Tpack = $individuals->Type_of_Packaging;
        $Tcat = $individuals->Therapeutic_Category;
        $Mah = $individuals->Market_Authorisation_Holder;
        $Manufacturer = $individuals->Manufacturer;
        $IssueDate = Carbon::parse($individuals->Issue_Date)->format('j-M-Y'); // change format of issue date

        // Ingredients function
        $Ingredients = substr(strstr($individuals->Composition_of_active_ingredients_with_strengths,':'),0,170);
        $Title = strstr($individuals->Composition_of_active_ingredients_with_strengths,':',TRUE);
        
        $pdf = new Fpdi();

        // add a page
        $pdf->AddPage();
        
        // Add Book Antique font
        $pdf->AddFont('BookAntiqua','','BKANT.php');
        $pdf->AddFont('BookAntiqua','B','book-antiqua-bold.php');
        
        $pdf->SetFont('BookAntiqua','',7);
        
    
        // set the source file
        $path = public_path("certification/Certificates_removed.pdf");
    
        $pdf->setSourceFile($path);
    
        // import page 1
        $tplId = $pdf->importPage(1);
    
    
        // use the imported page and place it at point 10,10 with a width of 100 mm
        $pdf->useTemplate($tplId, null, null, null, 210, true);
        
        // Certification number
        $pdf->SetXY(25, 49.3);
        $pdf->Write(0.1,"$CerNumber");

        // Expire date 
        $pdf->SetXY(46, 67);
        $pdf->Write(0.1,"$Expire");

        // Generic name
        $pdf->SetXY(39, 83.5);
        $pdf->Write(0.1,"$Gname");

        // Trade name
        $pdf->SetXY(95, 83.5);
        $pdf->Write(0.1,"$Tname");

        // Doosage form
        $pdf->SetXY(122, 95);
        $pdf->Write(0.1,"$Dform");

        // Pack size
        $pdf->SetXY(120, 108);
        $pdf->Write(0.1,"$Psize");

        // Type of package
        $pdf->SetXY(117, 118);
        $pdf->Write(0.1,"$Tpack");

        // Therapeutic category
        $pdf->SetXY(39, 125.5);
        $pdf->Write(0.1,"$Tcat");

        // Market Authorisation Holder
        $pdf->SetXY(42, 130.55);
        $pdf->Write(0.1,"$Mah");

        // Manufacturer
        $pdf->SetXY(22, 135.7);
        $pdf->Write(0.1,"$Manufacturer");

        // Market by
        $pdf->SetXY(21, 141);
        $pdf->Write(0.1,"N/A");

        // issue date
        $pdf->SetXY(27, 181.5);
        $pdf->Write(0.1,"$IssueDate");

        // Ingredients
        $pdf->SetXY(38, 94);
        $pdf->MultiCell(45,5,iconv("UTF-8", "ISO-8859-1//IGNORE", $Ingredients));

        $pdf->SetFont('BookAntiqua','B',6.5);

        // Ingredients title
        $pdf->SetXY(37, 92);
        $pdf->Write(0.1,"$Title");


        // Preview PDF
        $pdf->Output('I',"$CerNumber.pdf");
        
    }

}
