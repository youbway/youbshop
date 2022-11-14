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
            <h4 class="card-title">Update admin password</h4>

            @include('admin.includes.messages')

            <form class="forms-sample" action="{{ route('admin.update.password') }}" method="post" id="updateAdminPasswordForm">
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
                <label for="currentPassword">Current Password</label>
                <input type="password" name="currentPassword" class="form-control" id="currentPassword" placeholder="Enter The Current Password">
                <span id="password-check"></span>
              </div>
              <div class="form-group">
                <label for="password">New Password</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="New Password">
              </div>
              <div class="form-group">
                <label for="confirmPassword">Confirm Password</label>
                <input type="password" name="password-confirm" class="form-control" id="confirmPassword" placeholder="Confirm Password">
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
