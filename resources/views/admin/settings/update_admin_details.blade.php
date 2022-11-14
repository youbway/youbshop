@extends('admin.layout.layout')
@section('content')



<div class="main-panel">
    <div class="content-wrapper">
      <div class="row">
        <div class="col-md-12 grid-margin">
          <div class="row">
            <div class="col-12 col-xl-8 mb-4 mb-xl-0">
              <h3 class="font-weight-bold">Settings</h3>
            </div>

          </div>
        </div>
      </div>


   <div class="row justify-content-center ">
    <div class="col-md-8 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Update admin details</h4>

            @include('admin.includes.messages')

            <form class="" action="{{ route('admin.update.details') }}" method="post" id="updateAdminPasswordForm" enctype="multipart/form-data">
                @csrf
              <div class="form-group">
                <label for="email">Username/Email</label>
                <input type="text" name="email" class="form-control" id="email" placeholder="Username" value="{{ $adminDetails->email }}"  readonly>
              </div>
              <div class="form-group">
                <label for="type">Admin Type</label>
                <input type="text" name="type" class="form-control" id="type" placeholder="Admin Type" value="{{ $adminDetails->type }}"  readonly>
              </div>
              <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="Enter The Admin Name" value="{{ $adminDetails->name }}">
                <span id="password-check"></span>
              </div>
              <div class="form-group">
                <label for="mobile">New Mobile</label>
                <input type="text" name="mobile" class="form-control" id="mobile" placeholder="New Mobile" value="{{ $adminDetails->mobile }}">
              </div>

              <div class="form-group">
                <label>Image</label>
                <input type="file" name="image" class="file-upload-default">
                <div class="input-group col-xs-12">
                  <input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Image">
                  <span class="input-group-append">
                    <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                  </span>
                </div>
                @if(!empty($adminDetails->image))
                    <div>
                        <a href="{{ url($adminDetails->image) }}" target="_blank">view Image</a>
                    </div>
                @endif
              </div>

              <div class="form-group">
                <div class="form-check form-check-primary">
                    <label class="form-check-label">
                      <input type="checkbox" class="form-check-input" name="status" @if ($adminDetails->status) checked  @endif>
                      Status
                    <i class="input-helper"></i></label>
                  </div>
              </div>



              <button type="submit" class="btn btn-primary mr-2">Submit</button>
              <button class="btn btn-light">Cancel</button>
            </form>
          </div>
        </div>
      </div>
   </div>
    <!-- content-wrapper ends -->
    @include('admin.layout.footer')
    <!-- partial -->
  </div>






@endsection
