@extends('admin.admin_master')
@section('title', 'Send Approval Message List')
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
                        <th scope="col">Name</th>
                        <th scope="col">Email </th>
                        <th scope="col">Phone </th>
                        <th scope="col">Status </th>
                        <th scope="col">Action </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($allData as $key => $item)
                    <tr>
                        <th scope="row">{{ $key+1 }}</th>
                        <td>{{ $item->firstname }} {{ $item->othername }} {{ $item->surname }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->phone }}</td>
                        <td> @if($item->status == '0')
                            <span class="btn btn-warning">Pending</span>
                            @elseif($item->status == '1')
                            <span class="btn btn-success">Approved</span>
                            @endif
                        </td>
                        <td>
                            @if($item->msg_status == '2')
                            <a href="{{ route('send.mail',$item->id) }}" class="btn btn-primary btn-rounded btn-sm text-white" > Send Email <i class="fa fa-check-circle"></i></a>
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
