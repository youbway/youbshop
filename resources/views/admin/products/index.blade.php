@extends('admin.layout.layout')
@section('content')


<div class="col-md-10 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
          <h4 class="card-title">All Products</h4>
          <a href="{{route('admin.product.create')}}"  class="btn btn-info float-right my-3"> Add Product</a>
          <div class="table-responsive">
            <table id="data-table" class="table">
                @include('admin.includes.messages')
              <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Code</th>
                    <th>Color</th>
                    <th>Section</th>
                    <th>Category</th>
                    <th>Vendor</th>
                    <th>Image</th>
                    <th>Featured</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                @if (!empty($items))
                    @foreach($items as $item)
                      <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->code}}</td>
                        <td>{{$item->color}}</td>
                        <td>{{$item->section->name}}</td>
                        <td>{{$item->category->name}}</td>
                        <td>
                            @if($item->admin_type == 'vendor')
                            <a href="{{ route('admin.show.vendor.details', $item->admin_id)}}" target="_blank">
                                {{ $item->admin_type}}
                            </a>
                            @else
                            {{ "super admin" }}
                            @endif
                        </td>

                        @if ($item->image)
                            <td><img src="{{ url('storage/images/product_img/small/'.$item->image) }}" alt=""></td>
                        @else
                            <td><img src="{{ url('storage/images/product_img/small/noImage.jpg') }}" alt=""></td>
                        @endif
                        <td>{{ $item->is_featured }}</td>

                        @if($item->status == '1')
                            <td>
                                <a class="updateItemStatus" id="item-{{$item->id}}" direction="product" item-id="{{$item->id}}" href="javascript:void(0)">
                                    <label class="badge badge-success" status="active">Active</label>
                                </a>
                            </td>
                        @else
                            <td>
                                <a class="updateItemStatus" id="item-{{$item->id}}" direction="product" item-id="{{$item->id}}" href="javascript:void(0)">
                                    <label class="badge badge-danger" status="inactive">Inactive</label>
                                </a>
                            </td>
                        @endif
                        <td class="d-flex">
                            <a href="{{ route('admin.product.edit', $item->id) }}" class="">
                                <i  title="edit product" class="mdi mdi-border-color action-icon d-flex justify-content-center " style="color:  #4B49AC;"></i>
                            </a>
                            <a class="confirm-delete"  id="{{ $item->id }}" data-title="product" title="delete product">
                                <i class="mdi mdi-delete action-icon d-flex justify-content-center" style="color:red;"></i>
                            </a>

                            <a href="{{ route('admin.product.add.attributes', $item->id) }}">
                                <i title="add attributes" class="mdi mdi-plus-circle action-icon d-flex justify-content-center" style="color:  #4B49AC;"></i>
                            </a>

                            <a href="{{ route('admin.product.add.images', $item->id) }}">
                                <i title="add images " class="mdi mdi-library-plus action-icon d-flex justify-content-center" style="color:  #4B49AC;"></i>
                            </a>
                        </td>
                      </tr>
                    @endforeach
                @else
                    <div>There is no brands</div>
                @endif
              </tbody>
            </table>
          </div>
        </div>
      </div>
</div>



@endsection
