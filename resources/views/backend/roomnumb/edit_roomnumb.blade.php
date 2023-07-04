@extends('admin.admin_master')
@section('title', 'Add Flat Numb')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<div class="page-content">
    <!--breadcrumb-->
    @include('admin.body.breadcrumb')
    <!--end breadcrumb-->
    <div class="row">
        <div class="col-xl-9 mx-auto">
            <div class="card">
                <div class="card-body">
                    <form id="myForm" method="post" action="{{ route('room.update',$editData->id) }}" enctype="multipart/form-data" >@csrf
                        <input type="hidden" name="id" value="{{ $editData->id }}">


                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Apartment Name</h6>
                            </div>
                            <div class="col-sm-9">
                                <select id="inputBlock" name="apartment_id" class="form-select">
                                    <option value=""  selected="" disabled>Choose...</option>
                                    @foreach ($apartment as $row)
                                    <option value="{{ $row->id }}"{{ $row->id == $editData->apartment_id ? 'selected' : '' }}   >{{ $row->apartment_name }}</option>

                                    @endforeach
                                </select>
                                @error('apartment_id')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                                </small>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Block Numb</h6>
                            </div>
                            <div class="col-sm-9">
                                <select id="inputBlock" name="block_id" class="form-select">
                                    <option value=""  selected="" disabled>Choose...</option>
                                    @foreach ($block as $row)
                                    <option value="{{ $row->id }}"{{ $row->id == $editData->block_id ? 'selected' : '' }}   >{{ $row->block_num }}</option>
                                    @endforeach
                                </select>
                                @error('block_id')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                                </small>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Flat Numb</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <input type="text" name="room_num" class="form-control" value="{{ $editData->room_num }}"  placeholder="Flat-1" />
                                <small class="form-control-feedback">
                                @error('room_num')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                                </small>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Home Accessories</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <input type="text" name="room_accessories"  class="form-control" value="{{ $editData->room_accessories }}" data-role="tagsinput" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3"></div>
                            <div class="col-sm-9 text-secondary">
                                <input type="submit" class="btn btn-danger px-4" value="Update Flat">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function (){
        $('#myForm').validate({
            rules: {
                office_numb: {
                    required : true,
                },
            },
            messages :{
                office_numb: {
                    required : 'Please Enter Office Numb',
                },
            },
            errorElement : 'span',
            errorPlacement: function (error,element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight : function(element, errorClass, validClass){
                $(element).addClass('is-invalid');
            },
            unhighlight : function(element, errorClass, validClass){
                $(element).removeClass('is-invalid');
            },
        });
    });

</script>
@endsection
