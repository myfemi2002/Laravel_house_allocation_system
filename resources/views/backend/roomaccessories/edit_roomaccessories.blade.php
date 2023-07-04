@extends('admin.admin_master')
@section('title', 'Edit Accessory')
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
                    <form id="myForm" method="post" action="{{ route('accessories.update') }}" enctype="multipart/form-data" >@csrf
                        <input type="hidden" name="id" value="{{ $editData->id }}">
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Room Accessory Name</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <textarea  name="room_accessories_name" class="form-control" aria-label="With textarea">{{ $editData->room_accessories_name }}</textarea>
                                {{-- <input type="text" name="room_accessories_name" value="{{ $editData->room_accessories_name }}" class="form-control"  placeholder="Accessory Name" /> --}}

                                <small class="form-control-feedback">
                                @error('room_accessories_name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                                </small>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3"></div>
                            <div class="col-sm-9 text-secondary">
                                <input type="submit" class="btn btn-primary px-4" value="Save">
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
