@extends('admin.admin_master')
@section('title', 'Add Shop Numb')
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
                    <form id="myForm" method="post" action="{{ route('officenumb.store') }}" enctype="multipart/form-data" >@csrf
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Office Number</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <input type="text" name="office_numb" class="form-control" value="Office-" placeholder="Office-21" />
                                <small class="form-control-feedback">
                                @error('office_numb')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                                </small>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3"></div>
                            <div class="col-sm-9 text-secondary">
                                <input type="submit" class="btn btn-primary px-4" value="Save Office Numb">
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
                officenumb: {
                    required : true,
                },
            },
            messages :{
                officenumb: {
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