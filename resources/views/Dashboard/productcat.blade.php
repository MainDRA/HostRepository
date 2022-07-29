@extends('Demo.layout')

@section('content')

<div class="container">
    <div class="row m-2">

        @foreach ($Category_of_Medical_Product as $item)
        <div class="col-md-3 my-5">
            <div class="card h-100" >
                <img src="/images/Product_cat/Human_medicine.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{$item->Category_of_Medical_Product}}</h5>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection
