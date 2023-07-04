@extends('admin.admin_master')
@section('title', 'Edit Shop Numb')
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
                    <form id="myForm" method="post" action="{{ route('shopnumb.update') }}" enctype="multipart/form-data" >@csrf
                        <input type="hidden" name="id" value="{{ $editData->id }}">
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Shop Numb</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <input type="text" name="shop_numb" class="form-control" value="{{ $editData->shop_numb }}"  />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3"></div>
                            <div class="col-sm-9 text-secondary">
                                <input type="submit" class="btn btn-danger px-4" value="Update Shop Numb">
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
                shop_numb: {
                    required : true,
                },
            },
            messages :{
                shop_numb: {
                    required : 'Please Enter Shop Numb',
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
