@extends('Demo.layout')

@section('content')

<!-- Successfully updated -->
@if(Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
            @php
                Session::forget('success');
            @endphp
        </div>
@endif

<div class="card text-center m-5">
    <div class="card-header">
        {{$individual->Certificate_Number ?? 'Code Not Found'}}
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-light table-striped show-table">
                <tbody>
                    <tr>
                        <th scope="row">Market Authorisation Holder</th>
                        <td>{{$individual->Market_Authorisation_Holder ?? 'Code Not Found'}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Manufacturer</th>
                        <td>{{$individual->Manufacturer ?? 'Code Not Found'}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Country of Manufacturer</th>
                        <td>{{$individual->Country_of_Manufacturer ?? 'Code Not Found'}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Category of Medical Product</th>
                        <td>{{$individual->Category_of_Medical_Product ?? 'Code Not Found'}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Intention</th>
                        <td>{{$individual->This_product_is_intended_for ?? 'Code Not Found'}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Generic Name</th>
                        <td>{{$individual->Generic_Name ?? 'Code Not Found'}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Brand Name</th>
                        <td>{{$individual->Brand_Name ?? 'Code Not Found'}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Registration Type</th>
                        <td>{{$individual->Registration_Type ?? 'Code Not Found'}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Application Type</th>
                        <td>{{$individual->Application_Type ?? 'Code Not Found'}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Therapeutic Category</th>
                        <td>{{$individual->Therapeutic_Category ?? 'Code Not Found'}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Dosage Form</th>
                        <td>{{$individual->Dosage_Form ?? 'Code Not Found'}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Pack Size</th>
                        <td>{{$individual->Pack_Size ?? 'Code Not Found'}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Type of Packaging</th>
                        <td>{{$individual->Type_of_Packaging ?? 'Code Not Found'}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Ingredients</th>
                        <td>{{$individual->Composition_of_active_ingredients_with_strengths ?? 'Code Not Found'}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Issue date</th>
                        <td>{{$individual->Issue_Date ?? 'Code Not Found'}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Expire date</th>
                        <td>{{$individual->Expiry_Date ?? 'Code Not Found'}}</td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>
    <div class="card-footer text-muted">
        <div class="row">
            <div class="col-md-6 col-12 d-grid gap-2 ">
                <a href="{{ url('/edit/'.($individual->SL ?? 'Code Not Found') ) }}"><button class="btn btn-warning btn-lg w-100"><i class="fa fa-eye"></i> Edit</button></a>
            </div>
            <div class="col-md-6 col-12 d-grid gap-2 ">
                <a href="#"><button class="btn btn-danger btn-lg w-100 "><i class="fa-solid fa-x"></i> Delete</button></a>               
            </div>
        </div>
    </div>
    
</div>

@endsection
