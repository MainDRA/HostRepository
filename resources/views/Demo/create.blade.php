@extends('Demo.layout')

@section('content')

<div class="card my-5 mx-5">
    <div class="card-header fw-bolder fs-3 text-center">
        Add new drug
    </div>

    <!-- If there is any error -->
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif


    <form action="{{url('/add_create/create')}}" method="post" enctype="multipart/form-data" class="my-4 mx-4">
        {!! csrf_field() !!}

        <div class="row">

            <!-- First line -->
            <div class="col-md-4 mb-4">
                <label>Registration Type</label></br>
                
                <select class="form-select" id="Registration_Type" name="Registration_Type" onchange="RtypeSelect();">
                    <option value="Full Registration">Full Registration</option>
                    <option value="Expedited Registration">Expedited Registration</option>
                    <option value="Abridged Registration">Abridged Registration</option>
                    <option value="Company Registration">Company Registration</option>
                    <option value="Renewed Registration">Renewed Registration</option>
                </select>

            </div>
            <div class="col-md-4">
                <label>Application Type</label></br>
                
                <select class="form-select" id="Atype" name="Application_Type">
                    <option value="Generic Drug application">Generic Drug application</option>
                    <option value="New Drug application">New Drug application</option>
                </select>

            </div>
            <div class="col-md-4">
                <label>This product is intended for</label></br>
                
                <select class="form-select" id="Intention" name="This_product_is_intended_for" onchange="RtypeSelect();">
                    <option value="Veterinary">Veterinary</option>
                    <option value="Human">Human</option>
                </select>
            </div>

            <!-- Second line -->
            <div class="col-md-4">
                <label>Category of Medical Product</label></br>
        
                <select class="form-select" id="CategoryOfMedical" name="Category_of_Medical_Product">
                    <option value="Human Allopathic Medicine">Human Allopathic Medicine</option>
                    <option value="Veterinary Allopathic Medicine">Veterinary Allopathic Medicine</option>
                    <option value="Herbal Medicine">Herbal Medicine</option>
                    <option value="Traditional Medicine">Traditional Medicine</option>
                </select>
            </div>
            <div class="col-md-4">
                <label> Dossage Form</label></br>
                <input type="text" name="Dossage_Form" id="Dossage_Form" class="form-control" placeholder="Type to enter"></br>
            </div>
            <div class="col-md-4">
                <label>Pack Size</label></br>
                <input type="text" name="Pack_Size" id="Pack_Size" class="form-control"></br>
            </div>

            <!-- Third line -->
            <div class="col-md-4">
                <label>Brand Name</label></br>
                <input type="text" name="Brand_Name" id="Brand_Name" class="form-control"></br>
            </div>
            <div class="col-md-4">
                <label>Type of Packaging</label></br>
                <input type="text" name="Type_of_Packaging" id="Type_of_Packaging" class="form-control"></br>
            </div>
            <div class="col-md-4">
                <label>Therapeutic Category</label></br>
                <input type="text" name="Therapeutic_Category" id="Therapeutic_Category" class="form-control" 
                placeholder="Type to enter" list="TC"></br>
                <!-- List for helping -->
                <datalist id="TC">
                    @foreach($Therapeutic_cat as $Tcat)
                    <option value="{{ $Tcat->Therapeutic_category}}">
                        {{ $Tcat->Therapeutic_category }}</option>
                    @endforeach
                </datalist>
            </div>

            <!-- Fourth line -->
            <div class="col-md-4">
                <label>Certificate Number</label></br>
                <input type="text" name="Certificate_Number" id="Certificate_Number" class="form-control" value="BHU-DRA/{{$This_year}}/"></br>
            </div>
            <div class="col-md-4">
                <label>Issue Date</label></br>
                <input type="date" name="Issue_Date" id="Issue_Date" class="form-control"></br>
            </div>
            <div class="col-md-4">
                <label>Expiry Date</label></br>
                <input type="date" name="Expiry_Date" id="Expiry_Date" class="form-control"></br>
            </div>

            <!-- Fifth line -->
            <div class="col-md-4">
                <label>Market Authorisation Holder</label></br>
                <input type="text" name="Market_Authorisation_Holder" id="Market_Authorisation_Holder" class="form-control"></br>
            </div>
            <div class="col-md-4">
                <label>Generic Name</label></br>
                <input type="text" name="Generic_Name" id="name" class="form-control"></br>
            </div>
            <div class="col-md-4">
                <label>Essential/Non-essential</label></br>
                <select class="form-select" id="Essential" name="Essential">
                    <option value="Essential">Essential</option>
                    <option value="Non-essential">Non-essential</option>
                </select>
            </div>

            <!-- Sixth line -->
            <div class="col-md-6">
                <label>Manufacturer</label></br>
                <input type="text" name="Manufacturer" id="Manufacturer" class="form-control"></br>
            </div>
            <div class="col-md-6">
                <label>Country of Manufacturer</label></br>
                <select class="selectpicker countrypicker w-100" data-flag="true" data-live-search="true"
                    name="Country_of_Manufacturer"></select>
            </div>
            <!-- Seventh line -->
            <div class="col-md-12 mb-4">
                <div class="row">
                    <div class="col-md-6">
                        <label>
                            Composition of active ingredients with strengths ( Insert within 170 characters )
                        </label>
                    </div>
                    <div class="col-md-6 text-end">
                        <div id="the-count">
                            <span id="current">0</span>
                            <span id="maximum">/ 170</span>
                        </div>
                    </div>

                </div>

                </br>

                <textarea class="form-control" id="Composition_of_active_ingredients_with_strengths" rows="3"
                    name="Composition_of_active_ingredients_with_strengths"></textarea>
            </div>

        </div>

        <div class="d-grid gap-2">
            <button class="btn btn-success" type="submit" value="Create">Save</button>
        </div>

    </form>

</div>

<script>

    $('textarea').keyup(function() {
    
    var characterCount = $(this).val().length,
        current = $('#current'),
        maximum = $('#maximum'),
        theCount = $('#the-count');
      
    current.text(characterCount);
   
    
    /*This isn't entirely necessary, just playin around*/
    if (characterCount < 70) {
      current.css('color', '#666');
    }
    if (characterCount > 70 && characterCount < 90) {
      current.css('color', '#6d5555');
    }
    if (characterCount > 90 && characterCount < 100) {
      current.css('color', '#793535');
    }
    if (characterCount > 100 && characterCount < 120) {
      current.css('color', '#841c1c');
    }
    if (characterCount > 120 && characterCount < 139) {
      current.css('color', '#8f0001');
    }
    
    if (characterCount >= 140) {
      maximum.css('color', '#8f0001');
      current.css('color', '#8f0001');
      theCount.css('font-weight','bold');
    } 
    
    else {
      maximum.css('color','#666');
      theCount.css('font-weight','normal');
    }
        
    });

    // Certification number generate

    function RtypeSelect()
    {
        var val = document.getElementById("Registration_Type").value;
        if (val == "Full Registration"){
            if (document.getElementById("Intention").value == "Veterinary"){
                document.getElementById("Certificate_Number").value="BHU-DRA/{{$This_year}}/V{{$full}}";
            }
            else if(document.getElementById("Intention").value == "Human"){
                document.getElementById("Certificate_Number").value="BHU-DRA/{{$This_year}}/H{{$full}}";
            }   
        }
        else if (val == "Expedited Registration"){
            if (document.getElementById("Intention").value == "Veterinary"){
                document.getElementById("Certificate_Number").value="BHU-DRA/{{$This_year}}/ER/V{{$ex}}";
            }
            else if(document.getElementById("Intention").value == "Human"){
                document.getElementById("Certificate_Number").value="BHU-DRA/{{$This_year}}/ER/H{{$ex}}";
            }  
        }
        else if (val == "Abridged Registration"){
            if (document.getElementById("Intention").value == "Veterinary"){
                document.getElementById("Certificate_Number").value="BHU-DRA/{{$This_year}}/AR/V{{$ab}}";
            }
            else if(document.getElementById("Intention").value == "Human"){
                document.getElementById("Certificate_Number").value="BHU-DRA/{{$This_year}}/AR/H{{$ab}}";
            }  
        }
        else if (val == "Company Registration"){
            if (document.getElementById("Intention").value == "Veterinary"){
                document.getElementById("Certificate_Number").value="BHU-DRA/{{$This_year}}/CR/V{{$cr}}";
            }
            else if(document.getElementById("Intention").value == "Human"){
                document.getElementById("Certificate_Number").value="BHU-DRA/{{$This_year}}/CR/H{{$cr}}";
            }  
        }
        else {
            if (document.getElementById("Intention").value == "Veterinary"){
                document.getElementById("Certificate_Number").value="BHU-DRA/{{$This_year}}/RN/V{{$rn}}";
            }
            else if(document.getElementById("Intention").value == "Human"){
                document.getElementById("Certificate_Number").value="BHU-DRA/{{$This_year}}/RN/H{{$rn}}";
            }
        }
        
    }

</script>

@endsection
