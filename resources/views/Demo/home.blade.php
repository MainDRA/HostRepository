@extends('Demo.layout')


@section('content')
<!-- Successfully updated -->
@if(Session::has('Asuccess'))
<div class="alert alert-success">
    {{ Session::get('Asuccess') }}
    @php
    Session::forget('Asuccess');
    @endphp
</div>
@endif

<div class="container mt-5">

    <div class="row d-flex justify-content-center">

        <div class="col-md-10">

            <div class="card p-3 py-4">

                <h3 class="px-2">Filter</h3>

                <form action="{{ route('home')}}" method="GET" accept-charset="utf-8">

                    <div class="row g-3 mt-2">

                        <div class="col-sm-8 col-12">

                            <input type="text" name="search_name" value="{{ request()->get('search_name') }}"
                                class="form-control" aria-label="Search" aria-describedby="button-addon2"
                                placeholder="Enter Certificate Number, Brand Name, Manufacturer and Therapeutic Category">

                        </div>

                        <div class=" col-sm-4 col-12">

                            <button class="btn btn-secondary btn-block" type="submit" value="Submit">Search
                                Results</button>

                        </div>

                    </div>


                    <div class="mt-3">

                        <a class="btn btn-secondary dropdown-toggle mb-2" data-bs-toggle="collapse"
                            href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                            Advance Search With Filters
                        </a>

                        <div class="collapse" id="collapseExample">
                            <div class="card card-body">

                                <div class="row">

                                    <div class="col-md-6 ">

                                        <div class="mb-2">
                                            <label for="startingDate">Start date</label>
                                            <input placeholder="Selected starting date" type="date" id="startingDate"
                                                name="start_date" class="form-control datepicker">
                                        </div>

                                    </div>
                                    <div class="col-md-6 ">
                                        <div class="mb-2">
                                            <label for="endingDate">End date</label>
                                            <input placeholder="Selected ending date" type="date" id="endingDate"
                                                name="end_date" class="form-control datepicker">
                                        </div>
                                    </div>

                                    <div class="col-md-6 mt-2">

                                        <select class="selectpicker w-100 " data-size="8" data-live-search="true"
                                            aria-label="Default select example" name="Market_Authorisation_Holder"
                                            id="Market_Authorisation_Holder" data-dependent="state"
                                            value="{{ request()->get('Market_Authorisation_Holder') }}">
                                            <option value="" disabled selected>Select the market Authorization Holder
                                            </option>
                                            @foreach($markets as $market)
                                            <option value="{{ $market->Market_Authorisation_Holder }}">
                                                {{ $market->Market_Authorisation_Holder }}
                                            </option>
                                            @endforeach
                                        </select>


                                    </div>


                                    <div class="col-md-6 mt-2">

                                        <select class="selectpicker w-100" data-size="8" data-live-search="true"
                                            aria-label="Default select example" name="Manufacturer" id="Manufacturer"
                                            data-dependent="state" value="{{ request()->get('Manufacturer') }}">
                                            <option value="" disabled selected>
                                                Select Manufacturer
                                            </option>
                                            @foreach( $manufacturers as $manufacturer)
                                            <option value="{{ $manufacturer->Manufacturer }}">
                                                {{ $manufacturer->Manufacturer }}
                                            </option>
                                            @endforeach
                                        </select>

                                    </div>


                                    <div class="col-md-6 mt-2">

                                        <select class="selectpicker w-100" data-size="8" data-live-search="true"
                                            aria-label="Default select example" name="Brand_Name" id="Brand_Name"
                                            data-dependent="state" value="{{ request()->get('Brand_Name') }}">
                                            <option value="" disabled selected>Select brand name
                                            </option>
                                            @foreach( $brands as $brand)
                                            <option value="{{ $brand->Brand_Name }}">
                                                {{  $brand->Brand_Name }}
                                            </option>
                                            @endforeach
                                        </select>

                                    </div>

                                    <div class="col-md-6 mt-2">

                                        <select class="selectpicker w-100" data-live-search="true"
                                            aria-label="Default select example" name="Country_Market_holder"
                                            id="Market_holder" data-dependent="state"
                                            value="{{ request()->get('Country_Market_holder') }}">
                                            <option value="" disabled selected>Select country</option>
                                            @foreach($country as $country)
                                            <option value="{{$country->Country_of_Manufacturer}}">
                                                {{$country->Country_of_Manufacturer}}
                                            </option>
                                            @endforeach
                                        </select>

                                    </div>

                                </div>

                            </div>

                        </div>
                    </div>
                </form>
            </div>

        </div>

    </div>

</div>

<!-- Table engine -->
<div class="table-responsive mt-5 mb-5 mx-4 bdr ">
    <table class="table table-hover table-light table-striped p-3">
        <thead>
            <tr class="align-middle">
                <th class="fw-bold">Certification number</th>
                <th class="fw-bold">Generic name</th>
                <th class="fw-bold">Brand name</th>
                <th class="fw-bold">Therapeutic category</th>
                <th class="fw-bold">Manufacturer</th>
                <th class="fw-bold">Market Authorisation</th>
                <th class="fw-bold">Expire date</th>
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
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Withstringquery paginate-->
    {{$lists->appends(request()->query())->links()}}

</div>

@endsection
