@extends('admin.layout.layout')
@section('content')
<div class="content-wrapper">
    <div class="row ">
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">vendor Personal Informations</h4>

                <form class="" action="" method="post" id="updateVendorPersonalForm" enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="email">Username/Email</label>
                    <input type="text" name="email" class="form-control" id="email" placeholder="Username" value="{{ $adminDetails->email }}"  readonly>
                  </div>

                  <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" name="address" class="form-control" id="address" placeholder="Enter The New address" value="{{ $vendorDetails->address }}">
                  </div>

                  <div class="form-group">
                    <label for="city">City</label>
                    <input type="text" name="city" class="form-control" id="city" placeholder="Enter The Admin Name" value="{{ $vendorDetails->city }}">
                  </div>

                  <div class="form-group">
                    <label for="state">State</label>
                    <input type="text" name="state" class="form-control" id="state" placeholder="Enter The Admin Name" value="{{ $vendorDetails->state }}">
                    <span id="password-check"></span>
                  </div>

                  <div class="form-group">
                    <label for="country">Country</label>
                    <input type="text" name="country" class="form-control" id="country" placeholder="Enter The Admin Name" value="{{ $vendorDetails->country }}">
                  </div>

                  <div class="form-group">
                    <label for="pincode">Pin Code</label>
                    <input type="text" name="pincode" class="form-control" id="pincode" placeholder="Enter The Admin Name" value="{{ $vendorDetails->pincode }}">
                  </div>

                  <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Enter The Admin Name" value="{{ $adminDetails->name }}">
                  </div>
                  <div class="form-group">
                    <label for="mobile">Mobile</label>
                    <input type="text" name="mobile" class="form-control" id="mobile" placeholder="New Mobile" value="{{ $adminDetails->mobile }}">
                  </div>



                @if(!empty($adminDetails->image))
                    <div class="form-group">
                        <label>Image</label>
                        <a href="{{ url($adminDetails->image) }}" target="_blank">view Image</a>
                    </div>
                @endif



                </form>
              </div>
            </div>
        </div>

        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Shop Informations</h4>

                  <form class="" action="" method="post" id="updateVendorBusinessForm" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="email">Shop Email</label>
                        <input type="text" name="shop_email" class="form-control" id="email" placeholder="Enter The Shop Email" value="{{ $businessDetails->shop_email }}" readonly>
                    </div>

                    <div class="form-group">
                        <label for="name">Shop Name</label>
                        <input type="text" name="shop_name" class="form-control" id="name" placeholder="Enter The Shop Name" value="{{ $businessDetails->shop_name }}">
                    </div>

                    <div class="form-group">
                        <label for="address">Shop Address</label>
                        <input type="text" name="shop_address" class="form-control" id="address" placeholder="Enter The New address" value="{{ $businessDetails->shop_address }}">
                    </div>

                    <div class="form-group">
                        <label for="city">Shop City</label>
                        <input type="text" name="shop_city" class="form-control" id="city" placeholder="Enter The Shop City" value="{{ $businessDetails->shop_city }}">
                    </div>

                    <div class="form-group">
                        <label for="state">Shop State</label>
                        <input type="text" name="shop_state" class="form-control" id="state" placeholder="Enter The Shop State" value="{{ $businessDetails->shop_state }}">
                        <span id="password-check"></span>
                    </div>

                    <div class="form-group">
                        <label for="country">Shop Country</label>
                        <input type="text" name="shop_country" class="form-control" id="country" placeholder="Enter The Shop Country" value="{{ $businessDetails->shop_country }}">
                    </div>

                    <div class="form-group">
                        <label for="mobile">Shop Mobile</label>
                        <input type="text" name="shop_mobile" class="form-control" id="mobile" placeholder="Enter The Shop New Mobile" value="{{ $businessDetails->shop_mobile }}">
                    </div>

                    <div class="form-group">
                        <label for="website">Shop Website</label>
                        <input type="text" name="shop_website" class="form-control" id="website" placeholder="Enter The Shop Website" value="{{ $businessDetails->shop_website }}">
                    </div>

                    <div class="form-group">
                        <label for="pincode">Shop Pin Code</label>
                        <input type="text" name="shop_pincode" class="form-control" id="pincode" placeholder="Enter The Shop Pin Code" value="{{ $businessDetails->shop_pincode }}">
                    </div>

                    <div class="form-group">
                        <label for="bln">Business License Number</label>
                        <input type="text" name="business_license_number" class="form-control" id="bln" placeholder="Enter The Business License Number" value="{{ $businessDetails->business_license_number }}">
                    </div>

                    <div class="form-group">
                        <label for="gst">gst Number</label>
                        <input type="text" name="gst_number" class="form-control" id="gst" placeholder="Enter The gst Number" value="{{ $businessDetails->gst_number }}">
                    </div>

                    <div class="form-group">
                        <label for="pan">pan Number</label>
                        <input type="text" name="pan_number" class="form-control" id="pan" placeholder="Enter The Shop Website" value="{{ $businessDetails->pan_number }}">
                    </div>

                    <div class="form-group">
                        <label for="address-proof">Shop Address Proof</label>
                        <input type="text" name="address_proof" class="form-control" id="pan" placeholder="Enter The Shop Website" value="{{ $businessDetails->address_proof }}">
                    </div>


                        @if(!empty($businessDetails->address_proof_image))
                            <div class="form-group">
                                <label>Address Proof Image</label> <br>
                                <a href="{{ url($businessDetails->address_proof_image) }}" target="_blank">view Image</a>
                            </div>
                        @endif


                    </div>
                  </form>
                </div>
        </div>
    </div>

    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
              <h4 class="card-title">Bank Informations</h4>


              <form class="" action="" method="post" id="updateVendorBankForm" enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="name">Account Holder Name</label>
                    <input type="text" name="account_holder_name" class="form-control" id="name" placeholder="Enter The Account Holder Name" value="{{ $bankDetails->account_holder_name }}">
                  </div>


                <div class="form-group">
                  <label for="bank_name">Bank Name</label>
                  <input type="text" name="bank_name" class="form-control" id="bank_name" placeholder="Enter The Bank Name " value="{{ $bankDetails->bank_name }}">
                </div>

                <div class="form-group">
                  <label for="account_number">Account Number</label>
                  <input type="text" name="account_number" class="form-control" id="account_number" placeholder="Enter The Account Number" value="{{ $bankDetails->account_number }}">
                </div>

                <div class="form-group">
                  <label for="ifsc">Bank ifsc Number</label>
                  <input type="text" name="bank_ifsc_number" class="form-control" id="ifsc" placeholder="Enter The Bank ifsc Number" value="{{ $bankDetails->bank_ifsc_number }}">
                  <span id="password-check"></span>
                </div>

              </form>
            </div>
          </div>
    </div>

    <a href="{{ route('show.admins', '') }}" class="btn btn-primary"> See All</a>
</div>





@endsection
