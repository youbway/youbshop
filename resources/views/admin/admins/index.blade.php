@extends('admin.layout.layout')
@section('content')


<div class="col-md-10 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
          <h4 class="card-title">{{ $type ? $type.'s' : "All admins | vendors | subAdmins" }}</h4>

          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Mobile</th>
                  <th>Email</th>
                  @if(!$type)
                  <th>type</th>
                  @endif
                  <th>Image</th>
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
                        <td>{{$item->mobile}}</td>
                        <td>{{$item->email}}</td>
                        @if(!$type)
                            <td>{{$item->type}}</td>
                        @endif
                        <td><img src="{{$item->image}}" width="50" class="rounded" alt=""></td>

                        @if($item->status == '1')
                            <td>
                                <a class="updateItemStatus" id="item-{{$item->id}}" direction="admin" item-id="{{$item->id}}" href="javascript:void(0)">
                                    <label class="badge badge-success" status="active">Active</label>
                                </a>
                            </td>
                        @else
                            <td>
                                <a class="updateItemStatus" id="item-{{$item->id}}" direction="admin"  item-id="{{$item->id}}" href="javascript:void(0)">
                                    <label class="badge badge-danger" status="inactive">Inactive</label>
                                </a>
                            </td>
                        @endif
                        <td class="d-flex">
                            @if($item->type == 'vendor')
                                <a href="{{ route('admin.show.vendor.details', $item->id) }}" class="btn btn-info">Show more</a>
                            @endif
                        </td>
                      </tr>
                    @endforeach
                @else
                    <div>There is no admin</div>
                @endif
              </tbody>
            </table>
          </div>
        </div>
      </div>
</div>



@endsection
