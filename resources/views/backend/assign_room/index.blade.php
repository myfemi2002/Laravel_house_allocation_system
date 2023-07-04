@extends('admin.admin_master')
@section('title', 'Assign Occupant & Flat')
@section('admin')
<div class="page-content">
<!--breadcrumb-->
@include('admin.body.breadcrumb')
<!--end breadcrumb-->
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table id="example2" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Estate Name</th>
                        <th scope="col">Block No</th>
                        <th scope="col">Flat No</th>
                        <th scope="col">Action</th>
                        <th scope="col">Assign Flat</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($allData as $key => $item)
                    <tr>
                        <th scope="row">{{ $key+1 }}</th>
                        <td>{{ $item['apartment']['apartment_name'] }}</td>
                        <td>{{ $item['block']['block_num'] }}</td>
                        <td>{{ $item->room_num }}</td>
                        <td>
                            @if($item->room_status == '1')
                            <span class="btn btn-danger">Not vacant</span>
                            @elseif($item->room_status == '2')
                            <span class="btn btn-warning">Pending Approval</span>
                            @elseif($item->room_status == '0')
                            <span class="btn btn-success">vacant</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('assign.room', $item->id) }}" class="btn btn-rounded btn-sm text-white" title="Assign Flat" > <span class="badge bg-warning">Click To Assign Flat</span></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
