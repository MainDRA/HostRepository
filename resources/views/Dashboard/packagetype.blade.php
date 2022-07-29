@extends('Demo.layout')

@section('content')


<div class="container">
    <div class="row m-2">
        @foreach ($Types_of_Packages as $item)
        <div class="col-md-3 d-flex justify-content-center align-items-center">
            <div class="card w-100 m-1 ">
                <div class="card-body text-center align-self-center justify-self-center">
                    {{$item->Type_of_Packaging}}
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection