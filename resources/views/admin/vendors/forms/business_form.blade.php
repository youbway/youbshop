

<div class="row justify-content-center ">
    <div class="col-md-8 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Update shop Informations</h4>

            @include('admin.includes.messages')

            <form class="" action="{{ route('admin.update.vendor.details', $slug) }}" method="post" id="updateVendorBusinessForm" enctype="multipart/form-data">
                @csrf
              <div class="d-flex">
                <div class="col-md-6">
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
                        <select class="form-control" name="shop_country" id="country">
                            @foreach ($countries as $country)
                                <option value="{{ $country->country_name }}" @if ($country->country_name == $businessDetails->shop_country ) selected @endif >{{ $country->country_name }}</option>
                            @endforeach
                        </select>
                      </div>

                      <div class="form-group">
                        <label for="mobile">Shop Mobile</label>
                        <input type="text" name="shop_mobile" class="form-control" id="mobile" placeholder="Enter The Shop New Mobile" value="{{ $businessDetails->shop_mobile }}">
                      </div>
                  </div>

                  <div class="col-md-6">

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
                        <select name="address_proof" class="form-control" id="address-proof" placeholder="Enter The Shop Website" >
                            <option value="passport">Passport</option>
                            <option value="ID card">ID card</option>
                            <option value="residence permit">Residence Permit</option>
                        </select>
                      </div>

                      <div class="form-group">
                        <label>Address Proof Image</label>
                        <input type="file" name="address_proof_image" class="file-upload-default">
                        <div class="input-group col-xs-12">
                          <input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Image">
                          <span class="input-group-append">
                            <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                          </span>
                        </div>
                        @if(!empty($businessDetails->address_proof_image))
                            <div>
                                <a href="{{ url($businessDetails->address_proof_image) }}" target="_blank">view Image</a>
                            </div>
                        @endif
                      </div>

                  </div>
              </div>
              <button type="submit" class="btn btn-primary mr-2">Submit</button>
              <button class="btn btn-light">Cancel</button>
            </form>
          </div>
        </div>
      </div>
   </div>


