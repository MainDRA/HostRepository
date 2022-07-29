@extends('Demo.layout')

@section('content')

<!-- Table engine -->
@if ( !isset($raws[0])  )
<div class="container ">
    <div class="alert alert-primary m-5 text-center fs-5" role="alert">
        There aren't any nearly expiry certification
    </div>
</div>


@else

<div class="table-responsive my-5 mx-4">
    <table class="table table-hover table-light table-striped">
        <thead>
            <tr class="align-middle ">
                <th class="fw-bold">Certification number</th>
                <th class="fw-bold">Generic name</th>
                <th class="fw-bold">Brand name</th>
                <th class="fw-bold">Therapeutic category</th>
                <th class="fw-bold">Manufacturer</th>
                <th class="fw-bold">Market Authorisation</th>
                <th class="fw-bold">Expire date</th>
                <th class="fw-bold">More detail</th>
            </tr>
        </thead>
        <tbody>
            @foreach($raws as $raw)
            <tr>
                <td>{{ $raw->Certificate_Number}}</td>
                <td>{{ $raw->Generic_Name }}</td>
                <td>{{ $raw->Brand_Name }}</td>
                <td>{{ $raw->Therapeutic_Category }}</td>
                <td>{{ $raw->Manufacturer}}</td>
                <td>{{ $raw->Market_Authorisation_Holder }}</td>
                <td>{{ Carbon\Carbon::parse($raw->Issue_Date)->addYear(3)->format('j-M-Y') }}</td>
                <td class="align-middle text-center"><a class="test btn btn-light text-dark btn-lg"
                        href="{{URL('/'.$raw->SL)}}"><i class="fa-solid fa-circle-chevron-right fa-xl"></i></a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{$raws}}
</div>

@endif

@endsection
