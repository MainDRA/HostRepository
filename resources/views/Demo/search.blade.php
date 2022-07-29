@extends('Demo.layout')


@section('content')

<div class="container mt-5">

    <div class="row d-flex justify-content-center">

        <div class="col-md-10">

            <div class="card p-3  py-4">

                <h5>Filter</h5>

                <form action="" method="GET" accept-charset="utf-8">

                    <div class="row g-3 mt-2">

                        <div class="col-md-3">

                            <select class="selectpicker" data-live-search="true" aria-label="Default select example"
                                name="Country_Market_holder" id="Market_holder" data-dependent="state">
                                <option value="" disabled selected>Select country</option>
                                @foreach($country as $country)
                                <option value="{{$country->Country_of_Manufacturer}}">
                                    {{$country->Country_of_Manufacturer}}
                                </option>
                                @endforeach
                            </select>


                        </div>

                        <div class="col-md-6">

                            <input type="text" class="form-control" name="search_name"
                                placeholder="Enter Certificate Number, Brand Name, Manufacturer and Therapeutic Category">

                        </div>

                        <div class="col-md-3">

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

                                    <div class="col-md-4 mt-2">

                                        <select class="selectpicker w-100 " data-size="8" data-live-search="true"
                                            aria-label="Default select example" name="Market_holder" id="Market_holder"
                                            data-dependent="state">
                                            <option value="" disabled selected>Select the market Authorization Holder
                                            </option>
                                            @foreach($markets as $market)
                                            <option value="{{ $market->Market_Authorisation_Holder }}">
                                                {{ $market->Market_Authorisation_Holder }}</option>
                                            @endforeach
                                        </select>

                                    </div>


                                    <div class="col-md-4 mt-2">

                                        <select class="selectpicker w-100" data-size="8" data-live-search="true"
                                            aria-label="Default select example" name="Market_holder" id="Market_holder"
                                            data-dependent="state">
                                            <option value="" disabled selected>Select Manufacturer
                                            </option>
                                            @foreach( $manufacturers as $manufacturer)
                                            <option value="{{ $market->Market_Authorisation_Holder }}">
                                                {{  $manufacturer->Manufacturer }}</option>
                                            @endforeach
                                        </select>

                                    </div>


                                    <div class="col-md-4 mt-2">

                                        <select class="selectpicker w-100" data-size="8" data-live-search="true"
                                            aria-label="Default select example" name="Market_holder" id="Market_holder"
                                            data-dependent="state">
                                            <option value="" disabled selected>Select brand name
                                            </option>
                                            @foreach( $brands as $brand)
                                            <option value="{{ $market->Market_Authorisation_Holder }}">
                                                {{  $brand->Brand_Name }}</option>
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
<div class="table-responsive mt-5 mb-5 mx-4">
    <table class="table table-hover table-light table-striped">
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
                <td>{{ $item->Expiry_Date }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{$lists}}
</div>

@endsection
