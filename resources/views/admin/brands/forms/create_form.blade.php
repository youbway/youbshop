<div class="row justify-content-center ">
    <div class="col-md-8 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Add a new Brand </h4>

            @include('admin.includes.messages')

            <form class="" action="{{ route('admin.brand.store') }}" method="post" id="storeBrands" >
                @csrf

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Enter The Brand Name" ">
                </div>

                <div class="form-check">
                    <label class="form-check-label">
                      <input name="status" type="checkbox" class="form-check-input">
                      Status
                    <i class="input-helper"></i></label>
                </div>

              <button type="submit" class="btn btn-primary mr-2">Submit</button>
            </form>
          </div>
        </div>
      </div>
   </div>
