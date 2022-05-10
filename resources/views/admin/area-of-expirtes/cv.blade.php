@extends('layouts.app')

@section('content')
    <div class="background">
        <div class="close">
            <a  href="{{ route('close.cv') }}" >x</a>
        </div>
        <div class="container">
            <div class="cv-content">
                <div class="row">
                    <div class="col-4">
                        <div class="heading text-center">
                            <h3>{{Str::upper($expert -> name) }}</h3>
                        </div>
                        <div class="image">
                            <img src="{{ asset('assets/images/user-cv.jpeg') }}" alt="user">
                        </div>
                        <div class="details">
                            <div class="title">
                                <h4>Details</h4>
                                <hr>
                            </div>
                            <h5><i class="la la-envelope"></i>{{ $expert -> email }}</h5>
                            <h5><i class="la la-phone"></i>{{ $expert -> phone }}</h5>
                            <h5><i class="la la-flag-o"></i>{{ $expert -> nationality -> nationality }}</h5>
                            <h5><i class="la la-map-o"></i>{{ $expert -> emirtes -> name }}</h5>
                            <h5><i class="la la-transgender"></i> @if ($expert -> gender == 1) male @else female

                            @endif </h5>
                            <h5><i class="la la-calendar-o"></i>{{ $expert -> date_of_birth }}</h5>
                        </div>
                        @if($expert -> langauges)
                            <div class="langauges">
                                <div class="title">
                                    <h4>Langauges</h4>
                                    <hr>
                                </div>
                                @foreach ($expert -> langauges as $lang)
                                    <h5>{{ $lang -> name }}</h5>
                                @endforeach
                            </div>
                        @endif

                    </div>
                    <div class="col-8">
                        @if($expert -> educations)
                            <div class="education">
                                <div class="title">
                                    <i class="la la-mortar-board"></i>
                                    <h4>EDUCATION</h4>
                                    <hr>
                                </div>
                                <div class="cont">
                                    <h5>{{ $expert -> educations[0] -> name }}</h5>
                                    <p><span>{{ $expert -> educations[0] -> start_date }}</span></p>
                                    <p><span>{{ $expert -> educations[0] -> end_date }}</span></p>
                                </div>
                            </div>
                        @endif

                        @if($expert -> categories)
                            <div class="education experts">
                                <div class="title">
                                    <i class="la la-certificate"></i>
                                    <h4>AREA OF EXPERTISE</h4>
                                    <hr>
                                </div>
                                <div class="cont">
                                    <h5>{{ $expert -> category -> name }}</h5>
                                    <p>@foreach ($expert -> categories as $subcat)
                                        {{ $subcat -> name }},
                                    @endforeach</p>

                                </div>
                            </div>
                        @endif

                        @if($expert -> orginizations)
                            <div class="education experience">
                                <div class="title">
                                    <i class="la la-life-ring"></i>
                                    <h4>RELEVANT WORK EXPERIENCE</h4>
                                    <hr>
                                </div>
                                <div class="cont">
                                    <h5>Organization: <span>{{ $expert -> orginizations[0] -> name }}</span></h5>
                                    <h5>Type: <span>  @if ($expert -> orginizations[0] -> type == 1)
                                        National
                                    @elseif ($expert -> orginizations[0] -> type == 2)
                                        Regional
                                    @else
                                        International
                                    @endif </span></h5>
                                    <h5>Description: <span> {{ $expert -> orginizations[0] -> desc }} </span></h5>
                                    <p><span>{{ $expert -> orginizations[0] -> start_date }}</span></p>
                                    <p><span>{{ $expert -> orginizations[0] -> end_date }}</span></p>
                                </div>
                            </div>

                        @endif
                        @if($expert -> consultancies)
                            <div class="education consultancies">
                                <div class="title">
                                    <i class="la la-institution"></i>
                                    <h4>RELEVANT CONSULTANCIES</h4>
                                    <hr>
                                </div>
                                <div class="cont">
                                    <h5>Organization: <span> {{ $expert -> consultancies[0] -> name }} </span></h5>
                                    <h5>Description: <span> {{ $expert -> consultancies[0] -> desc }} </span></h5>
                                    <p><span>Start Date: {{  $expert -> consultancies[0] -> start_date  }}</span></p>
                                    <p><span>End Date:  {{ $expert -> consultancies[0] -> end_date }} </span></p>
                                </div>
                            </div>
                        @endif

                        @if($expert -> publications)
                            <div class="education publition">
                                <div class="title">
                                    <i class="la la-newspaper-o"></i>
                                    <h4>PUBLICATIONS</h4>
                                    <hr>
                                </div>
                                <div class="cont">
                                    <h5>TITLE: <span> {{ $expert -> publications[0] -> title }} </span></h5>
                                    <h5>JOURNAL: <span> {{ $expert -> publications[0] -> jornal }}</span></h5>
                                    <p><span>Date: {{ $expert -> publications[0] -> year }}</span></p>
                                </div>
                            </div>
                        @endif

                        @if($expert -> committes)
                            <div class="education committe">
                                <div class="title">
                                    <i class="la la-tag"></i>
                                    <h4>COMMITTES</h4>
                                    <hr>
                                </div>
                                <div class="cont">
                                    <h5>Organization: {{ $expert -> committes[0] -> orginization }}</h5>
                                    <h5>Description <span> {{ $expert -> committes[0] -> desc }}</span></h5>
                                    <p><span>Start Date: {{ $expert -> committes[0] -> start_date }}</span></p>
                                    <p><span>End Date: {{ $expert -> committes[0] -> end_date }}</span></p>
                                </div>
                            </div>
                        @endif


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


