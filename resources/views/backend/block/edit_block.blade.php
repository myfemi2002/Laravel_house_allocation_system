@extends('admin.admin_master')
@section('title', 'Edit Block')
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
                    <form id="myForm" method="post" action="{{ route('block.update') }}" enctype="multipart/form-data" >@csrf
                        <input type="hidden" name="id" value="{{ $editData->id }}">

                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Apartment</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <select id="inputBlock" name="apartment_id" class="form-select">
                                <option value=""  selected="" disabled>Choose...</option>
                                @foreach ($apartment as $row)
                                <option value="{{ $row->id }}"{{ $row->id == $editData->apartment_id ? 'selected' : '' }}   >{{ $row->apartment_name }}</option>

                                @endforeach
                            </select>
                                <small class="form-control-feedback">
                                @error('apartment_id')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                                </small>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Block Num</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <input type="text" name="block_num" class="form-control" value="{{ $editData->block_num }}"  />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3"></div>
                            <div class="col-sm-9 text-secondary">
                                <input type="submit" class="btn btn-danger px-4" value="Update Block Numb">
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
                block_num: {
                    required : true,
                },
            },
            messages :{
                block_num: {
                    required : 'Please Enter block num',
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
