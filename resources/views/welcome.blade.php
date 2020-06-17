@extends('layouts.app')
<style type="text/css">
    body{
        background-image: url({{asset('images/background_image.png')}});
        background-size: cover;
    }
    .land {
        fill: rgba(103, 140, 252, 0.75);
        fill-opacity: 1;
        stroke: white;
        stroke-opacity: 1;
        stroke-width: 0.5;
    }

    .land:hover, .selected {
        fill: rgba(5, 189, 203, 0.65); /*#0a5777*/
        stroke-width: 1;
    }

    .map {
        height: 500px;
    }

    .card {
        margin: 2%;
        margin-left: 0;
        width: 30%;
        height: 120px;
        font-family: 'MuseoModerno', cursive;
        font-size: 1.2em;
    }

    #numbers, #graph {
        margin: auto;
        /*fff5f5*/
    }

    #confirmed .card-body {
        background-color: #fff5f5;
        color: #e53e73;
    }

    #confirmed .card-footer {
        background-color: #fed7d7;
        color: #e53e3e;
    }

    #recovred .card-body {
        background-color: #f0fff4;
        color: #38a169;
    }

    #recovred .card-footer {
        background-color: #c6f6d5;
        color: #38a169;
    }

    #deaths .card-body {
        background-color: #ecf1f6;
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
        top: 33%;
        width: 100%;
    }

    .chart__value p {
        margin: auto;;
        font-size: 1.2em;
    }
    #graph h4{
        cursor: pointer;
    }
    .card {
        text-align: center;
    }
</style>
@section('content')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css" rel="stylesheet">

    <div class="containerx-fluid">
        <div class="row">
            <div class="col-md-8 text-center " id="numbers">
                <h1>Morocco total cases :</h1>
                <p>Last update : <b>{{$total_cases->day}}</b></p>
                <div class="row">

                    <div class="card  " id="confirmed">
                        <div class="card-body">{{$total_cases->confirmed}}</div>
                        <div class="card-footer">Confirmed</div>
                    </div>
                    <div class="card" id="recovred">
                        <div class="card-body">{{$total_cases->recovered}}</div>
                        <div class="card-footer">Recovered</div>
                    </div>

                    <div class="card" id="deaths">
                        <div class="card-body">{{$total_cases->deaths}}</div>
                        <div class="card-footer">Deaths</div>
                    </div>
                    <div class="row m-auto w-50">
                        <section class="chart" id="chartContainer">
                            <figure class="chart__figure">
                                <canvas class="chart__canvas" id="chartCanvas" width="160" height="160"
                                        role="img"></canvas>
                            </figure>
                            <p>Recovery Rate</p>
                        </section>
                        <section class="chart" id="chartContainer1">
                            <figure class="chart__figure">
                                <canvas class="chart__canvas" id="chartCanvas1" width="160" height="160"
                                        role="img"></canvas>
                            </figure>
                            <p>Fatality Rate</p>
                        </section>
                    </div>

                </div>

            </div>
        </div>
        <div class="row w-75 m-auto p-3">
            <h4 class="m-auto">Last 7 days :</h4>
            <br><br>
            <canvas height="80" id="last7days"></canvas>
        </div>
        <div class="row  m-auto" style="width: 100%">
            <div class="col-md-4">
                <p class="text-center float-right">click on a region to get details</p>
                @svg('map','map')
            </div>

            <div class="col-md-8 " id="graph">
                <h4 class="text-center">Cases per region:</h4>
                <canvas id="regions" height="150"></canvas>
                <div id="region_details" style="display: none">
                    <h6 class="text-center" ><span id="region_name">----</span> region cases :</h6>
                    <div class="row w-75 m-auto">
                        <div class="card  " id="confirmed">
                            <div class="card-body" id="region_confirmed">----</div>
                            <div class="card-footer">Confirmed</div>
                        </div>
                        <div class="card" id="recovred">
                            <div class="card-body" id="region_recovered">----</div>
                            <div class="card-footer">Recovered</div>
                        </div>

                        <div class="card" id="deaths">
                            <div class="card-body" id="region_deaths">----</div>
                            <div class="card-footer">Deaths</div>
                        </div>
                    </div>
                    <div class="w-75 m-auto">
                    <canvas id="cities" height="150"></canvas>
                    </div>
                </div>

            </div>

        </div>
        <div class="alert alert-success " role="alert">
            <h4 class="alert-heading text-center">To prevent the spread of COVID-19:</h4>

            <hr>
            <ul class="w-25 m-auto">
                <li>CLEAN your hands often.</li>
                <li>KEEP a safe distance.</li>
                <li>WASH hands often.</li>
                <li>COVER your cough.</li>
                <li>SICK? Call 114.</li>
            </ul>


        </div>
        <div class="alert alert-danger text-center" role="alert">
            <b>and STAY at home or you be part of this numbers &#128521; </b>
        </div>
        <script src="{{asset('js/recoveryfatalityrate.js')}}"></script>
        <script type="application/javascript">

            /*
            * rate graphs
            */

            var total_confirmed = {{$total_cases->confirmed}};
            var total_recovered = {{$total_cases->recovered}};
            var total_deaths = {{$total_cases->deaths}};
            // calculating rates
            var recovered_rate = ((total_recovered*100)/total_confirmed).toFixed(2);
            var deaths_rate = ((total_deaths*100)/total_confirmed).toFixed(2);
            // calling function that return graphs
            recovery(recovered_rate);
            fatality(deaths_rate);


            /*
              -- last 7 days chart
           */
            new Chart($("#last7days"), {
                type: 'line',
                data: {
                    // las7 dates
                    labels: [
                                @foreach($last_7days_cases as $cases)
                                @php
                                    $dt = new DateTime($cases->day);
                                    echo "'".$dt->format('Y-m-d')."',";
                                @endphp
                                @endforeach
                    ],

                    datasets: [{
                        data: [

                            @foreach($last_7days_cases as $cases)
                            "{{$cases->deaths}}",
                            @endforeach

                        ],
                        label: "Deaths",
                        borderColor: "#a6a7a6",
                        fill: false
                    }, {
                        data: [

                            @foreach($last_7days_cases as $cases)
                                "{{$cases->confirmed}}",
                            @endforeach

                        ]
                        ,
                        label: "Confirmed",
                        borderColor: "#d71834",
                        fill: false
                    }, {
                        data: [

                            @foreach($last_7days_cases as $cases)
                                "{{$cases->recovered}}",
                            @endforeach

                        ],
                        label: "Recovered",
                        borderColor: "#4aea4d",
                        fill: false
                    }
                    ]
                }
            });


            /*
                -- cases per region
             */
            new Chart($("#regions"), {
                type: 'bar',
                data: {
                    labels: [
                        @foreach($cases_per_region as $region)
                            "{{$region->name}}",
                        @endforeach
                    ],
                    datasets: [
                        {
                            label: "Confirmed",
                            backgroundColor: "#db3a5f",
                            data: [
                                @foreach($cases_per_region as $region)
                                    {{$region->confirmed}},
                                @endforeach
                            ]
                        }, {
                            label: "recovred",
                            backgroundColor: "#8bde75",
                            data: [
                                @foreach($cases_per_region as $region)
                                {{$region->recovered}},
                                @endforeach
                            ]
                        }, {
                            label: "Deaths",
                            backgroundColor: "#a6aba5",
                            data: [
                                @foreach($cases_per_region as $region)
                                {{$region->deaths}},
                                @endforeach
                            ]
                        }
                    ]
                },
            });


            //tooltip for the map

            $(function () {
                $('[data-toggle="tooltip"]').tooltip()
            })
            //get land id on click
            var cities_name = [];
            var cities_confirmed = [];
            var cities_recovered = [];
            var cities_deaths = [];

            $(document).ready(function(){
                $(".land").click(function () {
                    var id_land = $(this).attr('id');
                    cities_name = [];
                    cities_confirmed = [];
                    cities_recovered = [];
                    cities_deaths = [];
                    $.get("/"+id_land, function(data, status){

                        // alert("Status: " + status);
                        // data.region_cases['confirmed'] working
                        // data.cases_per_city[0].confirmed



                        $('#region_name').text(data.region_cases['name']);
                        $('#region_confirmed').text(data.region_cases['confirmed']);
                        $('#region_recovered').text(data.region_cases['recovered']);
                        $('#region_deaths').text(data.region_cases['deaths']);

                        for (i=0;i<data.cases_per_city.length;i++){

                        cities_name.push(data.cases_per_city[i].name);
                        cities_confirmed.push(data.cases_per_city[i].confirmed);
                        cities_recovered.push(data.cases_per_city[i].recovered);
                        cities_deaths.push(data.cases_per_city[i].deaths);

                        }

                            /*
                             creating cities chart
                             */

                        new Chart($("#cities"), {
                            type: 'bar',
                            data: {
                                labels: cities_name,
                                datasets: [
                                    {
                                        label: "Confirmed",
                                        backgroundColor: "#db3a5f",
                                        data: cities_confirmed
                                    }, {
                                        label: "recovred",
                                        backgroundColor: "#8bde75",
                                        data: cities_recovered
                                    }, {
                                        label: "Death",
                                        backgroundColor: "#a6aba5",
                                        data: cities_deaths
                                    }
                                ]
                            }
                        });


                    });

                    $(".selected").removeClass("selected");
                    $(this).addClass("selected")
                    $("#regions").hide(900);//css('display','none');
                    $("#region_details").show(1200);//css('display','block');


                });


                $("#graph h4").click(function () {
                    $(".selected").removeClass("selected");
                    $("#region_details").hide(1200);//css('display','block');
                    $("#regions").show(900);//css('display','none');

                });
            });






        </script>
    </div>


@endsection
