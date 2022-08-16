@extends('Demo.layout')

@section('content')

<div class="card my-5 mx-5">
    <div class="card-header fw-bolder fs-3 text-center">
        Update drug
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

    <div class="card-body">

        <form action=" {{ url('/update/'.$individual->SL) }} " method="post" enctype="multipart/form-data">
            {!! csrf_field() !!}
            @method("PATCH")
            <div class="row">

                <!-- First line -->
                <div class="col-md-4">
                    <label>Registration Type</label></br>
                    <input class="form-control" id="Rtype" name="Registration_Type" placeholder="Type to enter" list="Rtypes" value="{{ $individual->Registration_Type }}"></br>
                    
                    <!-- List for helping -->
                    <datalist id="Rtypes">
                        @foreach($Registration_Type as $Rtype)
                        <option value="{{ $Rtype->Registration_Type }}">
                            {{ $Rtype->Registration_Type }}</option>
                        @endforeach
                    </datalist>

                </div>
                <div class="col-md-4">
                    <label >Application Type</label></br>
                    <input class="form-control" id="Atype" name="Application_Type" placeholder="Type to enter" list="Atypes" value="{{ $individual->Application_Type }}"></br>

                    <!-- List for helping -->
                    <datalist id="Atypes">
                        @foreach($Application_Type as $Atype)
                        <option value="{{ $Atype->Application_Type }}">
                            {{ $Atype->Application_Type }}</option>
                        @endforeach
                    </datalist>

                </div>
                <div class="col-md-4">
                    <label>This product is intended for</label></br>
                    <input class="form-control" id="Intention" name="This_product_is_intended_for" placeholder="Type to enter" list="Intention" value="{{ $individual->This_product_is_intended_for }}"></br>
                    
                    <!-- List for helping -->
                    <datalist id="Intention">
                        @foreach($Intention as $intention)
                        <option value="{{ $intention->This_product_is_intended_for }}">
                            {{ $intention->This_product_is_intended_for }}</option>
                        @endforeach
                    </datalist>
                </div>

                <!-- Second line -->
                <div class="col-md-4">
                    <label>Category of Medical Product</label></br>
                    <input type="text" name="Category_of_Medical_Product" id="CategoryOfMedical" class="form-control" value="{{ $individual->Category_of_Medical_Product }}"></br>
                </div>
                <div class="col-md-4">
                    <label> Dosage Form</label></br>
                    <input type="text" name="Dosage_Form" id="Dform" class="form-control" placeholder="Type to enter" list="Dform" value="{{ $individual->Dosage_Form }}"></br>

                    <!-- List for helping -->
                    <datalist id="Intention">
                        @foreach($Intention as $intention)
                        <option value="{{ $intention->This_product_is_intended_for }}">
                            {{ $intention->This_product_is_intended_for }}</option>
                        @endforeach
                    </datalist>
                </div>
                <div class="col-md-4">
                    <label>Pack Size</label></br>
                    <input type="text" name="Pack_Size" id="name" class="form-control" value="{{ $individual->Pack_Size }}"></br>
                </div>

                <!-- Third line -->
                <div class="col-md-4">
                    <label>Brand Name</label></br>
                    <input type="text" name="Brand_Name" id="name" class="form-control" value="{{ $individual->Brand_Name }}"></br>
                </div>
                <div class="col-md-4">
                    <label>Type of Packaging</label></br>
                    <input type="text" name="Type_of_Packaging" id="name" class="form-control" value="{{ $individual->Type_of_Packaging }}"></br>
                </div>
                <div class="col-md-4">
                    <label>Therapeutic Category</label></br>
                    <input type="text" name="Therapeutic_Category" id="name" class="form-control" value="{{ $individual->Therapeutic_Category }}"></br>
                </div>

                <!-- Fourth line -->
                <div class="col-md-4">
                    <label>Certificate Number</label></br>
                    <input type="text" name="Certificate_Number" id="name" class="form-control" value="{{ $individual->Certificate_Number }}"></br>
                </div>
                <div class="col-md-4">
                    <label>Issue Date</label></br>
                    <input type="date" name="Issue_Date" id="name" class="form-control" value="{{ Carbon\Carbon::parse($individual->Issue_Date)->format('Y-m-d') }}"></br>
                </div>
                <div class="col-md-4">
                    <label>Expiry Date</label></br>
                    <input type="date" name="Expiry_Date" id="name" class="form-control" value="{{ Carbon\Carbon::parse($individual->Expiry_Date)->format('Y-m-d') }}"></br>
                </div>

                <!-- Fifth line -->
                <div class="col-md-4">
                    <label>Market Authorisation Holder</label></br>
                    <input type="text" name="Market_Authorisation_Holder" id="name" class="form-control" value="{{ $individual->Market_Authorisation_Holder }}"></br>
                </div>
                <div class="col-md-4">
                    <label>Generic Name</label></br>
                    <input type="text" name="Generic_Name" id="name" class="form-control" value="{{ $individual->Generic_Name }}"></br>
                </div>
                <div class="col-md-4">
                <label>Essential/Non-essential</label></br>
                    <select class="form-select" id="Essential" name="Essential">
                        <option class="disable">{{$individual->Essential}}</option>
                        <option value="Essential">Essential</option>
                        <option value="Non-essential">Non-essential</option>
                    </select>
                </div>

                <!-- Sixth line -->
                <div class="col-md-6">
                    <label>Manufacturer</label></br>
                    <input type="text" name="Manufacturer" id="name" class="form-control" value="{{ $individual->Manufacturer }}"></br>
                </div>
                <div class="col-md-6">
                    <label>Country of Manufacturer</label></br>
                    <input type="text" name="Country_of_Manufacturer" id="country" class="form-control" value="{{ $individual->Country_of_Manufacturer }}" disabled></br>
                </div>
                <!-- Seventh line -->
                <div class="col-md-12 mb-4">
                    <label>Composition of active ingredients with strengths</label></br>
                    <textarea class="form-control" id="exampleFormControlTextarea1" name='Composition_of_active_ingredients_with_strengths' rows="3">{{ $individual->Composition_of_active_ingredients_with_strengths }}</textarea>
                </div>

            </div>

            <div class="d-grid gap-2">
                <button class="btn btn-success" type="submit" value="Update">Update</button>
            </div>

        </form>

    </div>
</div>

@endsection