<div class="row justify-content-center ">
    <div class="col-md-8 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Update Bank Informations</h4>

            @include('admin.includes.messages')

            <form class="" action="{{ route('admin.update.vendor.details', $slug) }}" method="post" id="updateVendorBankForm" enctype="multipart/form-data">
                @csrf
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

              <button type="submit" class="btn btn-primary mrbtn btn-info-2">Submit</button>
              <button class="btn btn-light">Cancel</button>
            </form>
          </div>
        </div>
      </div>
   </div>
