@extends('Demo.layout')

@section('content')

<div class="container mt-5">
    <div class="row ">

        <!-- First line -->
        <div class="col-md-4 d-flex justify-content-center px-3">

            <div class="card text-dark bg-light mb-3 w-100" style="max-width: 30rem;">
                <div class="card-header fs-5 text-center">
                    
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
        <div class="col-md-4 d-flex justify-content-center px-3">

            <div class="card text-dark bg-light mb-3 w-100" style="max-width: 30rem;">
                <div class="card-header fs-5 text-center">

                    Total amount of drugs

                </div>
                <div class="card-body d-flex align-items-center justify-content-center">
                    <h1 class="card-title"> {{$total}} </h1>
                </div>
            </div>
        </div>

        <div class="col-md-4 d-flex justify-content-center px-3">

            <div class="card text-dark bg-light mb-3 w-100" style="max-width: 30rem;">
                <div class="card-header fs-5 text-center">

                    Users

                </div>

                <div class="card-body text-center">
                    <h1 class="card-title"></h1>
                </div>
            </div>
        </div>

        <!-- Second line  -->
        <div class="col-md-3 d-flex justify-content-center mt-3 ">

            <div class="card text-dark bg-light mb-3 w-100 ">
                <div class="card-header fs-5 text-center">

                    Amount of Manufacturer

                </div>

                <div class="card-body text-center ">

                    <h1 class="card-title">{{$Amount_of_Manufacturer}}</h1>

                </div>

                <div class="card-footer text-muted">
                    <a class="btn btn-primary w-100" href="{{URL('/dashboard/manufacturer')}}" role="button">Read more</a>
                </div>
            </div>
            
        </div>

        <div class="col-md-3 d-flex justify-content-center mt-3 ">

            <div class="card text-dark bg-light mb-3 w-100 ">
                <div class="card-header fs-5 text-center">

                    Therapeutic Category

                </div>

                <div class="card-body text-center ">

                    <h1 class="card-title">{{$Amount_of_Therapeutic}}</h1>

                </div>

                <div class="card-footer text-muted">
                    <a class="btn btn-primary w-100" href="{{URL('/dashboard/therapeutic')}}" role="button">Read more</a>
                </div>
                
            </div>
            
        </div>

        <div class="col-md-3 d-flex justify-content-center mt-3 ">

            <div class="card text-dark bg-light mb-3 w-100 ">
                <div class="card-header fs-5 text-center">

                    Types of Packages

                </div>

                <div class="card-body text-center ">

                    <h1 class="card-title">{{$Types_of_Packages}}</h1>

                </div>

                <div class="card-footer text-muted">
                    <a class="btn btn-primary w-100" href="{{URL('/dashboard/packagetype')}}" role="button">Read more</a>
                </div>
            </div>
            
        </div>

        <div class="col-md-3 d-flex justify-content-center mt-3 ">

            <div class="card text-dark bg-light mb-3 w-100 ">
                <div class="card-header fs-5 text-center">

                    Category of Products

                </div>

                <div class="card-body text-center ">

                    <h1 class="card-title">{{$Category_of_Medical_Product}}</h1>

                </div>

                <div class="card-footer text-muted">
                    <a class="btn btn-primary w-100" href="{{URL('/dashboard/productcat')}}" role="button">Read more</a>
                </div>
            </div>
            
        </div>

        <!-- Third line -->

        <div class="col-md-6 d-flex justify-content-center mt-3 px-1">

            <div class="card text-dark bg-light mb-3 ">
                <div class="card-header fs-5 text-center">

                    Manufacturer country

                </div>

                <div class="card-body text-center mx-2" >
   
                    <canvas id="myPie" width="500" height="500"></canvas>
                    
                </div>
            </div>

            
            
        </div>

        <div class="col-md-6 d-flex justify-content-center mt-3 px-1">

            <div class="card text-dark bg-light mb-3 ">
                <div class="card-header fs-5 text-center">

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
          
        var xValues = <?php echo(json_encode($ListCountry))?> ; 
        var yValues = <?php echo(json_encode($Number))?>;
        var barColors = [
        "#b91d47","#00aba9","#2b5797","#e8c3b9","#1e7145",
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

        var xValues = <?php echo(json_encode($ListIntention))?> ; 
        var yValues = <?php echo(json_encode($Amount_of_intent))?>;
        var barColors = [
        "#b91d47","#00aba9","#2b5797","#e8c3b9"
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





