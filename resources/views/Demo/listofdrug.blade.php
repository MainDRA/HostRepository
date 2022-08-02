@extends('Demo.layout')

@section('content')
<div class="row d-flex justify-content-center">

    <div class="col-md-10">

        <div class="card p-3  py-4">

            <h5>Filter</h5>

            <form action="{{ route('list')}}" method="GET" accept-charset="utf-8">

                <div class="row g-3 mt-2">

                    <div class="col-md-3">

                        <select class="selectpicker w-100" data-live-search="true" aria-label="Default select example"
                            name="Country_Market_holder" id="Market_holder" data-dependent="state"
                            value="{{ request()->get('Country_Market_holder') }}">
                            <option value="" disabled selected>Select country</option>
                            @foreach($country as $country)
                            <option value="{{$country->Country_of_Manufacturer}}">
                                {{$country->Country_of_Manufacturer}}
                            </option>
                            @endforeach
                        </select>


                    </div>

                    <div class="col-md-6">

                        <input type="text" name="search_name" value="{{ request()->get('search_name') }}"
                            class="form-control" aria-label="Search" aria-describedby="button-addon2"
                            placeholder="Enter Certificate Number, Brand Name, Manufacturer and Therapeutic Category">

                    </div>

                    <div class="col-md-3">

                        <button class="btn btn-secondary btn-block" type="submit" value="Submit">Search
                            Results</button>

                    </div>

                </div>

            </form>

        </div>

    </div>

</div>
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
                <th class="fw-bold">Certification</th>
                <th class="fw-bold">More detail</th>
            </tr>
        </thead>
        <tbody>
            @foreach($lists as $item)
            <tr>
                <td>{{ $item->Certificate_Number}}</td>
                <td>{{ $item->Generic_Name }}</td>
                <td>{{ $item->Brand_Name }}</td>
                <td>{{ $item->Therapeutic_Category }}</td>
                <td>{{ $item->Manufacturer}}</td>
                <td>{{ $item->Market_Authorisation_Holder }}</td>
                <td>{{ Carbon\Carbon::parse($item->Issue_Date)->addYear(3)->format('j-M-Y') }}</td>
                <td class="align-middle text-center"><a class="test btn btn-light text-dark btn-lg"
                        href="{{URL('/certification/'.$item->SL)}}">Click</a></td>
                <td class="align-middle text-center"><a class="test btn btn-light text-dark btn-lg"
                        href="{{URL('/'.$item->SL)}}"><i class="fa-solid fa-circle-chevron-right fa-xl"></i></a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
    <!-- Withstringquery paginate-->
    {{$lists->appends(request()->query())->links()}}
</div>
@endsection
