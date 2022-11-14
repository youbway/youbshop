<div class="row justify-content-center ">
    <div class="col-md-8 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Edit The {{ $category->name }} Category</h4>

            @include('admin.includes.messages')

            <form class="" action="{{ route('admin.category.update', $category->id) }}" method="post" id="editCategory" >
                @csrf
                @method('put')
                <div class="form-group">
                    <label for="name">Category Name</label>
                    <input type="text" name="name" class="form-control" id="name" value="{{ $category->name }}" >
                </div>

                @livewire('admin.parent-category-select', ['parent_id' => $category->parent_id,'section_id' => $category->section_id])

                <div class="form-group">
                    <label for="description">Category Description</label>
                    <textarea type="text" name="description" class="form-control" id="description" rows="4" >{{ $category->description }}</textarea>
                </div>

                <div class="form-group">
                    <label for="url">Category URL</label>
                    <input type="text" name="url" class="form-control" id="url" value="{{ $category->url }}" >
                </div>

                <div class="form-group">
                    <label for="discount">Category Discount</label>
                    <input type="text" name="discount" class="form-control" id="discount" value="{{ $category->discount }}" >
                </div>

                <div class="form-group">
                    <label for="meta_title">Category meta-title</label>
                    <input type="text" name="meta_title" class="form-control" id="meta_title" value="{{ $category->meta_title }}" >
                </div>

                <div class="form-group">
                    <label for="meta_description">Category meta-description</label>
                    <input type="text" name="meta_description" class="form-control" id="meta_description" value="{{ $category->meta_description }}" >
                </div>

                <div class="form-group">
                    <label for="meta_keywords">Category meta-keywords</label>
                    <input type="text" name="meta_keywords" class="form-control" id="meta_keywords" value="{{ $category->meta_keywords }}" >
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
                    @if($category->image)
                        <div>
                            <a href="{{ url('$category->image') }}" target="_blank"> View Image</a>
                        </div>
                    @endif
                </div>

                <div class="form-check">
                    <label class="form-check-label">
                      <input name="status" type="checkbox" class="form-check-input" @if($category->status) checked @endif>
                      Status
                    <i class="input-helper"></i></label>
                </div>

              <button type="submit" class="btn btn-primary mr-2">Submit</button>
            </form>
          </div>
        </div>
      </div>
   </div>
