@extends('admin.layout.layout')
@section('content')



<div class="main-panel">
    <div class="content-wrapper">
      <div class="row">
        <div class="col-md-12 grid-margin">
          <div class="row">
            <div class="col-12 col-xl-8 mb-4 mb-xl-0">
              <h3 class="font-weight-bold">Add Brand </h3>
            </div>

          </div>
        </div>
      </div>

    @include('admin.brands.forms.create_form')


    <!-- content-wrapper ends -->
    @include('admin.layout.footer')
    <!-- partial -->
  </div>






@endsection
