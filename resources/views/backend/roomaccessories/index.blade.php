@extends('admin.admin_master')
@section('title', 'Accessories Name')
@section('admin')
<div class="page-content">
<!--breadcrumb-->
@include('admin.body.breadcrumb')
<!--end breadcrumb-->
<div class="card">

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered mb-0">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Accessories name</th>
                        <th scope="col">Date of Creation</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($allData as $key => $item)
                    <tr>
                        <th scope="row">{{ $key+1 }}</th>
                        <td>{{ $item->room_accessories_name }}</td>
                        <td>
                            @if($item->created_at == NULL)<span class="text-danger">No Date Set</span>
                            @else
                            {{ Carbon\Carbon::parse($item->created_at)->diffForHumans() }}
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('accessories.edit', $item->id) }}" class="btn btn-primary btn-rounded btn-sm text-white" title="Edit Data" > <i class="fa fa-edit"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="pagination mt-3"  style="float: right;">
                <ul class="pagination-list">
                    {{ $allData->Links('pagination::bootstrap-4') }}
                </ul>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
@endsection
