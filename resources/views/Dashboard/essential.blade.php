@extends('Demo.layout')

@section('content')



<!-- Table engine -->
<div class="table-responsive my-5 mx-4 bdr">
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
            @foreach($Amount_of_Essential as $item)
            <tr>
                <td>{{ $item->Certificate_Number}}</td>
                <td>{{ $item->Generic_Name }}</td>
                <td>{{ $item->Brand_Name }}</td>
                <td>{{ $item->Therapeutic_Category }}</td>
                <td>{{ $item->Manufacturer}}</td>
                <td>{{ $item->Market_Authorisation_Holder }}</td>
                <td>{{ Carbon\Carbon::parse($item->Issue_Date)->addYear(3)->format('j-M-Y') }}</td>
                <td class="align-middle text-center"><a class="test btn btn-light text-dark btn-lg"
                        href="{{URL('/certification/'.$item->SL)}}">Preview</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
    <!-- Withstringquery paginate-->
    {{$Amount_of_Essential->appends(request()->query())->links()}}

</div>
@endsection