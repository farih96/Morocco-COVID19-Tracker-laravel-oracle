@extends('layouts.app')
<style type="text/css">

    .land
    {
        fill: rgba(103, 140, 252, 0.75);
        fill-opacity: 1;
        stroke:white;
        stroke-opacity: 1;
        stroke-width:0.5;
    }
    .land:hover {
        fill: rgba(5, 189, 203, 0.65); /*#0a5777*/
        stroke-width:1;
    }
    .map{
        height: 500px;
    }
    .card{
        margin: 2%;
        margin-left: 0;
        width: 30%;
        height: 120px;
        font-family: 'MuseoModerno', cursive;
        font-size: 1.2em;
    }
    #numbers,#graph{
        margin: auto;
        /*fff5f5*/
    }
    #confirmed .card-body {
        background-color:#fff5f5 ;
        color:#e53e73 ;
    }
    #confirmed .card-footer {
        background-color: #fed7d7;
        color: #e53e3e;
    }
    #recovred .card-body {
        background-color:#f0fff4 ;
        color:#38a169 ;
    }
    #recovred .card-footer {
        background-color: #c6f6d5;
        color: #38a169;
    }
    #deaths .card-body {
        background-color:#ecf1f6 ;
        color: #718096;
    }
    #deaths .card-footer {
        background-color: rgba(113, 128, 150, 0.4);
        color: #718096;
    }




    .chart {
        position: relative;
        margin: 3%;
        font-family: 'MuseoModerno', cursive;
    }



    .chart__value {
        display: grid;
        position: absolute;
        top:33%;
        width: 100%;
    }

    .chart__value p {
        margin: auto;;
        font-size: 1.2em;
    }
</style>
@section('content')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css" rel="stylesheet">

    <div class="containerx-fluid">
        <div class="row">
            <div class="col-md-8 text-center " id="numbers" >
                <h1><span id="region_name">Morocco </span> total cases :</h1>



                <div class="row">

                    <div class="card  " id="confirmed">
                        <div class="card-body">1526666</div>
                        <div class="card-footer" >Confirmed</div>
                    </div>
                    <div class="card" id="recovred">
                        <div class="card-body">152626</div>
                        <div class="card-footer" >Recovered</div>
                    </div>

                    <div class="card" id="deaths">
                        <div class="card-body">300</div>
                        <div class="card-footer" >Deaths</div>
                    </div>
                    <div class="row m-auto w-50">
                    <section class="chart" id="chartContainer">
                        <figure class="chart__figure">
                            <canvas class="chart__canvas" id="chartCanvas" width="160" height="160" role="img"></canvas>
                        </figure>
                        <p>Recovery Rate</p>
                    </section>
                    <section class="chart" id="chartContainer1">
                        <figure class="chart__figure">
                            <canvas class="chart__canvas" id="chartCanvas1" width="160" height="160" role="img"></canvas>
                        </figure>
                        <p>Fatality Rate</p>
                    </section>
                    </div>

                </div>

            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                @svg('map','map')
            </div>
            <div class="col-md-4" id="graph">
                <canvas id="myChart" width="400" height="400"></canvas>
            </div>
        </div>
        <script src="{{asset('js/recoveryfatalityrate.js')}}"></script>
        <script type="application/javascript">
            //tooltip for the map
            $(function () {
                $('[data-toggle="tooltip"]').tooltip()
            })
            //get land id on click
            $(".land").click(function(){
                var id_land = $(this).attr('id');
                alert(id_land);

            });


            var ctx = document.getElementById('myChart');
            var myChart = new Chart(ctx, {
                type: 'polarArea',
                data: {
                    labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange','Red1', 'Blue1', 'Yellow1', 'Green1', 'Purple1', 'Orange1'],
                    datasets: [{
                        label: '# of Votes',
                        data: [120, 109, 113, 95, 82, 73,119, 129, 123, 105, 112, 103],
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)',
                            'rgba(255,99,132,0.57)',
                            'rgba(54,162,235,0.55)',
                            'rgba(255,206,86,0.56)',
                            'rgba(75,192,192,0.57)',
                            'rgba(153,102,255,0.72)',
                            'rgba(255,159,64,0.68)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)',
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }]
                },

            });



            recovery(50);
            fatality();

        </script>
    </div>


@endsection
