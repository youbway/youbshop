<div class="row justify-content-center ">
    <div class="col-md-8 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Update Brand </h4>

            @include('admin.includes.messages')

            <form class="" action="{{ route('admin.product.update', $item->id) }}" method="post" id="updateProduct" enctype="multipart/form-data" >
                @csrf
                @method('put')

                <div class="form-group">
                    <label for="category">Category <span class="text-danger">*</span></label>
                    <select name="category_id" class="form-control" id="category" >
                        <option value="" >.....</option>
                        @foreach ($categories as $section)
                            <optgroup label="{{$section -> name}}" >
                                @foreach ($section->categories as $category)
                                    <option value="{{$category->id}}"  @if($category->id == $item->category_id) selected   @endif>--{{$category->name}}</option>
                                    @foreach ($category->subCategories as $subCategory)
                                        <option value="{{$subCategory->id}}"  @if($subCategory->id == $item->category_id) selected   @endif>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp--{{$subCategory->name}}</option>
                                    @endforeach
                                @endforeach
                            </optgroup>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="brand">Brand <span class="text-danger">*</span></label>
                    <select name="brand_id" class="form-control" id="brand" >
                        <option value="">.....</option>
                        @foreach ($brands as $brand)
                            <option value="{{ $brand->id }}" @if($brand->id == $item->brand_id) selected   @endif >{{ $brand->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="name">Name <span class="text-danger">*</span></label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Enter The Product Name" value="{{ $item->name }}" >
                </div>

                <div class="form-group">
                    <label for="description">Description <span class="text-danger">*</span></label>
                    <textarea name="description" class="form-control" id="description" rows="4" >{{ $item->description }}</textarea>
                </div>

                <div class="form-group">
                    <label for="code">product Code <span class="text-danger">*</span></label>
                    <input type="text" name="code" class="form-control" id="code" placeholder="Enter The Product Code" value="{{ $item->code }}">
                </div>

                <div class="form-group">
                    <label for="color">product Color <span class="text-danger">*</span></label>
                    <input type="text" name="color" class="form-control" id="color" placeholder="Enter The Product Color" value="{{ $item->color }}">
                </div>

                <div class="form-group">
                    <label for="price">product Price <span class="text-danger">*</span></label>
                    <input type="text" name="price" class="form-control" id="price" placeholder="Enter The Product Price" value="{{ $item->price }}">
                </div>

                <div class="form-group">
                    <label for="discount">product Discount (%)</label>
                    <input type="text" name="discount" class="form-control" id="discount" placeholder="Enter The Product Discount"value="{{ $item->discount }}" >
                </div>

                <div class="form-group">
                    <label for="weight">product Weight</label>
                    <input type="text" name="weight" class="form-control" id="weight" placeholder="Enter The Product Weight" value="{{ $item->weight }}">
                </div>

                <div class="form-group">
                    <label for="meta-title">product Meta-title</label>
                    <input type="text" name="meta_title" class="form-control" id="meta-title" placeholder="Enter The Product Meta-title" value="{{ $item->meta_title }}">
                </div>

                <div class="form-group">
                    <label for="meta-description">product Meta-description</label>
                    <input type="text" name="meta_description" class="form-control" id="meta-description" placeholder="Enter The Product Meta-description" value="{{ $item->meta_description }}">
                </div>

                <div class="form-group">
                    <label for="meta-keywords">product Meta-keywords</label>
                    <input type="text" name="meta_keywords" class="form-control" id="meta-keywords" placeholder="Enter The Product Meta-keywords" value="{{ $item->meta_keywords }}">
                </div>

                <div class="form-group">
                    <label>Image upload (Recommended size of 1000*1000)</label>
                    <input type="file" name="image" class="file-upload-default">
                    <div class="input-group col-xs-12">
                      <input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Image">
                      <span class="input-group-append">
                        <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                      </span>
                    </div>
                </div>
                @if(!empty($item->image))
                    <div class="mb-4"><a href="{{url('storage/images/product_img/large/'.$item->image)}}" target="_blank" alt="">see the image</a></div>
                    <div class="mb-4"><a class="confirm-delete-attribute" href="javascript:void(0)" attribute="image" title="product" id="{{$item->id}}" alt="">delete the image</a></div>
                @endif

                <div class="form-group">
                    <label>Video upload (Recommended size of 2Mb)</label>
                    <input type="file" name="video" class="file-upload-default">
                    <div class="input-group col-xs-12">
                      <input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Video">
                      <span class="input-group-append">
                        <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                      </span>
                    </div>
                </div>

                @if(!empty($item->video))
                    <div class="mb-4"><a href="{{ url($item->changePublicToStorage()) }}" target="_blank" alt="">watch the video</a></div>
                    <div class="mb-4"><a class="confirm-delete-attribute" href="javascript:void(0)" attribute="video" title="product" id="{{$item->id}}" alt="">delete the video</a></div>
                @endif

                <div class="form-check">
                    <label class="form-check-label">
                      <input name="status" type="checkbox" class="form-check-input" @if($item->status) checked @endif>
                      Status
                    <i class="input-helper"></i></label>
                </div>

                <div class="form-check">
                    <label class="form-check-label">
                      <input name="is_featured" type="checkbox" class="form-check-input" @if($item->is_featured == 'yes') checked @endif>
                      Is Featured
                    <i class="input-helper"></i></label>
                </div>

              <button type="submit" class="btn btn-primary mr-2">Submit</button>
            </form>
          </div>
        </div>
      </div>
   </div>
