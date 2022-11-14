@extends('admin.layout.layout')
@section('content')


<div class="col-md-10 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
          <h4 class="card-title">All Categories</h4>
          <a href="{{route('admin.category.create')}}"  class="btn btn-info float-right my-3"> Add Categories</a>
          <div class="table-responsive">
            <table id="data-table" class="table">
                @include('admin.includes.messages')
              <thead>
                <tr>
                  <th>Category</th>
                  <th>Description</th>
                  <th>Parent Category</th>
                  <th>Section</th>
                  <th>URL</th>
                  <th>Status</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                @if (!empty($items))
                    @foreach($items as $item)
                      <tr>
                        <td>{{$item->name}}</td>
                        <td>{{$item->description}}</td>
                        <td>@if(!$item->parentCategory)  <b>Main Category</b> @else {{$item->parentCategory->name}} @endif </td>
                        <td>{{$item->section->name}}</td>
                        <td>{{$item->url}}</td>
                        @if($item->status == '1')
                            <td>
                                <a class="updateItemStatus" id="item-{{$item->id}}" direction="category" item-id="{{$item->id}}" href="javascript:void(0)">
                                    <label class="badge badge-success" status="active">Active</label>
                                </a>
                            </td>
                        @else
                            <td>
                                <a class="updateItemStatus" id="item-{{$item->id}}" direction="category"category" item-id="{{$item->id}}" href="javascript:void(0)">
                                    <label class="badge badge-danger" status="inactive">Inactive</label>
                                </a>
                            </td>
                        @endif
                        <td class="d-flex">
                            <a href="{{ route('admin.category.edit', $item->id) }}">
                                <i class="mdi mdi-border-color action-icon " style="color:  #4B49AC;"></i>
                            </a>
                            <a  id="{{ $item->id }}" class="confirm-delete" title="category" >
                                <i class="mdi mdi-delete action-icon color-red" style="color:red;"></i>
                            </a>
                        </td>
                      </tr>
                    @endforeach
                @else
                    <div>There is no Categories</div>
                @endif
              </tbody>
            </table>
          </div>
        </div>
      </div>
</div>



@endsection
