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
</style>
@section('content')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css" rel="stylesheet">

    <div class="containerx-fluid">
        <div class="row">
            <div class="col-md-8 text-center " id="numbers">
                <h1>Morocco total cases :</h1>

                <div class="row">

                    <div class="card  " id="confirmed">
                        <div class="card-body">1526666</div>
                        <div class="card-footer">Confirmed</div>
                    </div>
                    <div class="card" id="recovred">
                        <div class="card-body">152626</div>
                        <div class="card-footer">Recovered</div>
                    </div>

                    <div class="card" id="deaths">
                        <div class="card-body">300</div>
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
            <h4 class="m-auto">Last 7 days numbers</h4>
            <br><br>
            <canvas height="80" id="last7days"></canvas>
        </div>
        <div class="row m-auto" style="width: 80%">
            <div class="col-md-6">
                <h5 class="text-center">click on a region to get details</h5>
                @svg('map','map')
            </div>

            <div class="col-md-6 " id="graph">
                <h4 class="text-center">Cases per region:</h4>
                <canvas id="regions" height="200"></canvas>
                <div id="region_details" style="display: none">
                    <h3><span id="region_name">XXXXX</span> cases :</h3>
                    <div class="row">
                        <div class="card  " id="confirmed">
                            <div class="card-body">1526666</div>
                            <div class="card-footer">Confirmed</div>
                        </div>
                        <div class="card" id="recovred">
                            <div class="card-body">152626</div>
                            <div class="card-footer">Recovered</div>
                        </div>

                        <div class="card" id="deaths">
                            <div class="card-body">300</div>
                            <div class="card-footer">Deaths</div>
                        </div>
                    </div>
                    <canvas id="cities"></canvas>
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


            //tooltip for the map
            $(function () {
                $('[data-toggle="tooltip"]').tooltip()
            })
            //get land id on click
            $(document).ready(function(){
                $(".land").click(function () {
                    var id_land = $(this).attr('id');
                    $(".selected").removeClass("selected");
                    $(this).addClass("selected")
                    // fetch data then
                    $("#regions").hide(900);//css('display','none');
                    $("#region_details").show(1200);//css('display','block');


                });
            });

            recovery(50);
            fatality();

            /*
                -- last 7 days chart
             */
            new Chart($("#last7days"), {
                type: 'line',
                data: {
                    // las7 dates
                    labels: ['08-06', '09-06', '10-06', '11-06', '12-06', '13-06', '14-06'],

                    datasets: [{
                        data: [7, 2, 5, 0, 0, 1, 2],
                        label: "Deaths",
                        borderColor: "#a6a7a6",
                        fill: false
                    }, {
                        data: [150, 102, 42, 79, 80, 50, 24],
                        label: "Confirmed",
                        borderColor: "#d71834",
                        fill: false
                    }, {
                        data: [400, 299, 276, 100, 150, 50, 99],
                        label: "Recovred",
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
                    labels: ["region 1", "Region2", "Region3", "Region4", "region 1", "Region2", "Region3", "Region4", "region 1", "Region2", "Region3", "Region4",],
                    datasets: [
                        {
                            label: "Confirmed",
                            backgroundColor: "#db3a5f",
                            data: [133, 221, 783, 1300, 133, 221, 783, 1300, 133, 221, 783, 900,]
                        }, {
                            label: "recovred",
                            backgroundColor: "#8bde75",
                            data: [408, 547, 675, 734, 408, 547, 675, 734, 408, 547, 675, 734,]
                        }, {
                            label: "Death",
                            backgroundColor: "#a6aba5",
                            data: [408, 547, 675, 734, 408, 547, 675, 734, 408, 547, 675, 734,]
                        }
                    ]
                },
            });

            /*
                   -- cases per city
             */

            new Chart($("#cities"), {
                type: 'bar',
                data: {
                    labels: ["city 1", "city 2", "city 3", "city 4",],
                    datasets: [
                        {
                            label: "Confirmed",
                            backgroundColor: "#db3a5f",
                            data: [133, 221, 783, 1300,]
                        }, {
                            label: "recovred",
                            backgroundColor: "#8bde75",
                            data: [408, 547, 675, 734,]
                        }, {
                            label: "Death",
                            backgroundColor: "#a6aba5",
                            data: [408, 547, 675, 734,]
                        }
                    ]
                }
            });


        </script>
    </div>


@endsection
