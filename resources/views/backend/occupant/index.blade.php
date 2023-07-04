@extends('admin.admin_master')
@section('title', 'All Occupant List')
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
                        <th scope="col">Phone </th>
                        <th scope="col">Email </th>
                        <th scope="col">Occupant's Image </th>
                        <th scope="col">Status </th>
                        <th scope="col">Action </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($allData as $key => $item)
                    <tr>
                        <th scope="row">{{ $key+1 }}</th>
                        <td>{{ $item->firstname }} {{ $item->othername }} {{ $item->surname }}</td>
                        <td>{{ $item->phone }}</td>
                        <td>{{ $item->email }}</td>

                        <td> @if($item->photo_image == NULL) <span class="text-danger">No Occupant Image</span>
                        @else
                        <img src="{{ asset($item->photo_image) }}" alt="Blank Image" style="height:70px; width:70px"> </td>
                        @endif
                        </td>
                        <td> @if($item->status == '0')
                            <span class="btn btn-warning">Pending</span>
                            @elseif($item->status == '1')
                            <span class="btn btn-success">Approved</span>
                            @endif
                        </td>
                        <td>
                            <a class="btn btn-danger btn-rounded btn-sm"  title="Data Details" data-bs-toggle="modal" data-bs-target="#exampleVerticallycenteredModal{{ $item->id }}"> <i class="fa fa-eye"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>


<section>

<div class="col">

    @foreach ($allData as $item)
    <!-- Modal -->
    <div class="modal fade" id="exampleVerticallycenteredModal{{ $item->id }}" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Occupant's Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">

                    <div class="row">
                        <h6 class="col">Estate:</h6>
                        <p class="col">{{ $item['apartment']['apartment_name'] }}</p>
                    </div>

                    <div class="row">
                        <h6 class="col">Block No:</h6>
                        <p class="col">{{ $item['block']['block_num'] }}</p>
                    </div>

                    <div class="row">
                        <h6 class="col">Name:</h6>
                        <p class="col">{{ $item->firstname }} {{ $item->othername }} {{ $item->surname }}</p>
                    </div>

                    <div class="row">
                        <h6 class="col">Phone:</h6>
                        <p class="col">{{ $item->phone }}</p>
                    </div>

                    <div class="row">
                        <h6 class="col">Email:</h6>
                        <p class="col">{{ $item->email }}</p>
                    </div>

                    <div class="row">
                        <h6 class="col">Date Of Birth:</h6>
                        @if($item->dob == NULL)<p class="col text-danger">No Date Of Birth</p>
                        @else
                        <p class="col">{{ $item->dob }}</p>
                        @endif
                    </div>

                    <div class="row">
                        <h6 class="col">Photo:</h6>
                        @if($item->photo_image == NULL)<p class="col text-danger">No Photo Image</p>
                        @else
                        {{-- <td> <img src="{{ asset($item->photo_image) }}" alt="Blank Image" style="height:40px; width:70px"> </td> --}}
                        <p class="col"><img src="{{ asset($item->photo_image) }}" alt="Blank Image" style="height:70px; width:70px"></p>
                        @endif
                    </div>

                    <div class="row">
                        <h6 class="col">Status:</h6>
                        @if($item->room_status == '1')
                        <p class="col text-success">Approved</p>

                        @elseif($item->room_status == '2')
                        <p class="col text-danger">Pending Approval</p>
                        @endif
                    </div>
                </div>




                <div class="modal-footer">
                    <footer class="text-center">
                        <p>Copyright : &copy; 2019 - <script>document.write(new Date().getFullYear());</script> All rights reserved
                            <i class="fa fa-hearto" aria-hidden="true"></i> by <a href="http://www.newinfo.com.ng/" target="_blank"><span>Newinfo</span></a>
                        </p>
                    </footer>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>

</section>

@endsection
