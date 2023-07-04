@extends('admin.admin_master')
@section('title', 'Approved List')
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
                        <th scope="col">Name</th>
                        <th scope="col">Phone </th>
                        <th scope="col">Email </th>
                        <th scope="col">Status </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($allData as $key => $item)
                    <tr>
                        <th scope="row">{{ $key+1 }}</th>
                        <td>{{ $item['apartment']['apartment_name'] }}</td>
                        <td>{{ $item['block']['block_num'] }}</td>
                        <td>{{ $item->room_num }}</td>
                        <td>{{ $item->firstname }} {{ $item->othername }} {{ $item->surname }}</td>
                        <td>{{ $item->phone }}</td>
                        <td>{{ $item->email }}</td>
                        <td> @if($item->status == '0')
                            <span class="btn btn-warning">Pending</span>
                            @elseif($item->status == '1')
                            <span class="btn btn-success">Approved</span>
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
