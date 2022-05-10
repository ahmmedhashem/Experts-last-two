
@extends('layouts.admin')
@section('content')
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body home-page">

            <!-- Candlestick Multi Level Control Chart -->
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="card">
                        <div class="card-header"> Top Ten Nationalities</div>
                        <div class="card-body nationalities">
                            @if(isset($contries) && $contries -> count() > 0)
                                @foreach ($contries as $country)
                                    <input type="hidden" name="nationality" value="{{ $country -> name }}" users="{{ $country -> users -> count() }}">
                                @endforeach
                            @endif
                            <div id="regions_div" style="width: 100%; height: 500px;"></div>
                        </div>
                    </div>

                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="card">
                        <div class="card-header"> area of expertise</div>
                        <div class="card-body areas">
                            @if(isset($areas) && $areas -> count() > 0)
                                @foreach ($areas as $area)
                                    <input type="hidden" name="area" value="{{ $area -> name }}" users="{{ $area -> users -> count() }}">
                                @endforeach
                            @endif
                            <div id="donutchart" style="width: 100%; height: 500px;"></div>
                        </div>
                    </div>

                </div>
            </div>

            <!-- Sell Orders & Buy Order -->
            <div class="row match-height" style="margin-top: 20px">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">{{ $subCategories -> name }}</div>
                        <div class="card-body subcats">
                            @if(isset($subCategories -> _childrens) && $subCategories -> _childrens -> count() > 0)
                                @foreach ($subCategories -> _childrens as $category)
                                    <input type="hidden" name="category" value="{{ $category -> name }}" users="{{ $category -> userss -> count() }}">
                                @endforeach
                            @endif
                            <div id="chart-s" style="width: 100%; height: 500px;"></div>
                        </div>
                    </div>

                </div>

                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">Relevant work experience</div>
                        <div class="card-body">
                            <input id="nationalCount" type="hidden" name="national" value="{{ $national -> count() }}" >
                            <input id="regionalCount" type="hidden" name="regional" value="{{ $regional -> count() }}" >
                            <input id="internationalCount" type="hidden" name="international" value="{{ $international -> count() }}">
                            <div id="chart-x" style="width: 100%; height: 500px;"></div>
                        </div>

                    </div>

                </div>
            </div>
            <div class="row match-height" style="margin-top: 20px">
                <div class="col-12 col-xl-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Gabs</h4>
                            <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                        </div>
                        <div class="card-content">
                            <div class="table-responsive">
                                <table class="table table-de mb-0">
                                    <thead>
                                        <tr>
                                            <th> Name</th>
                                            <th> Experts</th>
                                            <th>Options</th>


                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if($subCategories -> _childrens)
                                            @foreach ($subCategories -> _childrens as $subcat)
                                                @if($subcat -> userss -> count() <= 3)
                                                <tr class="">
                                                    <td>{{ $subcat -> name }}</td>
                                                    <td>this category only have {{ $subcat -> userss -> count() }} experts</td>
                                                    <td><i class="la la-long-arrow-down" style="color: #F00"></i></td>
                                                </tr>

                                                @endif
                                            @endforeach

                                        @endif

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>





        </div>
    </div>
</div>
@endsection

@section('script')
    <script type="text/javascript">
        var countries = [];
        var users = [];
        for(var i = 1; i <= {{ $contries -> count() }}; i++){
            countries.push($('.nationalities input:nth-child(' + i + ')').val());
            users.push($('.nationalities input:nth-child(' + i + ')').attr('users'))
        }

        google.charts.load('current', {
        'packages':['geochart'],
        });
        google.charts.setOnLoadCallback(drawRegionsMap);

        function drawRegionsMap() {
        var data = google.visualization.arrayToDataTable([

            ['Country', 'Popularity'],

            [countries[0], users[0]],
            [countries[1], users[1]],
            [countries[2], users[2]],
            [countries[3], users[3]]

        ]);

        var options = {};

        var chart = new google.visualization.GeoChart(document.getElementById('regions_div'));

        chart.draw(data, options);
        }
    </script>



    <script type="text/javascript">
        var areas = [];
        var users = [];

        for(var i = 1; i <= {{ $areas -> count() }}; i++){
            areas.push($('.areas input:nth-child(' + i + ')').val());
            users.push(parseInt($('.areas input:nth-child(' + i + ')').attr('users')))
        }

        // var info = [];
        var a = users[0];
        var b = users[1];
        var c = users[2];
        var d = users[3];
        var e = users[4];
        var f = users[5];
        var g = users[6];
        var h = users[7];
        var z = users[8];
        var j = users[9];
        var k = users[10];
        var l = users[11];
        var m = users[12];
        var n = users[13];
        var o = users[14];
        var p = users[15];
        var q = users[16];
        var r = users[17];
        var s = users[18];
        var t = users[19];
        var u = users[20];


        google.charts.load("current", {packages:["corechart"]});
        google.charts.setOnLoadCallback(drawChart);
        function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Task', 'Hours per Day'],

            [areas[0], a],
            [areas[1], b],
            [areas[2], c],
            [areas[3], d],
            [areas[4], e],
            [areas[5], f],
            [areas[6], g],
            [areas[7], h],
            [areas[8], z],
            [areas[9], j],
            [areas[10], k],
            [areas[11], l],
            [areas[12], m],
            [areas[13], n],
            [areas[14], o],

            [areas[15], p],
            [areas[16], q],
            [areas[17], r],
            [areas[18], s],
            [areas[19], t],
            [areas[20], u]

        ]);

        console.log(data);

        var options = {

            pieHole: 0.4,
            colors: ['#000', '#e6693e', '#ec8f6e', '#f3b49f', '#f6c7b6'],
            legend: {position: 'top', textStyle: {color: '#000', fontSize: 15}}
        };

        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
        chart.draw(data, options);
        }

    </script>



    <script>

        var categories = [];
        var users = [];
        for(var i = 1; i <= {{ $subCategories -> _childrens -> count() }}; i++){
            categories.push($('.subcats input:nth-child(' + i + ')').val());
            users.push($('.subcats input:nth-child(' + i + ')').attr('users'))
        }
        var options = {
          series: users,
          chart: {
          height: 390,
          type: 'radialBar',
        },
        plotOptions: {
          radialBar: {
            offsetY: 0,
            startAngle: 0,
            endAngle: 270,
            hollow: {
              margin: 5,
              size: '30%',
              background: 'transparent',
              image: undefined,
            },
            dataLabels: {
              name: {
                show: false,
              },
              value: {
                show: false,
              }
            }
          }
        },
        colors: ['#1ab7ea', '#0084ff', '#39539E'],
        labels: categories,
        legend: {
          show: true,
          floating: true,
          fontSize: '16px',
          position: 'left',
          offsetX: 160,
          offsetY: 15,
          labels: {
            useSeriesColors: true,
          },
          markers: {
            size: 0
          },
          formatter: function(seriesName, opts) {
            return seriesName + ":  " + opts.w.globals.series[opts.seriesIndex]
          },
          itemMargin: {
            vertical: 3
          }
        },
        responsive: [{
          breakpoint: 480,
          options: {
            legend: {
                show: false
            }
          }
        }]
        };
// console.log(categories);
        var chart = new ApexCharts(document.querySelector("#chart-s"), options);
        chart.render();


    </script>


    <script>
        var options = {
        series: [$('#nationalCount').val(), $('#regionalCount').val(), $('#internationalCount').val()],
        chart: {
        height: 390,
        type: 'radialBar',
        },
        plotOptions: {
        radialBar: {
            offsetY: 0,
            startAngle: 0,
            endAngle: 270,
            hollow: {
            margin: 5,
            size: '30%',
            background: 'transparent',
            image: undefined,
            },
            dataLabels: {
            name: {
                show: false,
            },
            value: {
                show: false,
            }
            }
        }
        },
        colors: ['#1ab7ea', '#0084ff', '#39539E'],
        labels: ['National', 'Regional', 'International'],
        legend: {
        show: true,
        floating: true,
        fontSize: '16px',
        position: 'left',
        offsetX: 160,
        offsetY: 15,
        labels: {
            useSeriesColors: true,
        },
        markers: {
            size: 0
        },
        formatter: function(seriesName, opts) {
            return seriesName + ":  " + opts.w.globals.series[opts.seriesIndex]
        },
        itemMargin: {
            vertical: 3
        }
        },
        responsive: [{
        breakpoint: 480,
        options: {
            legend: {
                show: false
            }
        }
        }]
        };

        var chart = new ApexCharts(document.querySelector("#chart-x"), options);
        chart.render();


    </script>
@endsection


