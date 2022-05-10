@extends('layouts.site')

@section('content')
<div class="app-content content" style="margin-left: 0">
    <div class="content-wrapper">
        <div class="content-header">
            <div class="content-header text-center" style="margin-bottom: 20px">
                <div class="breadcrumbs-top">
                    <div class="breadcrumb-wrapper">
                        <h3 >Experts Pool For Hazardous Material & CBRNe</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <!-- Basic form layout section start -->
            <section id="basic-form-layouts">
                <div class="row match-height">
                    <div class="col-md-12">
                        <div class="card">
                            @include('admin.includes.alerts.success')
                            @include('admin.includes.alerts.errors')
                            <div class="card-content collapse show">
                                <div class="card-body">
                                    <form class="form"
                                          action="{{route('store.data.step.three')}}"
                                          method="POST"
                                          enctype="multipart/form-data">
                                        @csrf

                                        <div class="form-body">

                                            <h4 class="form-section"><i class="ft-home"></i> Expert Consultancies & Publications & Committees </h4>
                                            <div class="card">
                                                <div class="card-header" style="background-color: #EEE;padding: 10px 20px;">
                                                    <h3>Relevant Consultancies</h3>
                                                </div>
                                                <div class="card-body">

                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="projectinput1"> Consultancy Name
                                                                </label>
                                                                <input type="text" id="con_name"
                                                                       class="form-control"
                                                                       placeholder="Please enter consultancy name"
                                                                       value="{{old('con_name')}}"
                                                                       name="con_name">
                                                                @error("con_name")
                                                                <span class="text-danger">{{$message}}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="projectinput1">Descripition Of Consultancy</label>
                                                                <textarea id="summernote" class="form-control" name="con_desc">{{old('con_desc')}}</textarea>
                                                                @error("con_desc")
                                                                <span class="text-danger">{{ $message }} </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row" >
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="projectinput1"> Start Date
                                                                </label>

                                                                <input type="date" id="con_start_date"
                                                                       class="form-control"
                                                                       placeholder="  "
                                                                       value="{{old('con_start_date')}}"
                                                                       name="con_start_date">

                                                                @error('con_start_date')
                                                                <span class="text-danger"> {{$message}}</span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="projectinput1"> End Date
                                                                </label>
                                                                <input type="date" id="con_end_date"
                                                                       class="form-control"
                                                                       placeholder="  "
                                                                       value="{{old('con_end_date')}}"
                                                                       name="con_end_date">

                                                                @error('con_end_date')
                                                                <span class="text-danger"> {{$message}}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="card">
                                                <div class="card-header" style="background-color: #EEE;padding: 10px 20px;">
                                                    <h3>Publications</h3>
                                                </div>
                                                <div class="card-body">

                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="projectinput1"> Title
                                                                </label>
                                                                <input type="text" id="title"
                                                                       class="form-control"
                                                                       placeholder="Please enter title"
                                                                       value="{{old('title')}}"
                                                                       name="title">
                                                                @error("title")
                                                                <span class="text-danger">{{$message}}</span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="projectinput1"> Journal
                                                                </label>
                                                                <input type="text" id="journal"
                                                                       class="form-control"
                                                                       placeholder="Please enter journal"
                                                                       value="{{old('journal')}}"
                                                                       name="journal">
                                                                @error("journal")
                                                                <span class="text-danger">{{$message}}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row" >
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="projectinput1"> Year
                                                                </label>

                                                                <input type="date" id="pub_year"
                                                                       class="form-control"
                                                                       placeholder="  "
                                                                       value="{{old('pub_year')}}"
                                                                       name="pub_year">

                                                                @error('pub_year')
                                                                <span class="text-danger"> {{$message}}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="card">
                                                <div class="card-header" style="background-color: #EEE;padding: 10px 20px;">
                                                    <h3>Committees</h3>
                                                </div>
                                                <div class="card-body">

                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="projectinput1"> Organisation
                                                                </label>
                                                                <input type="text" id="com_organisation"
                                                                       class="form-control"
                                                                       placeholder="Please enter organisation name"
                                                                       value="{{old('com_organisation')}}"
                                                                       name="com_organisation">
                                                                @error("com_organisation")
                                                                <span class="text-danger">{{$message}}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="projectinput1">Descripition</label>
                                                                <textarea id="summernote" class="form-control" name="com_desc">{{old('com_desc')}}</textarea>
                                                                @error("com_desc")
                                                                <span class="text-danger">{{ $message }} </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row" >
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="projectinput1"> Start Date
                                                                </label>

                                                                <input type="date" id="com_start_date"
                                                                       class="form-control"
                                                                       placeholder="  "
                                                                       value="{{old('com_start_date')}}"
                                                                       name="com_start_date">

                                                                @error('com_start_date')
                                                                <span class="text-danger"> {{$message}}</span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="projectinput1"> End Date
                                                                </label>
                                                                <input type="date" id="com_end_date"
                                                                       class="form-control"
                                                                       placeholder="  "
                                                                       value="{{old('com_end_date')}}"
                                                                       name="com_end_date">

                                                                @error('com_end_date')
                                                                <span class="text-danger"> {{$message}}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <fieldset class="checkbox">
                                                            <label>
                                                              <input type="checkbox" name="Policies"> I read <a data-toggle="collapse" data-parent="#accordionWrapa1" href="#accordion1" aria-expanded="true" aria-controls="accordion1" class="card-title lead">terms and policies</a> and accept all.
                                                            </label>
                                                            @error('Policies')
                                                            <span class="text-danger"> {{$message}}</span>
                                                            @enderror
                                                            <div id="accordion1" role="tabpanel" aria-labelledby="heading1" class="collapse " style="">
                                                                <div class="card-content">
                                                                  <div class="card-body">
                                                                   {{$policies -> text}}
                                                                  </div>
                                                                </div>
                                                              </div>
                                                        </fieldset>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>

                                        <div class="form-actions">
                                            <button type="button" class="btn btn-warning mr-1"
                                                    onclick="history.back();">
                                                <i class="ft-x"></i> back
                                            </button>
                                            <button type="submit" class="btn btn-primary">
                                                <i class="la la-check-square-o"></i> save
                                            </button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- // Basic form layout section end -->
        </div>
    </div>
</div>
@endsection
