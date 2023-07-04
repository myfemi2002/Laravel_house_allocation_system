@extends('admin.admin_master')
@section('title', 'Assign Occupant Flat')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<div class="page-content">
<!--breadcrumb-->
@include('admin.body.breadcrumb')
<!--end breadcrumb-->
<div class="row">
    <div class="col-xl-9 mx-auto">
        <div class="card border-top border-0 border-4 border-info">
            <div class="card-body">
                <form id="myForm" method="post" action="{{ route('assign.store') }}" enctype="multipart/form-data" >
                    @csrf
                    <input type="hidden" name="id" value="{{ $assignData->id }}">
                    <div class="border p-4 rounded">
                        <div class="card-title d-flex align-items-center">
                            <div><i class="bx bxs-user me-1 font-22 text-info"></i>
                            </div>
                            <h5 class="mb-0 text-info">Occupants Registration</h5>
                        </div>
                        <hr>
                        <div class="row mb-3">
                            <label for="inputEnterYourApartment" class="col-sm-3 col-form-label">Lodge Name</label>
                            <div class="col-sm-9">
                                <input type="text"  class="form-control" value="{{ $assignData['apartment']['apartment_name'] }}" id="inputEnterYourApartment" placeholder="Enter Your Apartment" readonly>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputEnterYourBlock" class="col-sm-3 col-form-label">Block Number</label>
                            <div class="col-sm-9">
                                <input type="text"  class="form-control" value="{{ $assignData['block']['block_num'] }}" id="inputEnterYourBlock" placeholder="Enter Your Block" readonly>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputEnterYourRoom" class="col-sm-3 col-form-label">Room Number</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="inputEnterYourRoom" value="{{ $assignData->room_num }}"  placeholder="Enter Your Room" readonly>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputEnterYourName" class="col-sm-3 col-form-label">Firstname</label>
                            <div class="col-sm-9">
                                <input type="text" name="firstname" class="form-control" id="inputEnterYourName" placeholder="Enter Your Firstname">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputEnterYourOther" class="col-sm-3 col-form-label">Othername</label>
                            <div class="col-sm-9">
                                <input type="text" name="othername" class="form-control" id="inputEnterYourOther" placeholder="Enter Your Othername">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputEnterYourSurname" class="col-sm-3 col-form-label">Surname</label>
                            <div class="col-sm-9">
                                <input type="text" name="surname" class="form-control" id="inputEnterYourSurname" placeholder="Enter Your Surname">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputEnterYourPlaceOfWork" class="col-sm-3 col-form-label">Place Of Work</label>
                            <div class="col-sm-9">
                                <input type="text" name="pow" class="form-control" id="inputEnterYourPlaceOfWork" placeholder="Enter Place Of Work">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputEnterYourDepartment" class="col-sm-3 col-form-label">Department</label>
                            <div class="col-sm-9">
                                <input type="text" name="department" class="form-control" id="inputEnterYourDepartment" placeholder="Enter Your Department">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Phone No</label>
                            <div class="col-sm-9">
                                <input type="tel" name="phone" class="form-control" id="inputPhoneNo2" placeholder="Phone No">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputEmail" class="col-sm-3 col-form-label">Email Address</label>
                            <div class="col-sm-9">
                                <input type="email" name="email" class="form-control" id="inputEmail" placeholder="Email Address">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputDob" class="col-sm-3 col-form-label">Date Of Birth</label>
                            <div class="col-sm-9">
                                <input type="date" name="dob" class="form-control" id="inputDob" placeholder="Date Of Birth">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputRemark" class="col-sm-3 col-form-label">Remarks</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" name="remarks" id="inputRemark" rows="3" placeholder="Remark"></textarea>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Photo</h6>
                            </div>
                            <div class="col-sm-6 text-secondary">
                                <input type="file" name="photo_image" class="form-control"  id="image"  required />
                            </div>
                            <div class="col-sm-3 text-secondary">
                                <img id="showImage" src="{{  url('upload/no_image.jpg') }}" alt="Admin" style="width:100px; height: 100px;"  >
                            </div>
                        </div>

                        <div class="row">
                            <label class="col-sm-3 col-form-label"></label>
                            <div class="col-sm-9">
                                <button type="submit" class="btn btn-info px-5">Register</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--end row-->
<script type="text/javascript">
    $(document).ready(function() {
      $('select[name="apartment_id"]').on('change', function(){
          var apartment_id = $(this).val();
          if(apartment_id) {
              $.ajax({
                url: "{{  url('/room-numb/ajax') }}/" + apartment_id,
                  type:"GET",
                  dataType:"json",
                  success:function(data) {

                      $('select[name="room_id"]').html('');
                     var d =$('select[name="block_id"]').empty();
                        $.each(data, function(key, value){
                            $('select[name="block_id"]').append('<option value="'+ value.id +'">' + value.block_num + '</option>');
                        });
                  },
              });
          } else {
              alert('danger');
          }
      });


    $('select[name="block_id"]').on('change', function(){
          var block_id = $(this).val();
          if(block_id) {
              $.ajax({
                url: "{{  url('/assign-occupant-room/ajax') }}/" + block_id,
                  type:"GET",
                  dataType:"json",
                  success:function(data) {
                     var d =$('select[name="room_id"]').empty();
                        $.each(data, function(key, value){
                            $('select[name="room_id"]').append('<option value="'+ value.id +'">' + value.room_num + '</option>');
                        });
                  },
              });
          } else {
              alert('danger');
          }
      });

    });
</script>

<script type="text/javascript">
    $(document).ready(function(){
    	$('#image').change(function(e){
    		var reader = new FileReader();
    		reader.onload = function(e){
    			$('#showImage').attr('src',e.target.result);
    		}
    		reader.readAsDataURL(e.target.files['0']);
    	});
    });
</script>

@endsection
