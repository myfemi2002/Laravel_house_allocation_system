@extends('admin.admin_master')
@section('title', 'Flat Numb')
@section('admin')
<div class="page-content">
<!--breadcrumb-->
@include('admin.body.breadcrumb')
<!--end breadcrumb-->
<div class="card">
    <div class="border-bottom px-4 py-2">
        <a href="{{ route('room.add') }}" class="btn btn-rounded btn-primary" style="float: right;"><i class="fa fa-plus-circle"></i> Add Flat </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="example2" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Hall Name</th>
                        <th scope="col">Block </th>
                        <th scope="col">Flat </th>
                        <th scope="col">Accessories</th>
                        <th scope="col">Flat Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($allData as $key => $item)
                    <tr>
                        <th scope="row">{{ $key+1 }}</th>
                        <td>{{ $item['apartment']['apartment_name'] }}</td>
                        <td> {{ $item['block']['block_num'] }} </td>
                        <td>{{ $item->room_num }}</td>
                        <td>{!! Str::limit($item -> room_accessories ,50) !!}</td>
                        <td>
                            @if($item->room_status == '1')
                            <span class="btn btn-danger">Occupied</span>
                            @elseif($item->room_status == '2')
                            <span class="btn btn-warning">Pending Approval</span>
                            @elseif($item->room_status == '0')
                            <span class="btn btn-success">Vacant</span>
                            @endif
                        </td>
                        <td>
                            @if($item->room_status == '0')
                            <a href="{{ route('room.edit', $item->id) }}" class="btn btn-primary btn-rounded btn-sm text-white" title="Edit Data" > <i class="fa fa-edit"></i></a>
                            <a href="{{ route('room.delete', $item->id) }}"  class="btn btn-danger btn-rounded btn-sm"  id="delete" title="Delete Data" > <i class="fa fa-trash"></i></a>
                            @else
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
