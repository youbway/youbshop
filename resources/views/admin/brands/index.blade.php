@extends('admin.layout.layout')
@section('content')


<div class="col-md-10 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
          <h4 class="card-title">All Brands</h4>
          <a href="{{route('admin.brand.create')}}"  class="btn btn-info float-right my-3"> Add brand</a>
          <div class="table-responsive">
            <table id="sections" class="table">
                @include('admin.includes.messages')
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Name</th>
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
                        @if($item->status == '1')
                            <td>
                                <a class="updateItemStatus" id="item-{{$item->id}}" direction="brand" item-id="{{$item->id}}" href="javascript:void(0)">
                                    <label class="badge badge-success" status="active">Active</label>
                                </a>
                            </td>
                        @else
                            <td>
                                <a class="updateItemStatus" id="item-{{$item->id}}" direction="brand" item-id="{{$item->id}}" href="javascript:void(0)">
                                    <label class="badge badge-danger" status="inactive">Inactive</label>
                                </a>
                            </td>
                        @endif
                        <td class="d-flex">
                            <a href="{{ route('admin.brand.edit', $item->id) }}">
                                <i class="mdi mdi-border-color action-icon " style="color:  #4B49AC;"></i>
                            </a>
                            <a class="confirm-delete"  id="{{ $item->id }}" title="brand">
                                <i class="mdi mdi-delete action-icon color-red" style="color:red;"></i>
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
