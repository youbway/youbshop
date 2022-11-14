@extends('admin.layout.layout')
@section('content')



<div class="main-panel">
    <div class="content-wrapper">
      <div class="row">
        <div class="col-md-12 grid-margin">
          <div class="row">
            <div class="col-12 col-xl-8 mb-4 mb-xl-0">
              <h3 class="font-weight-bold">Update vendor details</h3>
            </div>

          </div>
        </div>
      </div>


    @if($slug == 'personal')

    @include('admin.vendors.forms.personal_form')

    @elseif($slug == 'business')

    @include('admin.vendors.forms.business_form')

    @elseif($slug == 'bank')

    @include('admin.vendors.forms.bank_form')

    @endif


    <!-- content-wrapper ends -->
    @include('admin.layout.footer')
    <!-- partial -->
  </div>






@endsection
