@if (isset($trainee))
@extends('layouts/app')

@section('breadcrumb')

<div class="col-lg-12">
    <!-- breadcrumb-->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">
                    {{ $trainee->firstName }}
                </a>
            </li>
            <li aria-current="page" class="breadcrumb-item active">
                {{__('Dashboard')}}
            </li>
        </ol>
    </nav>
</div>
@endsection
@section('left-sidebar')

@include('layouts.dashboardSidebar')
@endsection
@section('content')
<div class="col-lg-9">
    <div class="row">
        <div class="col-lg">
            @include('layouts.error-success-msg')
        </div>
    </div>
    <div class="row">
        <div class="col-lg mb-5" >
        
            <div id="chartContainer" style="height: 300px; width: 100%;"></div>
            <div id="chartContainer1" style="height: 300px; width: 100%;"></div>
            <div id="chartContainer2" style="height: 300px; width: 100%;"></div>



        </div>
         </div>

    </div>
    
</div>
@endsection


@section('scripts')


<script type="text/javascript">
    window.onload = function () {
        var chart = new CanvasJS.Chart("chartContainer",
        {
            title:{
                text: "Product Status Details"
            },
            legend: {
                maxWidth: 80,
                itemWidth: 50
            },
            data: [
            {
                type: "pie",
                showInLegend: true,
                legendText: "{indexLabel}",
                dataPoints: [
                    { x: 1, y: Math.floor(Math.random()*100), label: "Product Sold" },
                    { x: 2, y: Math.floor(Math.random()*100), label: "Exchanged" },
                    { x: 3, y: Math.floor(Math.random()*100), label: "Returned" }
                ]
            }
            ]
        });
        chart.render();

        var chart1 = new CanvasJS.Chart("chartContainer1",
        {
            title:{
                text: "Monthly Details of Product Sold"
            },
            legend: {
                maxWidth: 800,
                itemWidth: 120
            },
            data: [
            {
                type: "pie",
                showInLegend: true,
                legendText: "{indexLabel}",
                dataPoints: [
                    { y: Math.floor(Math.random()*100), indexLabel: "January" },
                    { y: Math.floor(Math.random()*100), indexLabel: "February" },
                    { y: Math.floor(Math.random()*100), indexLabel: "March" },
                    { y: Math.floor(Math.random()*100), indexLabel: "April"},
                    { y: Math.floor(Math.random()*100), indexLabel: "May" },
                    { y: Math.floor(Math.random()*100), indexLabel: "June"},
                    { y: Math.floor(Math.random()*100), indexLabel: "July"},
                    { y: Math.floor(Math.random()*100), indexLabel: "August"},
                    { y: Math.floor(Math.random()*100), indexLabel: "September"},
                    { y: Math.floor(Math.random()*100), indexLabel: "October"},
                    { y: Math.floor(Math.random()*100), indexLabel: "November"},
                    { y: Math.floor(Math.random()*100), indexLabel: "December"}
                ]
            }
            ]
        });
        chart1.render();
    }
</script>
<script type="text/javascript" src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>



    

@endsection

@else 
@extends('layouts/app')

@section('breadcrumb')

<div class="col-lg-12">
    <!-- breadcrumb-->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">
                    {{ Auth::user()->role->name}}
                </a>
            </li>
            <li aria-current="page" class="breadcrumb-item active">
                {{__('Dashboard')}}
            </li>
        </ol>
    </nav>
</div>
@endsection
@section('left-sidebar')

@include('layouts.dashboardSidebar')
@endsection
@section('content')
<div class="col-lg-9">
    <div class="row">
        <div class="col-lg">
            @include('layouts.error-success-msg')
        </div>
    </div>
    <div class="row">
        <div class="col-lg mb-5" >
        
            <div id="chartContainer" style="height: 300px; width: 100%;"></div>
            <div id="chartContainer1" style="height: 300px; width: 100%;"></div>
            <div id="chartContainer2" style="height: 300px; width: 100%;"></div>



        </div>
         </div>

    </div>
    
</div>
@endsection


@section('scripts')

@if(Auth::user()->role_id == '1')
        
<script type="text/javascript">
    window.onload = function () {
        var chart = new CanvasJS.Chart("chartContainer",
        {
            title:{
                text: "Total Sellers"
            },
            legend: {
                maxWidth: 80,
                itemWidth: 50
            },
            data: [
            {
                type: "column",
                showInLegend: true,
                legendText: "{indexLabel}",
                dataPoints: [
                    { x: 1, y: Math.floor(Math.random()*100), label: "Andhra Pradesh" },
                    { x: 2, y: Math.floor(Math.random()*100), label: "Arunachal Pradesh" },
                    { x: 3, y: Math.floor(Math.random()*100), label: "Assam" },
                    { x: 4, y: Math.floor(Math.random()*100), label: "Bihar"},
                    { x: 5, y: Math.floor(Math.random()*100), label: "Chhattisgarh" },
                    { x: 6, y: Math.floor(Math.random()*100), label: "Goa"},
                    { x: 7, y: Math.floor(Math.random()*100), label: "Gujarat"},
                    { x: 8, y: Math.floor(Math.random()*100), label: "Haryana" },
                    /*{ x: 9, y: Math.floor(Math.random()*100), label: "Himanchal Pradesh" },
                    { x: 10, y: Math.floor(Math.random()*100), label: "Jammu and Kashmir" },
                    { x: 11, y: Math.floor(Math.random()*100), label: "Jharkhand"},
                    { x: 12, y: Math.floor(Math.random()*100), label: "Karnataka" },*/
                    { x: 9, y: Math.floor(Math.random()*100), label: "Kerala"},
                    /*{ x: 14, y: Math.floor(Math.random()*100), label: "Madhya Pradesh"},
                    { x: 15, y: Math.floor(Math.random()*100), label: "Maharashtra" },
                    { x: 16, y: Math.floor(Math.random()*100), label: "Manipur" },
                    { x: 17, y: Math.floor(Math.random()*100), label: "Meghalaya" },
                    { x: 18, y: Math.floor(Math.random()*100), label: "Mizoram"},
                    { x: 19, y: Math.floor(Math.random()*100), label: "Nagaland" },
                    { x: 20, y: Math.floor(Math.random()*100), label: "Odisha"},
                    { x: 21, y: Math.floor(Math.random()*100), label: "Punjab"},*/
                    { x: 10, y: Math.floor(Math.random()*100), label: "Rajasthan" },
                    /*{ x: 23, y: Math.floor(Math.random()*100), label: "Sikkim" },
                    { x: 24, y: Math.floor(Math.random()*100), label: "Tamil Nadu" },
                    { x: 25, y: Math.floor(Math.random()*100), label: "Telangana"},
                    { x: 26, y: Math.floor(Math.random()*100), label: "Tripura" },*/
                    { x: 11, y: Math.floor(Math.random()*100), label: "Uttar Pradesh"}
                    /*{ x: 28, y: Math.floor(Math.random()*100), label: "Uttarakhand"},
                    { x: 29, y: Math.floor(Math.random()*100), label: "West bengal" },
                    */
                ]
            }
            ]
        });
        chart.render();

        var chart1 = new CanvasJS.Chart("chartContainer1",
        {
            title:{
                text: "Monthly Details of Product Sold"
            },
            legend: {
                maxWidth: 800,
                itemWidth: 120
            },
            data: [
            {
                type: "pie",
                showInLegend: true,
                legendText: "{indexLabel}",
                dataPoints: [
                    { x:1, y: Math.floor(Math.random()*100), indexLabel: "January" },
                    { x:2, y: Math.floor(Math.random()*100), indexLabel: "February" },
                    { x:3, y: Math.floor(Math.random()*100), indexLabel: "March" },
                    { x:4, y: Math.floor(Math.random()*100), indexLabel: "April"},
                    { x:5, y: Math.floor(Math.random()*100), indexLabel: "May" },
                    { x:6, y: Math.floor(Math.random()*100), indexLabel: "June"},
                    { x:7, y: Math.floor(Math.random()*100), indexLabel: "July"},
                    { x:8, y: Math.floor(Math.random()*100), indexLabel: "August"},
                    { x:9, y: Math.floor(Math.random()*100), indexLabel: "September"},
                    { x:10, y: Math.floor(Math.random()*100), indexLabel: "October"},
                    { x:11, y: Math.floor(Math.random()*100), indexLabel: "November"},
                    { x:12, y: Math.floor(Math.random()*100), indexLabel: "December"}
                ]
            }
            ]
        });
        chart1.render();



        var chart2 = new CanvasJS.Chart("chartContainer2",
        {
            title:{
                text: "Seller Product Details (%)"
            },
            legend: {
                maxWidth: 80,
                itemWidth: 50
            },
            data: [
            {
                type: "column",
                showInLegend: true,
                legendText: "{indexLabel}",
                dataPoints: [
                    { x:1 , y: Math.floor(Math.random()*100), label: "Seller 1" },
                    { x:2 , y: Math.floor(Math.random()*100), label: "Seller 2" },
                    { x:3 , y: Math.floor(Math.random()*100), label: "Seller 3" },
                    { x:4 , y: Math.floor(Math.random()*100), label: "Seller 4" },
                    { x:5 , y: Math.floor(Math.random()*100), label: "Seller 5" },
                    { x:6 , y: Math.floor(Math.random()*100), label: "Seller 6" },
                    { x:7 , y: Math.floor(Math.random()*100), label: "Seller 7" },
                    { x:8 , y: Math.floor(Math.random()*100), label: "Seller 8" },
                    { x:9 , y: Math.floor(Math.random()*100), label: "Seller 9" },
                    { x:10 , y: Math.floor(Math.random()*100), label: "Seller 10"},
                    { x:11 , y: Math.floor(Math.random()*100), label: "Seller 11"},
                   // { x:12 , y: Math.floor(Math.random()*100), label: "Seller 12"}
                ]
            }
            ]
        });
        chart2.render();
    }
</script>
<script type="text/javascript" src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

@elseif(Auth::user()->role_id == '2')

<script type="text/javascript">
    window.onload = function () {
        var chart = new CanvasJS.Chart("chartContainer",
        {
            title:{
                text: "Product Status Details"
            },
            legend: {
                maxWidth: 80,
                itemWidth: 50
            },
            data: [
            {
                type: "pie",
                showInLegend: true,
                legendText: "{indexLabel}",
                dataPoints: [
                    { x: 1, y: Math.floor(Math.random()*100), label: "Product Sold" },
                    { x: 2, y: Math.floor(Math.random()*100), label: "Exchanged" },
                    { x: 3, y: Math.floor(Math.random()*100), label: "Returned" }
                ]
            }
            ]
        });
        chart.render();

        var chart1 = new CanvasJS.Chart("chartContainer1",
        {
            title:{
                text: "Monthly Details of Product Sold"
            },
            legend: {
                maxWidth: 800,
                itemWidth: 120
            },
            data: [
            {
                type: "pie",
                showInLegend: true,
                legendText: "{indexLabel}",
                dataPoints: [
                    { y: Math.floor(Math.random()*100), indexLabel: "January" },
                    { y: Math.floor(Math.random()*100), indexLabel: "February" },
                    { y: Math.floor(Math.random()*100), indexLabel: "March" },
                    { y: Math.floor(Math.random()*100), indexLabel: "April"},
                    { y: Math.floor(Math.random()*100), indexLabel: "May" },
                    { y: Math.floor(Math.random()*100), indexLabel: "June"},
                    { y: Math.floor(Math.random()*100), indexLabel: "July"},
                    { y: Math.floor(Math.random()*100), indexLabel: "August"},
                    { y: Math.floor(Math.random()*100), indexLabel: "September"},
                    { y: Math.floor(Math.random()*100), indexLabel: "October"},
                    { y: Math.floor(Math.random()*100), indexLabel: "November"},
                    { y: Math.floor(Math.random()*100), indexLabel: "December"}
                ]
            }
            ]
        });
        chart1.render();
    }
</script>
<script type="text/javascript" src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>



@endif


@endsection



@endif