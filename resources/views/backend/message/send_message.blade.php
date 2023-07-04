@extends('admin.admin_master')
@section('title', 'Add Approval Message')
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
                    <form id="myForm" method="post" action="{{ route('message.store', $messageData->id) }}" enctype="multipart/form-data" >@csrf

                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Name</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" name="greeting" class="form-control" value="Dear {{ $messageData ->surname }} {{ $messageData ->firstname }}"  placeholder="Greetings" />
                                    <small class="form-control-feedback">
                                    @error('greeting')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    </small>
                                </div>
                            </div>


                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Action Text</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">

                                <textarea id="editor1" name="actiontext" name="mytextarea">
                                    Calvary greetings in the name of lord jesus christ,<br><br>
                                    This is to inform you that {{ $messageData['block']['block_num'] }} {{ $messageData->room_num }}
                                    has successfully been approved and allocated to you.
                                </textarea>
                                    {{-- <input type="text" name="actiontext" class="form-control" placeholder="body" /> --}}
                                    <small class="form-control-feedback">
                                    @error('actiontext')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    </small>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Action Url</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" name="actionurl" class="form-control"  placeholder="Url" />
                                    <small class="form-control-feedback">
                                    @error('actionurl')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    </small>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">End Text</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" name="endtext" class="form-control"  value="Kindly Contact RCCG Mainatenance department for further information." />
                                    <small class="form-control-feedback">
                                    @error('endtext')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    </small>
                                </div>
                            </div>

                        <div class="row">
                            <div class="col-sm-3"></div>
                            <div class="col-sm-9 text-secondary">
                                <input type="submit" class="btn btn-primary px-4" value="Submit">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'editor1' );
</script>


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
                    required : 'Please Enter Block Num',
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
