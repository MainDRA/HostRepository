@extends('Demo.layout')

@section('content')

<div class="container mt-5">
    <div class="row ">
        <!-- Name line -->
        <div class="col-md-5 col-sm-12">

            <div class="card d-flex flex-row justify-content-center align-items-center mb-3 bg-light">
                    <!-- ICON -->
                    <span class="align-self-center mx-5 ">
                        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor"
                            class="bi bi-easel-fill" viewBox="0 0 16 16">
                            <path d="M8.473.337a.5.5 0 0 0-.946 0L6.954 2H2a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h1.85l-1.323 3.837a.5.5 0 1 0 .946.326L4.908 11H7.5v2.5a.5.5 0 0 0 1 0V11h2.592l1.435 4.163a.5.5 0 0 0 .946-.326L12.15 11H14a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1H9.046L8.473.337z" />
                        </svg>
                    </span>

                    <div class="card-body">
                        <h4>Registered drugs dashboard</h4>
                    </div>
                
            </div>

        </div>

        <div class="col-md-7 col-sm-12">
            <div class="card bg-light d-flex flex-colum mb-2">               
                <div class="row my-3 mx-2">
                    <div class="col-md-6 my-2">
                        <a href="{{URL('/dashboard')}}" class="btn btn-success w-100 btn-lg" role="button" >Registered Drugs</a>
                    </div>
                    
                    <div class="col-md-6 my-2">
                        <a href="#" class="btn btn-success w-100 btn-lg" role="button" > Health Supplement</a>
                    </div>
                
                </div>
            </div>
        </div>

        <!-- First line -->
        <div class="col-md-4 col-sm-6 d-flex justify-content-center px-3">

            <div class="card text-dark bg-light mb-3 w-100" style="max-width: 30rem;">
                <div class="card-header fs-5 text-center fw-bold">

                    Nearly expire

                </div>

                <div class="card-body text-center">
                    <h1 class="card-title"> {{$Expire_number}} </h1>
                </div>

                <div class="card-footer text-muted">
                    <a class="btn btn-primary w-100" href="{{URL('/dashboard/expire')}}" role="button">Read more</a>
                </div>
            </div>

        </div>
        <div class="col-md-4 col-sm-6 d-flex justify-content-center px-3">

            <div class="card text-dark bg-light mb-3 w-100" style="max-width: 30rem;">
                <div class="card-header fs-5 text-center fw-bold">

                    Total amount of drugs

                </div>
                <div class="card-body d-flex align-items-center justify-content-center">
                    <h1 class="card-title"> {{$total}} </h1>
                </div>
            </div>
        </div>

        <div class="col-md-4 col-sm-6 d-flex justify-content-center px-3">

            <div class="card text-dark bg-light mb-3 w-100" style="max-width: 30rem;">
                <div class="card-header fs-5 text-center fw-bold">

                    Users

                </div>

                <div class="card-body text-center">
                    <h1 class="card-title"></h1>
                </div>
            </div>
        </div>

        <!-- Second line  -->
        <div class="col-md-4 col-sm-6 d-flex justify-content-center mt-3 ">

            <div class="card text-dark bg-light mb-3 w-100 ">
                <div class="card-header fs-5 text-center fw-bold">

                    Amount of Manufacturer

                </div>

                <div class="card-body text-center ">

                    <h1 class="card-title">{{$Amount_of_Manufacturer}}</h1>

                </div>

                <div class="card-footer text-muted">
                    <a class="btn btn-primary w-100" href="{{URL('/dashboard/manufacturer')}}" role="button">
                        Read more
                    </a>
                </div>
            </div>

        </div>

        <div class="col-md-4 col-sm-6 d-flex justify-content-center mt-3 ">

            <div class="card text-dark bg-light mb-3 w-100 ">
                <div class="card-header fs-5 text-center fw-bold">

                    Essential drugs

                </div>

                <div class="card-body text-center ">

                    <h1 class="card-title">{{$essential}}</h1>

                </div>

                <div class="card-footer text-muted">
                    <a class="btn btn-primary w-100" href="{{URL('/dashboard/essential')}}" role="button">
                        Read more
                    </a>
                </div>

            </div>

        </div>

        <div class="col-md-4 col-sm-6 d-flex justify-content-center mt-3 ">

            <div class="card text-dark bg-light mb-3 w-100 ">
                <div class="card-header fs-5 text-center fw-bold">

                    Non-essential drugs

                </div>

                <div class="card-body text-center ">

                    <h1 class="card-title">{{$non_essential}}</h1>

                </div>

                <div class="card-footer text-muted">
                    <a class="btn btn-primary w-100" href="{{URL('/dashboard/non_essential')}}" role="button">
                        Read more
                    </a>
                </div>
            </div>

        </div>


        <!-- Third line -->

        <div class="col-md-6 d-flex justify-content-center mt-3 px-1">

            <div class="card text-dark bg-light mb-3 w-100">
                <div class="card-header fs-5 text-center fw-bold">

                    Manufacturer country

                </div>

                <div class="card-body text-center mx-2">

                    <canvas id="myPie" width="500" height="500"></canvas>

                </div>
            </div>



        </div>

        <div class="col-md-6 d-flex justify-content-center mt-3 ">

            <div class="card text-dark bg-light mb-3 w-100 ">
                <div class="card-header fs-5 text-center fw-bold">

                    Drug intention

                </div>

                <div class="card-body text-center mx-2">

                    <canvas id="myDoughnut" width="500" height="400"></canvas>

                </div>
            </div>


        </div>

    </div>
</div>

<script type="text/javascript">
    // Pie chart      

    var xValues = <?php echo(json_encode($ListCountry)) ?> ;
    var yValues = <?php echo(json_encode($Number)) ?> ;
    var barColors = [
        "#b91d47", "#00aba9", "#2b5797", "#e8c3b9", "#1e7145",
        '#FF6633', '#FFB399', '#FF33FF', '#FFFF99', '#00B3E6',
        '#E6B333', '#3366E6', '#999966', '#99FF99', '#B34D4D',
        '#80B300', '#809900'
    ];

    new Chart("myPie", {
        type: "pie",
        data: {
            labels: xValues,
            datasets: [{
                backgroundColor: barColors,
                data: yValues
            }]
        },
        options: {
            title: {
                display: true,
                text: ""
            }
        }
    });

    // Doughnut chart

    var xValues = <?php echo(json_encode($ListIntention)) ?> ;
    var yValues = <?php echo(json_encode($Amount_of_intent)) ?> ;
    var barColors = [
        "#b91d47", "#00aba9", "#2b5797", "#e8c3b9"
    ];

    new Chart("myDoughnut", {
        type: "doughnut",
        data: {
            labels: xValues,
            datasets: [{
                backgroundColor: barColors,
                data: yValues
            }]
        },
        options: {
            title: {
                display: true,
                text: ""
            }
        }
    });

</script>

@endsection
