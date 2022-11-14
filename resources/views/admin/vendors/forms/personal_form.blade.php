<div class="row justify-content-center ">
    <div class="col-md-8 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Update Personal Informations</h4>

            @include('admin.includes.messages')

            <form class="" action="{{ route('admin.update.vendor.details', $slug) }}" method="post" id="updateVendorPersonalForm" enctype="multipart/form-data">
                @csrf
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
                <select class="form-control" name="country" id="country">
                    @foreach ($countries as $country)
                        <option value="{{ $country->country_name }}" @if ($country->country_name == $vendorDetails->country ) selected @endif >{{ $country->country_name }}</option>
                    @endforeach
                </select>
              </div>

              <div class="form-group">
                <label for="pincode">Pin Code</label>
                <input type="text" name="pincode" class="form-control" id="pincode" placeholder="Enter The Admin Name" value="{{ $vendorDetails->pincode }}">
              </div>

              <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="Enter The Admin Name" value="{{ $adminDetails->name }}">
                <span id="password-check"></span>
              </div>
              <div class="form-group">
                <label for="mobile">Mobile</label>
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


              <button type="submit" class="btn btn-primary mr-2">Submit</button>
              <button class="btn btn-light">Cancel</button>
            </form>
          </div>
        </div>
      </div>
   </div>
