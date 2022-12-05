<div class="row  ">
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Add a new Images </h4>

            @include('admin.includes.messages')



                <div class="form-group">
                    <label for="name">Name <span class="text-danger">*</span></label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Enter The Product Name" value="{{ $product->name }}" readonly >
                </div>



                <div class="form-group">
                    <label for="code">product Code <span class="text-danger">*</span></label>
                    <input type="text" name="code" class="form-control" id="code" placeholder="Enter The Product Code" value="{{ $product->code }}" readonly>
                </div>

                <div class="form-group">
                    <label for="color">product Color <span class="text-danger">*</span></label>
                    <input type="text" name="color" class="form-control" id="color" placeholder="Enter The Product Color" value="{{ $product->color }}" readonly>
                </div>

                <div class="form-group">
                    <label for="price">product Price <span class="text-danger">*</span></label>
                    <input type="text" name="price" class="form-control" id="price" placeholder="Enter The Product Price" value="{{ $product->price }}" readonly>
                </div>


                @if(!empty($product->image))
                    <div class="mb-4"><img  class="w-25" src="{{url('storage/images/product_img/large/'.$product->image)}}"/></div>
                @endif

                <div class="form-check">
                    <label class="form-check-label">
                      <input name="status" type="checkbox" class="form-check-input" @if($product->status) checked @endif Disabled>
                      Status
                    <i class="input-helper"></i></label>
                </div>





          </div>
        </div>
      </div>

      <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">


            <form class="" action="{{ route('admin.product.update.images', $product->id) }}" method="post" id="addImages" enctype="multipart/form-data" >
                @csrf

                <div class="form-group mb-4">
                    <label>Image upload (you can select multiple images)</label>
                    <input type="file" name="image[]" multiple class="file-upload-default">
                    <div class="input-group col-xs-12">
                      <input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Image">
                      <span class="input-group-append">
                        <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                      </span>
                    </div>
                  </div>

                <div class="table-responsive">
                    <table id="data-table" class="table">
                      <thead>
                        <tr>
                          <th>Image ID</th>
                          <th>See Image</th>
                          <th>Status</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        @if (!empty($images))
                            @foreach($images as $image)
                              <tr>
                                <td>{{$image->id}}</td>
                                <td>{{$image->sku}} <img src="{{ url($image->image) }}" alt="" srcset=""> <td>
                                @if($image->status == '1')
                                    <td>
                                        <a class="updateItemStatus" id="item-{{$image->id}}" direction="image" item-id="{{$image->id}}" href="javascript:void(0)">
                                            <label class="badge badge-success" status="active">Active</label>
                                        </a>
                                    </td>
                                @else
                                    <td>
                                        <a class="updateItemStatus" id="item-{{$image->id}}" direction="image" item-id="{{$image->id}}" href="javascript:void(0)">
                                            <label class="badge badge-danger" status="inactive">Inactive</label>
                                        </a>
                                    </td>
                                @endif
                                <td class="d-flex">
                                    <a class="confirm-delete"  id="{{ $image->id }}" data-title="image"  title="delete image">
                                        <i class="mdi mdi-delete action-icon color-red" style="color:red;"></i>
                                    </a>
                                </td>
                              </tr>
                            @endforeach
                        @else
                            <div>There is no images</div>
                        @endif
                      </tbody>
                    </table>
                  </div>


              <button type="submit" class="btn btn-primary mr-2">Submit</button>
            </form>
          </div>
        </div>
      </div>
   </div>
