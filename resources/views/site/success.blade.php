@extends('layouts.site')

@section('content')
    <div class="app-content content" style="margin-left: 0">
        <div class="content-wrapper">
          <div class="content-header row">
          </div>
          <div class="content-body">
            <section class="flexbox-container">
              <div class="col-12 d-flex align-items-center justify-content-center">
                <div class="col-md-4 col-10 p-0">
                  <div class="card-header bg-transparent border-0">
                    <h3 class="text-uppercase text-center">Your data added successfully!</h3>
                  </div>
                  <div class="card-content">
                    <div class="row py-2">
                      <div class="col-12 col-sm-6 col-md-12">
                        <a href="{{ route('create.data.step.one') }}" class="btn btn-primary btn-block"><i class="ft-home"></i> Back to Home</a>
                      </div>
                    </div>
                  </div>
                  <div class="card-footer bg-transparent">
                    <div class="row">
                      <p class="text-muted text-center col-12 py-1">Mariam Alshamsi </a>, All rights reserved.</a></p>
                    </div>
                  </div>
                </div>
              </div>
            </section>
          </div>
        </div>
      </div>
@endsection
